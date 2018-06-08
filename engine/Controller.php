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

    protected $view;

    protected $config;

    protected $request;

    protected $load;

    /**
     * Controller constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->view = $this->di->get('view');
        $this->request = $this->di->get('request');
        $this->load = $this->di->get('load');
    }
}