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

   // protected $model;

    /**
     * Controller constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di      = $di;
        $this->db      = $this->di->get('db');
        $this->view    = $this->di->get('view');
        $this->config  = $this->di->get('config');
        $this->request = $this->di->get('request');
        $this->load    = $this->di->get('load');
    //    $this->model   = $this->di->get('model');

        $this->initVars();
    }

    public function __get($key)
    {
        return $this->di->get($key);
    }

    public function initVars()
    {
        $vars = array_keys(get_object_vars($this));

        foreach ($vars as $var){
            if ($this->di->has($var)) {
                $this->{$var} = $this->di->get($var);
            }
        }
        return $this;
    }
}