<?php
/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 22.05.2018
 * Time: 11:45
 */

namespace Engine;

use Engine\Core\Database\QueryBuilder;
use Engine\DI\DI;

abstract class Model
{
    /**
     * @var DI
     */
    protected $di;
    protected $db;

    protected $view;

    protected $config;

    protected $request;

    /**
     * Model constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->config = $this->di->get('config');

        $this->queryBuilder = new QueryBuilder();
    }
}