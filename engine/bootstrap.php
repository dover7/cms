<?php
/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 18.05.2018
 * Time: 12:42
 */
require_once __DIR__.'/../vendor/autoload.php';
use Engine\Cms;
use Engine\DI\DI;
try {
    $di=new DI();
    $Services = require __DIR__.'\Config\Service.php';

    foreach ($Services as $service)
    {
        $provider = new $service($di);
        $provider->init();
    }

    $cms = new Cms($di);
    $cms->run();
}catch (\ErrorException $e){
    echo $e->getMessage();
}