<?php
/**
 * Created by PhpStorm.
 * User: ronald
 * Date: 2018-12-18
 * Time: 01:39
 */

class Database
{
    public $connection;
    public $db;

    // use __construct() here to automatically call the open_db_connection
    // function once the class gets instantiated.
    // otherwise after instantiation you would have to call like this
    // $database->open_db_connection()

    function __construct() {
        $this->db = $this->open_db_connection();
    }

    public function open_db_connection() {

        //next line is outdated procedural way. Dont use
        //$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        //the more "object oriented" way of doing this is this next line:
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if( $this->connection->connect_errno ) {
            die("Database connection failed badly. " . $this->connection->connect_error);
        }

        return $this->connection;

    }

    public function query($sql) {
        $result = $this->db->query($sql);
        $this->confirm_query($result);

        return $result;
    }

    private function confirm_query($result) {
        if(!$result) {
            die("Query Failed message by RONALD" . $this->db->error);
        }
    }

    public function escape_string($string) {
        //$escaped_string = mysqli_real_escape_string($this->connection, $string);
        return $this->db->real_escape_string($string);
    }

    public function the_insert_id() {
        return mysqli_insert_id($this->db);
    }


} // End of Class Database

$database = new Database();
