<?php

namespace app\controllers;

use app\controllers\BaseController;
use app\models\Post;
use app\models\Author;


class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }



    public function index($arg1)
    {
        echo '我故意的 home.index ',$arg1 ;
        //print_r(func_get_args());
      //  throw new \Exception("我故意的", 1);
        //return view('home');
        //$this->view->render();
        //$this->view('home',[]);
      //  return view('home')->with('articles', \App\Article::all());
        //return view('home')->withArticles(\App\Article::all());
    }

    /*
     * 按照模型的字段设定，创建数据库表
     * */
    public  function migrate(){
        $migrator = new \Pheasant\Migrate\Migrator();
        $migrator->initialize( Post::schema(),'post');
        $migrator->initialize( Author::schema(),'author');
        echo 'migrate post done! <br>';
        echo 'migrate author done! <br>';
    }

    public  function show(){
        echo   'Home@show';
    }
}
