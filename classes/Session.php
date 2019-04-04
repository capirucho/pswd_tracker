<?php
/**
 * Created by PhpStorm.
 * User: ronald
 * Date: 2018-12-18
 * Time: 15:05
 */

class Session
{

    private $signedIn = false;
    public $id;
    public $message;
    public $count;
    public $userRole;



    function __construct() {
        session_start();
        $this->checkTheLogin();
        $this->checkMessage();
        $this->visitor_count();
    }

    public function visitor_count() {
        if(isset($_SESSION['count'])) {
            return $this->count = $_SESSION['count']++;
        } else {
            return $_SESSION['count'] = 1;
        }
    }

    public function message($msg = "") {
        if(!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    private function checkMessage() {
        if(isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }

    public function isSignedIn() {
        return $this->signedIn;
    }

    public function login($user) {
        if ($user) {
            $this->id = $_SESSION['id'] = $user->id;
            $this->signedIn = true;
        }
    }

    public function logout() {
        unset($_SESSION['id']);
        unset($this->id);
        $this->signedIn = false;
    }

    private function checkTheLogin() {

        if(isset($_SESSION['id'])) {
            $this->id = $_SESSION['id'];
            $this->signedIn = true;
        } else {
            unset($this->id);
            $this->signedIn = false;
        }

    }
}

$session = new Session();
$message = $session->message();
