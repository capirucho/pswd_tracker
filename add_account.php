<?php

    require_once("./includes/init.php");

    // this is called because we will be using redirection in the project. ?????
    // ob_start() is a predefined function in php and it deals with output buffering.
    ob_start();

    if(!$session->isSignedIn()) {
        redirectUser("../login.php");
    }

    $user_id = $session->id;

    $message = "";

    $account = new Account();

    if(isset($_POST['add_account'])) {

        if($account) {
            $account->account_title = $_POST['account_title'];
            $account->url = $_POST['url'];
            $account->username = $_POST['username'];
            $account->password = $_POST['password'];
            $account->notes = $_POST['notes'];
            $account->tags = $_POST['tags'];
            $account->account_type_id = $_POST['account_type_id'];
            $account->user_id = $user_id;

            $session->message("The account has been created.");
            $account->save();
            redirectUser("manage_accounts.php");
        }

    }