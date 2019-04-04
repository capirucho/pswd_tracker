<?php

class Account extends Object_Helper
{

    protected static $db_table = "accounts";
    protected static $db_table_fields = array('account_title', 'url', 'username', 'password', 'notes', 'tags', 'account_type_id', 'user_id');
    public $id;
    public $account_title;
    public $url;
    public $username;
    public $password;
    public $notes;
    public $tags;
    public $account_type_id;
    public $user_id;


    public function delete_account() {
        if($this->deleteById()) {
            return true;
        } else {
            return false;
        }
    }

}