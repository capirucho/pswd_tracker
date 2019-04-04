<?php
/**
 * Created by PhpStorm.
 * User: ronald
 * Date: 2018-12-18
 * Time: 15:54
 */

require_once("./includes/init.php");

// this is called because we will be using redirection in the project. ?????
// ob_start() is a predefined function in php and it deals with output buffering.
ob_start();

$session->logout();
redirectUser("login.php");