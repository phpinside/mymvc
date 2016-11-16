<?php
/**
 * Created by PhpStorm.
 * User: Cral
 * Date: 2016/11/16 0016
 * Time: 上午 7:13
 */

namespace app\controllers;


class BaseController
{
    private $latte;

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function initDb()
    {
        Pheasant::setup('mysql://mymvc:123456@localhost:3306/mydb');
    }

    public function initTpl()
    {
        $this->latte = new \Latte\Engine();
        $this->latte->setTempDirectory(__DIR__ . '/../storage/views');
    }

    public function render($name, array $params = [], $block = NULL)
    {
        $params['sitename'] = 'sijiaomao mvc framework';
        $this->latte->render($name, $params, $block);
    }

    public static function __callStatic($method, $args)
    {
        $instance = static::getFacadeRoot();

        if (! $instance) {
            throw new RuntimeException('A facade root has not been set.');
        }

        return $instance->$method(...$args);
    }

}