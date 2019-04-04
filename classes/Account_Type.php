<?php
/**
 * Created by PhpStorm.
 * User: ronald
 * Date: 2019-01-30
 * Time: 23:31
 */

class Account_Type extends Object_Helper
{
    protected static $db_table = "account_type";
    protected static $db_table_fields = array('type');
    public $id;
    public $type;


    public function delete_account_type() {
        if($this->deleteById()) {
            return true;
        } else {
            return false;
        }
    }
}