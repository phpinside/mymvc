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
        $this->latte->setTempDirectory(__DIR__ . '/../storage/views');
        $set = new \Latte\Macros\MacroSet($this->latte->getCompiler());
        $set->addMacro('url', function ($node, $writer) {
            return $writer->write('echo "' . SITE_URL . '%node.args' . '"');
        });
    }

    public function loadConfig()
    {
        $this->config = require __DIR__ . '/../config/base.php';
    }

    public function render($name, array $params = [], $block = NULL)
    {
        $params['sitename'] = 'sijiaomao mvc framework';
        $tplFile = __DIR__ . '/../views/' . $name . '.latte';
        $this->latte->render($tplFile, $params, $block);
    }

    public function redirect($name)
    {
        header('Location:' . SITE_URL . '/' . $name);
        exit;
    }


}