<?php

/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 20.05.2018
 * Time: 19:33
 */
namespace Engine\Service\Database;

use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $ServiceName = 'db';
    /**
     * @return mixed
     */
    public function init()
    {
        $db = new Connection();
        $this->di->set($this->ServiceName, $db);
    }
}