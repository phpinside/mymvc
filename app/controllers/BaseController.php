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

    public function __construct()
    {
        $this->initDb();
        $this->initTpl();
    }

    public function initDb()
    {
        Pheasant::setup('mysql://mymvc:123456@localhost:3306/mydb');
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