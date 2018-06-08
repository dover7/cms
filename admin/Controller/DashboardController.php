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
        $userModel = $this->load->model('User');

        $userModel->repository->test();
      //  print_r($userModel->repository->getUsers());
        $this->view->render('dashboard');
    }
}