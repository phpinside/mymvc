<?php
/**
 * Created by PhpStorm.
 * User: Cral
 * Date: 2016/11/16 0016
 * Time: 上午 7:13
 */

namespace app\controllers;

use Pheasant;
use Latte\Engine;

class BaseController
{
    private $latte;
    private $config;

    public function __construct()
    {
        $this->loadConfig();
        $this->initDb();
        $this->initTpl();
    }

    public function initDb()
    {
        Pheasant::setup($this->config['dsn']);
    }

    public function initTpl()
    {
        $this->latte = new Engine();
        $this->latte->setTempDirectory(APP_ROOT . '/storage/views');
        $set = new \Latte\Macros\MacroSet($this->latte->getCompiler());
        $set->addMacro('url', function ($node, $writer) {
            return $writer->write('echo "' . SITE_URL . '%node.args' . '"');
        });
        $this->latte->
    }

    public function loadConfig()
    {
        $this->config = require APP_ROOT . '/config/base.php';
    }

    public function render($name, array $params = [], $block = NULL)
    {
        $params['sitename'] = 'sijiaomao mvc framework';
        $tplFile = APP_ROOT . '/views/' . $name . '.latte';
        $this->latte->render($tplFile, $params, $block);
    }

    public function redirect($name)
    {
        header('Location:' . SITE_URL . '/' . $name);
        exit;
    }


}