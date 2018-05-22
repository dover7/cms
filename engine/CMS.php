<?php

namespace Engine;
class CMS {
    /**
     * @var
     */
    private $di;

    public $router;

    /**
     * CMS constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }
    /*
     * Run CMS
     */
    public function run()
    {
     //   echo 'Hello:)<BR>';
        $this->router->add('home','/','HomeController:index');
        print_r($this->di);
    }
}
