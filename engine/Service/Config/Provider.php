<?php

/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 20.05.2018
 * Time: 19:33
 */
namespace Engine\Service\Config;

use Engine\Service\AbstractProvider;
use Engine\Core\Config\Config;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $ServiceName = 'config';
    /**
     * @return mixed
     */
    public function init()
    {
        //$config['main'] = config::file('main');
        $config['database'] = config::file('database');
        $this->di->set($this->ServiceName, $config);
    }
}