<?php
/**
 * Created by PhpStorm.
 * User: ronald
 * Date: 2018-12-18
 * Time: 01:57
 */

class Object_Helper
{


    //protected static $db_table = "users";

    public $custom_errors = array();

        public $upload_errors_array = array(
        UPLOAD_ERR_OK => "There is no error.",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive.",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceed the MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE => "No file was uploaded turkey.",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
    );

    public function set_file($file) {

        if(empty($file) || !$file || !is_array($file)) {
            $this->custom_errors[] = "No file was uploaded.";
            return false;

        } elseif ($file['error'] != 0) {
            $this->custom_errors[] = $this->upload_errors_array[$file['error']];
            return false;

        } else {
            $this->user_photo = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->photo_type = $file['type'];
            $this->photo_size = $file['size'];
        }

    }

    public static function db_search($searchtxt) {
        return static::find_by_query("SELECT * FROM ".static::$db_table." WHERE account_title LIKE '%$searchtxt%' OR tags LIKE '%$searchtxt%' OR notes LIKE'%$searchtxt%'");
    }

    public static function find_all()
    {
        //global $database;
        //$result_set = $database->query("SELECT * FROM users");
        //return $result_set;

        // the above can be simply re-written by calling a static method
        // and just passing it the query
        return static::find_by_query("SELECT * FROM ".static::$db_table);
    }

    public static function find_by_id($id)
    {
        global $database; // TODO remove this variable
        //$result_set = $database->query("SELECT * FROM users WHERE id = $id LIMIT 1");
        //$found_user = mysqli_fetch_array($result_set);
        //return $found_user;

        $the_result_array = static::find_by_query("SELECT * FROM ".static::$db_table." WHERE id = $id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

        //$found_user = mysqli_fetch_array($result_set);
        // if(!empty($the_result_array)) {
        //     $first_item = array_shift($the_result_array);

        //     return $first_item;
        // }
        // else {
        //     return false;
        // }

    }

    public static function find_by_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        while($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = static::instantiation($row);
        }
        return $the_object_array;
    }


    public static function instantiation($the_record) {

        $calling_class = get_called_class();

        $the_object = new $calling_class;

        //$the_object->id = $found_user['id'];
        //$the_object->userName = $found_user['username'];
        //$the_object->password = $found_user['password'];
        //$the_object->firstName = $found_user['first_name'];
        //$the_object->lastName = $found_user['last_name'];

        foreach ($the_record as $the_attribute => $value) {
            if($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;

    }


    private function has_the_attribute($the_attribute) {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);

    }


    protected function myClassProperties() {

        //return get_object_vars($this);

        $theProperties = array();

        foreach (static::$db_table_fields as $db_table_field) {

            if(property_exists($this, $db_table_field)) {
                $theProperties[$db_table_field] = $this->$db_table_field;
            }
        }

        return $theProperties;
    }


    protected function cleanProperties() {
        global $database;

        $cleanedProperties = array();

        foreach ($this->myClassProperties() as $key => $value) {
            $cleanedProperties[$key] = $database->escape_string($value);
        }

        return $cleanedProperties;
    }


    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
        //return isset($this->id) ? 'found user' : 'we need to create user';
    }



    public function create() {
        global $database;

        $theProperties = $this->cleanProperties();

        $sql = "INSERT INTO ".static::$db_table."(".implode(",", array_keys($theProperties)).")";
        $sql .= "VALUES ('".implode("','", array_values($theProperties))."')";

        if($database->query($sql)) {
            $this->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }

    }


    public function update() {
        global $database;

        $theProperties = $this->cleanProperties();

        $propertyPairs = array();

        foreach ($theProperties as $key => $value) {
            $propertyPairs[] = "{$key}='{$value}'";
        }

        $sql =  "UPDATE ".static::$db_table." SET ";
        $sql .= implode(", ", $propertyPairs);
        $sql .= " WHERE id= " . $database->escape_string($this->id);

        /// old way below before abstraction ////
        // $sql =  "UPDATE ".static::$db_table." SET ";
        // $sql .= "username = '" . $database->escape_string($this->username) . "', ";
        // $sql .= "password = '" . $database->escape_string($this->password) . "', ";
        // $sql .= "first_name = '" . $database->escape_string($this->first_name) . "', ";
        // $sql .= "last_name = '" . $database->escape_string($this->last_name) . "' ";
        // $sql .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;


    }


    public function deleteById() {
        global $database;

        //$sql =  "DELETE FROM ".static::$db_table." ";
        $sql =  "DELETE FROM ".static::$db_table." ";
        $sql .= "WHERE id=" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : 'No data was deleted.';


    }

    public static function countAll() {

        global $database;

        $sql = "SELECT COUNT(*) FROM " . static::$db_table;
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);

        return array_shift($row);

    }


}