<?php

namespace WHMCSExpert\Template;

use Smarty;
// use WHMCSExpert\Helper\Helper;

// get the override of Smarty Internal Resource File
require('mtLibs/smarty_internal_resource_file.php');

/**
 *
 */
class Template
{
    /** @var object Smarty object */
    private $_smarty;

    private $_helper;

    /**
     * Because WHMCS don't allows inject Smarty template we instantiate our won
     * to better build HTML pages.
     */
    public function __construct($templateDir)
    {
      // $this->_helper = new Helper;

      $this->_smarty = new Smarty;
      $this->_smarty->caching        = false;
      $this->_smarty->compile_check  = true;
      $this->_smarty->debugging      = false;
      $this->_smarty->template_dir   = $templateDir;
      $this->_smarty->compile_dir    = $GLOBALS['templates_compiledir'];
      $this->_smart->registerResource('file', new SmartyEncrypt());
      // $this->_smarty->cache_dir      = dirname(dirname(__DIR__)) . '/templates/cache';

      // return $this->smarty = $smarty;
    }

    // public function getTemplatesDir($file)
    // {
    //   return $this->_helper->getDirectory($file) . "/templates";
    // }

    /**
     * Fetch Smarty template
     * @param  string $template The tpl path/file that will be fetch
     * @param  array  $vars     Any Smarty assing variables to the tpl file
     * @return string the html Smarty data
     */
    public function fetch($file, $vars = array())
    {

      // $templateDir = rtrim($dir ? $dir : $this->getTemplatesDir($file), '/');
      // $this->_smarty->template_dir = $templateDir;

        if (is_array($vars)) {
            foreach ($vars as $key => $val) {
                $this->_smarty->assign($key, $val);
            }
        }

        return $this->_smarty->fetch("{$file}.tpl", uniqid());
    }

    /**
     * Display Smarty template
     * @param  string $template The tpl path/file that will be fetch
     * @param  array  $vars     Any Smarty assing variables to the tpl file
     * @return string the html Smarty data
     */
    public function display($file, $vars = array())
    {

      // $templateDir = rtrim($dir ? $dir : $this->getTemplatesDir($file), '/');
      // $this->_smarty->template_dir = $templateDir;


        if (is_array($vars)) {
            foreach ($vars as $key => $val) {
                $this->_smarty->assign($key, $val);
            }
        }

        return $this->_smarty->display("{$file}.tpl", uniqid());

        // return $this->_smarty->display($template.'.tpl', uniqid());
    }
}
