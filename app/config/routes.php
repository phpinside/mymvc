<?php
/**
 * Created by PhpStorm.
 * User: Cral
 * Date: 2016/11/15 0015
 * Time: 下午 7:58
 *
 * URl的匹配规则，就算规则相同，也不会被覆盖。
 * 排在前面的规则优先级高!!!
 * 第一个被匹配的最先处理，后面的匹配规则则会被抛弃!
 */


// map homepage
$router->map('GET', '/', function () {
    echo '<h1>'.date('Y-m-d H:i:s').'   Hello, MyMVC ! ';
    echo '<br><a href="/todo/index">去看看示例</a></h1>';
});

// map users details page
$router->map('GET|POST', '/users/[i:id]', 'UserController@showDetails');

//$router->map('GET', '/showtest', 'Home@show');
//$router->map('GET', '/home/index', 'Home@index');
//$router->map('GET', '/home/index', 'Home@show');

