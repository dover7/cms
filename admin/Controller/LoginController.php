<?php
/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 30.05.2018
 * Time: 12:14
 */

namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;

use Engine\Core\Auth\Auth;

class LoginController extends Controller
{
    protected $auth;
    /**
     * LoginController constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if ($this->auth->hashUser() !== null)
        {
            $this->auth->authorize($this->auth->hashUser());
        }
        if ($this->auth->authorized())
        {
            header('Location: /admin/', thue, 301);
            exit;
        }
    }

    public function form()
    {
        $this->view->render('login');
    }

    public function authAdmin()
    {
        $params = $this->request->post;          //admin@adm.com
        $query = $this->db->query('
        SELECT *
        FROM `user`
        WHERE email="'. $params['email'] .'"
        AND password="'. md5($params['password']) .'"
        LIMIT 1
        ');
        if (!empty($query))
        {
            $user = $query[0];
            if ($user['role'] == 'admin'){
                $hash = md5($user['id'] . $user['email'] . $user['password'] . $this->auth->salt());
                $this->db->execute('
                    UPDATE user
                SET hash = "'. $hash .'"
                WHERE id = "'. $user['id'] .'"
                ');

                $this->auth->authorize($hash);
            }
        }
        print_r($query);exit;
      //  $this->auth->authorize('test');
        print_r($params);
    }

}