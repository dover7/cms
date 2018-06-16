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
        $this->load->model('page');
        $data['pages']=$this->model->page->getPages();
        $this->view->render('pages/list', $data);
    }

    public function create()
    {
        $this->load->model('page');

        $this->view->render('pages/create');
    }

    public function edit($id)
    {
        $this->load->model('page');
        $this->data['page']= $this->model->page->getPageData($id);

        $this->view->render('pages/edit',$this->data);
    }

    public function add()
    {
        $this->load->model('page');
        $params = $this->request->post;

        echo $pageId = $this->model->page->createPage($params);

        //print_r($params);
    }

    public function update()
    {
        $this->load->model('page');
        $params = $this->request->post;

        echo $pageId = $this->model->page->updatePage($params);

        //print_r($params);
    }
}