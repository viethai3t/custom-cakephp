<?php

App::uses('AppHelper', 'View/Helper');

class CommonHelper extends AppHelper {

    public $urlParams;

    public function __construct() {
        $this->urlParams = $_GET;
    }

    public function getUrlParam($paramName) {
        if (empty($this->urlParams) || !is_array($this->urlParams) || empty($paramName)) return '';
        if (array_key_exists($paramName, $this->urlParams)){
            return $this->urlParams[$paramName];
        }else{
            return '';
        }
    }
}
