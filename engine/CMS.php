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
        $this->router->add('user','/user/','UserController:index');
       // print_r($this->di);
       $routerDispatch = $this->router->dispatch(common::getMethod(),common::getPathUrl());
        print_r($routerDispatch);
     // echo common::getMethod();
     //  echo common::getPathUrl();
    }
}
