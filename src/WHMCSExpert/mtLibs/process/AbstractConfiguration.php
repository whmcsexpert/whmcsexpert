<?php

namespace WHMCSExpert\mtLibs\process;


abstract class AbstractConfiguration{
    public $debug = false;

    public $systemName = false;

    public $name = false;

    public $moduleName = false;

    public $description = false;

    public $clientareaName = false;

    private $encryptHash = false;

    public $version = false;

    public $author = '<a href="https://www.mimirtech.co" target="_blank">MimirTech</a>';

    public $tablePrefix = false;

    private $storageKey = false;

    public $licenseServerUrl = false;

    private $secretKey = false;

    public $localKeyDays = false;

    public $allowCheckFailDays = false;

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
