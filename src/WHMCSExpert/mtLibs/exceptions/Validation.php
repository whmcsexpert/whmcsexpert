<?php

namespace WHMCSExpert\mtLibs\exceptions;
use WHMCSExpert as main;

/**
 * Use for general module errors
 *
 */
class validation extends System {
    private $fields = array();
    public function __construct($message,array $fields = array()) {
        $this->fields = $fields;
        parent::__construct($message);
    }

    function getFields(){
        return $this->fields;
    }
}
