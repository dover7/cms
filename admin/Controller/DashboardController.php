<?php
/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 30.05.2018
 * Time: 12:15
 */

namespace Admin\Controller;


class DashboardController extends AdminController
{
    public function index()
    {
        $this->view->render('dashboard');
    }
}