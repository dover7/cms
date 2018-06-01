<?php

namespace Engine\Core\Request;

class Request
{
    /**
     * @var
     */
    public $get;
    /**
     * @var
     */
    public $post;
    /**
     * @var array
     */
    public $request = [];
    /**
     * @var array
     */
    public $cookie = [];
    /**
     * @var array
     */
    public $files = [];
    /**
     * @var array
     */
    public $server = [];

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->request = $_REQUEST;
        $this->cookie = $_COOKIE;
        $this->files = $_FILES;
        $this->server = $_SERVER;
    }

}