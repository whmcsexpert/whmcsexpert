<?php

namespace WHMCSExpert\Template;

use Smarty;

/**
 *
 */
class Template
{
    private $_smarty;

    /**
     * Because WHMCS don't allows inject Smarty template we instantiate our won
     * to better build HTML pages.
     */
    public function __construct()
    {
      $this->_smarty = new Smarty;
      $this->_smarty->caching        = false;
      $this->_smarty->compile_check  = true;
      $this->_smarty->debugging      = false;
      $this->_smarty->template_dir   = dirname(__DIR__) . '/templates';
      $this->_smarty->compile_dir    = $GLOBALS['templates_compiledir'];
      $this->_smarty->cache_dir      = dirname(dirname(__DIR__)) . '/templates/cache';

      // return $this->smarty = $smarty;
    }

    public function fetch($template, $vars = array())
    {
        if (is_array($vars)) {
            foreach ($vars as $key => $val) {
                $this->_smarty->assign($key, $val);
            }
        }

        return $this->_smarty->fetch($template.'.tpl', uniqid());
    }

    public function display($template, $vars = array())
    {
        if (is_array($vars)) {
            foreach ($vars as $key => $val) {
                $this->_smarty->assign($key, $val);
            }
        }

        return $this->_smarty->display($template.'.tpl', uniqid());
    }
}
