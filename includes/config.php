<?php
/**
 * Created by PhpStorm.
 * User: ronald
 * Date: 2018-12-18
 * Time: 01:34
 */

//Database Connection Constants

define('DB_HOST', 'localhost:3306');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'rf_password_db');

// moved this to database.php file
// where we will define a database class

// $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// if (!$connection) {
// 	echo "something is wrong with connection to the database";
// }

