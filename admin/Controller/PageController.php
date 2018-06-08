<?php
/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 30.05.2018
 * Time: 12:13
 */

namespace Admin\Controller;


class PageController extends AdminController
{
    public function listing()
    {
        $pageModel = $this->load->model('page');
        $data['pages']=$pageModel->repository->getPages();
        $this->view->render('pages/list', $data);
    }

    public function create()
    {
        $pageModel = $this->load->model('page');

        $this->view->render('pages/create');
    }
}