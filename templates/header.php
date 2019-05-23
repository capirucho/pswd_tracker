<?php
require_once("././includes/init.php");

// this is called because we will be using redirection in the project. ?????
// ob_start() is a predefined function in php and it deals with output buffering.
ob_start();

if(!$session->isSignedIn()) {
    redirectUser("login.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Password Manager</title>

    <script>

    </script>

    <!-- Favicon -->
    <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="././assets/css/custom.css">
    <!-- Icons -->
    <!--<link href="././assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">-->
    <!--<link href="././assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">-->

    <!-- Argon CSS -->
    <!--<link type="text/css" href="././assets/css/argon.css" rel="stylesheet">-->
    <!--<link type="text/css" href="././assets/css/custom.css" rel="stylesheet">-->

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="././css/bootstrap.css">-->

</head>

<body>

