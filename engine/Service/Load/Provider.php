<?php

/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 20.05.2018
 * Time: 19:33
 */
namespace Engine\Service\Load;

use Engine\Service\AbstractProvider;
use Engine\Load;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $ServiceName = 'load';
    /**
     * @return mixed
     */
    public function init()
    {
        $load = new load();
        $this->di->set($this->ServiceName, $load);
    }
}