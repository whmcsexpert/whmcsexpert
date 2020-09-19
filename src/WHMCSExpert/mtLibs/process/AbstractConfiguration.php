<?php

namespace WHMCSExpert\mtLibs\process;
use WHMCSExpert as main;

abstract class AbstractConfiguration{
    public $debug = false;

    public $systemName = false;

    public $name = false;

    public $moduleName = false;

    public $description = false;

    public $clientareaName = false;

    public $encryptHash = false;

    public $version = false;

    public $author = '<a href="https://www.mimirtech.co" targer="_blank">MimirTech</a>';

    public $tablePrefix = false;

    public $storageKey = false;

    public $modelRegister = array();

    private $_customConfigs = array();

    public function __isset($name) {
        return isset($this->_customConfigs[$name]);
    }

    public function __get($name) {
        if(isset($this->_customConfigs[$name]))
        {
            return $this->_customConfigs[$name];
        }
    }

    public function __set($name, $value) {
        $this->_customConfigs[$name] = $value;
    }

    public function getAddonMenu(){
        return array();
    }

    public function getAddonWHMCSConfig(){
        return array();
    }

    public function getServerConfigController(){
        return 'configuration';
    }

    public function getServerActionsController(){
        return 'actions';
    }

    public function getServerCAController(){
        return 'home';
    }

    public function getAddonAdminController(){
        return 'actions';
    }

    public function getAddonCAController(){
        return 'home';
    }
}
