<?php

namespace Admin\Controller;

use Engine\Controller;

use Engine\Core\Auth\Auth;

class AdminController extends Controller           //admin@adm.com
{
    /**
     * @var Auth
     */
    protected $auth;

    /**
     * @var array
     */
    public $data = [];
    /**
     * AdminController constructor.
     * @param \Engine\DI\DI $di
     */
    public function __construct($di)
    {
        parent::__construct($di);
        $this->auth = new Auth();

        if ($this->auth->hashUser() == null) {
        header('Location: /admin/login/');
        exit;
        } else {
        $this->checkAutorization();
        }
    }

    /**
     * Check Auth
     */
    public function checkAutorization()
    {

    }

    public function logout()
    {
        $this->auth->unAuthorize();
        header('Location: /admin/login/');
        exit;
    }

}