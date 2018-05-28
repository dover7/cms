<?php

/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 20.05.2018
 * Time: 19:33
 */
namespace Engine\Service\View;

use Engine\Service\AbstractProvider;
use Engine\Core\Template\View;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $ServiceName = 'view';
    /**
     * @return mixed
     */
    public function init()
    {
        $view = new view();
        $this->di->set($this->ServiceName, $view);
    }
}