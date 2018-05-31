<?php
/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 30.05.2018
 * Time: 12:14
 */

namespace Admin\Controller;


class LoginController extends AdminController
{
    public function form()
    {
        $this->view->render('login');
    }

}