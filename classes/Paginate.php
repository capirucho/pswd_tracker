<?php
/**
 * Created by PhpStorm.
 * User: ronald
 * Date: 2018-12-18
 * Time: 15:13
 */

class Paginate
{

    public $currentPage;
    public $itemsPerPage;
    public $itemsTotalCount;

    public function __construct($currentPage = 1, $itemsPerPage = 0, $itemsTotalCount = 0) {

        $this->currentPage = (int)$currentPage;
        $this->itemsPerPage = (int)$itemsPerPage;
        $this->itemsTotalCount = (int)$itemsTotalCount;

    }

    public static function pageTitle() {

          //$dirty_url = $_SERVER['REQUEST_URI'];
          $url = basename($_SERVER['PHP_SELF'], '.php');

//        $fp = file_get_contents($url);
//        if (!$fp) {
//            return null;
//        }
//
//        $res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
//        if (!$res)
//            return null;
//
//        // Clean up title: remove EOL's and excessive whitespace.
//        $title = preg_replace('/\s+/', ' ', $title_matches[1]);
//        $title = trim($title);
        return $url;

    }

    public function nextPage() {

        return $this->currentPage + 1;
    }


    public function previousPage() {

        return $this->currentPage - 1;
    }

    public function pageTotal() {

        return ceil($this->itemsTotalCount/$this->itemsPerPage);
    }

    public function hasPreviousPage() {
        return $this->previousPage() >= 1 ? true : false;
    }

    public function hasNextPage() {

        return $this->nextPage() <= $this->pageTotal() ? true : false;
    }

    public function offset() {

        return ($this->currentPage - 1) * $this->itemsPerPage;

    }


}