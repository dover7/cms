<?php
/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 22.05.2018
 * Time: 11:45
 */

namespace Engine;


use Engine\DI\DI;

abstract class Controller
{
    /**
     * @var DI
     */
    protected $di;
    protected $db;

    /**
     * Controller constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
    }
}