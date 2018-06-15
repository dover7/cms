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

    public function edit($id)
    {
        $pageModel = $this->load->model('page');

        $this->data['page']= $pageModel->repository->getPageData($id);

        $this->view->render('pages/edit',$this->data);
    }

    public function add()
    {
        $params = $this->request->post;
        $pageModel = $this->load->model('page');

        echo $pageId = $pageModel->repository->createPage($params);

        //print_r($params);
    }

    public function update()
    {
        $params = $this->request->post;
        $pageModel = $this->load->model('page');

        echo $pageId = $pageModel->repository->updatePage($params);

        //print_r($params);
    }
}