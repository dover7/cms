<?php

namespace Engine;

use Engine\Helper\Common;

class CMS {
    /**
     * @var
     */
    private $di;

    public $router;

    /**
     * CMS constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }
    /*
     * Run CMS
     */
    public function run()
    {
     //   echo 'Hello:)<BR>';
        $this->router->add('home','/','HomeController:index');
        $this->router->add('news','/news/','HomeController:news');
        $this->router->add('user','/user/','UserController:index');
       // print_r($this->di);

       $routerDispatch = $this->router->dispatch(common::getMethod(),common::getPathUrl());

       list($class, $action) = explode(':',$routerDispatch->getController(),2);
        $controller = '\\Cms\\Controller\\'.$class;
       call_user_func_array([new $controller($this->di), $action],$routerDispatch->getParameters());
       // print_r($class);        print_r($action);
      //  print_r($routerDispatch);
     // echo common::getMethod();
     //  echo common::getPathUrl();
    }
}
