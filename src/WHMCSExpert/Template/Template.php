<?php

namespace WHMCSExpert\Template;

use Smarty;
use WHMCSExpert\Helper\Helper;

/**
 *
 */
class Template extends Smarty_Internal_Resource_File
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
      $this->_helper = new Helper;

      $this->_smarty = new Smarty;
      $this->_smarty->caching        = false;
      $this->_smarty->compile_check  = true;
      $this->_smarty->debugging      = false;
      $this->_smarty->template_dir   = $templateDir;
      $this->_smarty->compile_dir    = $GLOBALS['templates_compiledir'];
      // $this->_smarty->cache_dir      = dirname(dirname(__DIR__)) . '/templates/cache';

      // return $this->smarty = $smarty;
    }

    /**
   * Load template's source from file into current template object
   * with Ioncube for encripty tpl files
   *
   * @param  Smarty_Template_Source $source source object
   * @return string                 template source
   * @throws SmartyException        if source cannot be loaded
   */
  public function getContent(Smarty_Template_Source $source)
  {
      if ($source->timestamp) {

          if (file_exists($source->filepath) && function_exists('ioncube_read_file')) {
              $res = ioncube_read_file($source->filepath);
              if (is_int($res)) {
                  $res = false;
              }
              return $res;
          }
          else {
              return file_get_contents($source->filepath);
          }
      }

      if ($source instanceof Smarty_Config_Source) {
          throw new SmartyException("Unable to read config {$source->type} '{$source->name}'");
      }
      throw new SmartyException("Unable to read template {$source->type} '{$source->name}'");
  }

    public function getTemplatesDir($file)
    {
      return $this->_helper->getDirectory($file) . "/templates";
    }

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
