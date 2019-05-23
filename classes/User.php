<?php


class User extends Object_Helper
{


    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'role_id');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $role_id;
    //public $user_photo;
    //public $upload_directory = "images";
    //public $image_placeholder = "http://placehold.it/400x400&text=image";


/*    public function upload_user_photo() {


        if(!empty($this->custom_errors)) {
            return false;
        }

        if(empty($this->user_photo) || empty($this->tmp_path)) {
            $this->custom_errors[] = "the file is not available";
            return false;
        }

        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_photo;

        if(file_exists($target_path)) {
            $this->custom_errors[] = "The file {$this->user_photo} already exists";
            return false;
        }

        if(move_uploaded_file($this->tmp_path, $target_path)) {

            unset($this->tmp_path);
            return true;

        } else {

            $this->custom_errors[] = "something wrong with file directory. permissions?";
            return false;

        }

    }

    public function image_path_and_placeholder() {
        return empty($this->user_photo) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_photo;
    }*/


    public static function verify_user($username, $password) {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM ".self::$db_table." WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_by_query($sql);


        // if not empty return 1st item otherwise return false
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

    public function delete_user() {

        if($this->deleteById()) {
            //$target_path = SITE_ROOT . DS . 'admin'. DS . $this->image_path();

            //return unlink($target_path) ? true : false;
            return true;
        } else {

            return false;
        }
    }


/*    public function ajax_save_user_image($user_image, $user_id) {

        global $database;

        $user_image = $database->escape_string($user_image);
        $user_id = $database->escape_string($user_id);

        $this->user_photo = $user_image;
        $this->id = $user_id;

        $sql = "UPDATE " . self::$db_table . " SET user_photo = '{$this->user_photo}' ";
        $sql .= " WHERE id = {$this->id} ";
        $update_image = $database->query($sql);

        echo $this->image_path_and_placeholder();
    }*/



    public function delete_user_and_photo() {

        if($this->deleteById()) {
            $target_path = SITE_ROOT . DS . 'admin'. DS . $this->upload_directory . DS . $this->user_photo;

            return unlink($target_path) ? true : false;
        } else {

            return false;
        }
    }
}

