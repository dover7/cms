<?php

namespace Engine;

use Engine\Core\Router\DispatchedRoute;
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
    try {
        $this->router->add('home', '/', 'HomeController:index');
        $this->router->add('news', '/news/', 'HomeController:news');
        $this->router->add('user', '/user/', 'UserController:index');
        // print_r($this->di);

        $routerDispatch = $this->router->dispatch(common::getMethod(), common::getPathUrl());
        if ($routerDispatch == null) {
            $routerDispatch = new DispatchedRoute('ErrorController:page404');
        }

        list($class, $action) = explode(':', $routerDispatch->getController(), 2);
        $controller = '\\Cms\\Controller\\' . $class;
        $parameters = $routerDispatch->getParameters();
        call_user_func_array([new $controller($this->di), $action], $parameters);
        // print_r($class);        print_r($action);
        //  print_r($routerDispatch);
        // echo common::getMethod();
        //  echo common::getPathUrl();
    } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
            }
    }
}
