<?php
require_once("init.php");
$account_details = '';
if(!isset($_POST['account_id'])) {
    echo "Something may have gone wrong. Did you provide all the correct information?";
} else {
    $requested_account_details = Account::find_by_id($_POST['account_id']);

    $account_details .= '
        <ul class="list-group list-group-flush">';
    $account_details .= '
            <li class="list-group-item">Account Title: <br>'.$requested_account_details->account_title.'</li>
            <li class="list-group-item">URL: <br>'.$requested_account_details->url.'</li>
            <li class="list-group-item">Username: <br> '.$requested_account_details->username.'</li>
            <li class="list-group-item">Password: <br>'.$requested_account_details->password.'</li>
            <li class="list-group-item">Notes: <br>'.$requested_account_details->notes.'</li>
            <li class="list-group-item">Tags: <br>'.$requested_account_details->tags.'</li>
         ';

    $account_details .= '</ul>';
    echo $account_details;

}