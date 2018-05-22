<?php

/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 20.05.2018
 * Time: 19:33
 */
namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $ServiceName = 'router';
    /**
     * @return mixed
     */
    public function init()
    {
        $router = new Router('http://pro.localhost/');
        $this->di->set($this->ServiceName, $router);
    }
}