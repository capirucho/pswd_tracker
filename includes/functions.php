<?php
/**
 * Created by PhpStorm.
 * User: ronald
 * Date: 2018-12-18
 * Time: 02:59
 */

// the following is just a safety measure in case a CLASS
// is not initialized
function autoLoadClasses($class) {

    $class = strtolower($class);
    $the_path = "includes/{$class}.php";

    if(is_file($the_path) && !class_exists($class)) {
        include $the_path;
    }
}

spl_autoload_register('autoLoadClasses');

function redirectUser($location) {
    header("Location: {$location}");
    exit;
}