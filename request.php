<?php

namespace AHT;

    class Request
    {
        public $url;

        public function __construct()
        {

            $this->url = $_SERVER["REQUEST_URI"];
//            echo $this->url;
//            die();
        }
    }

?>