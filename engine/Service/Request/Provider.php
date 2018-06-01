<?php

/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 20.05.2018
 * Time: 19:33
 */
namespace Engine\Service\Request;

use Engine\Service\AbstractProvider;
use Engine\Core\Request\Request;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $ServiceName = 'request';
    /**
     * @return mixed
     */
    public function init()
    {
        $request = new request();
        $this->di->set($this->ServiceName, $request);
    }
}