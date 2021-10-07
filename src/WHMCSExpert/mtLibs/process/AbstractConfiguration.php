<?php

namespace WHMCSExpert\mtLibs\process;


abstract class AbstractConfiguration{

    public $debug = false;

    public $systemName;

    public $name;

    public $moduleName;

    public $description;

    public $clientAreaName;

    private $encryptHash;

    public $version;

    public $author = '<a href="https://www.mimirtech.co" target="_blank">MimirTech</a>';

    private $tablePrefix;

    private $storageKey;

    private $licenseServerUrl;

    private $secretKey;

    private $localKeyDays;

    public $allowCheckFailDays;

    public $modelRegister;

    private $_customConfigs = array();

    /**
     * @param bool $debug
     */
    public function setDebug(bool $debug): void
    {
        $this->debug = $debug;
    }

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @param string $systemName
     */
    public function setSystemName(string $systemName): void
    {
        $this->systemName = $systemName;
    }

    /**
     * @return string
     */
    public function getSystemName(): string
    {
        return $this->systemName;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $moduleName
     */
    public function setModuleName(string $moduleName): void
    {
        $this->moduleName = $moduleName;
    }

    /**
     * @return string
     */
    public function getModuleName(): string
    {
        return $this->moduleName;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $clientAreaName
     */
    public function setClientAreaName(string $clientAreaName): void
    {
        $this->clientAreaName = $clientAreaName;
    }

    /**
     * @return string
     */
    public function getClientAreaName(): string
    {
        return $this->clientAreaName;
    }

    /**
     * @param string $encryptHash
     */
    public function setEncryptHash(string $encryptHash): void
    {
        $this->encryptHash = $encryptHash;
    }

    /**
     * @return string
     */
    public function getEncryptHash(): string
    {
        return $this->encryptHash;
    }

    /**
     * @param string $version
     */
    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $tablePrefix
     */
    public function setTablePrefix(string $tablePrefix): void
    {
        $this->tablePrefix = $tablePrefix;
    }

    /**
     * @return string
     */
    public function getTablePrefix(): string
    {
        return $this->tablePrefix;
    }

    /**
     * @param string $storageKey
     */
    public function setStorageKey(string $storageKey): void
    {
        $this->storageKey = $storageKey;
    }

    /**
     * @return string
     */
    public function getStorageKey(): string
    {
        return $this->storageKey;
    }

    /**
     * @param string $licenseServerUrl
     */
    public function setLicenseServerUrl(string $licenseServerUrl): void
    {
        $this->licenseServerUrl = $licenseServerUrl;
    }

    /**
     * @return string
     */
    public function getLicenseServerUrl(): string
    {
        return $this->licenseServerUrl;
    }

    /**
     * @param string $secretKey
     */
    public function setSecretKey(string $secretKey): void
    {
        $this->secretKey = $secretKey;
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    /**
     * @param int $localKeyDays
     */
    public function setLocalKeyDays(int $localKeyDays): void
    {
        $this->localKeyDays = $localKeyDays;
    }

    /**
     * @return int
     */
    public function getLocalKeyDays(): int
    {
        return $this->localKeyDays;
    }

    /**
     * @param int $allowCheckFailDays
     */
    public function setAllowCheckFailDays( int $allowCheckFailDays): void
    {
        $this->allowCheckFailDays = $allowCheckFailDays;
    }

    /**
     * @return int
     */
    public function getAllowCheckFailDays(): int
    {
        return $this->allowCheckFailDays;
    }

    /**
     * @param array $modelRegister
     */
    public function setModelRegister(array $modelRegister): void
    {
        $this->modelRegister = $modelRegister;
    }

    /**
     * @return array
     */
    public function getModelRegister(): array
    {
        return $this->modelRegister;
    }

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
