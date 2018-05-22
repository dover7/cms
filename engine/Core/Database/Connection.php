<?php

/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 20.05.2018
 * Time: 11:55
 */
namespace Engine\Core\Database;

use PDO;

class Connection
{
        private $link;

    /**
     * Connection constructor.
     */
    public function __construct()
        {
            $this->connect();
        }

    /**
     * @return $this
     */
    private function connect(){
            $config = require 'config.php';
            $dsn  = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];
            $this->link = new PDO($dsn, $config['username'], $config['password']);
            return $this;
        }

    /**
     * @param $sql
     * @return mixed
     */
    public function execute($sql)
        {
            $sth = $this->link->prepare($sql);
            return $sth->execute();
        }

    /**
     * @param $sql
     * @return array
     */
    public function query($sql){
        $sth = $this->link->prepare($sql);
        $sth->execute();
            $result = $sth->FetchAll(PDO::FETCH_ASSOC);
            if ($result === false) {
                return [];
            }
            return $result;
        }

}

//$db = new connection();

//$db->execute("INSERT INTO `user` SET `username`='Diman',`password`='123456',`date`=".time());
//print_r($db->query("SELECT * FROM `user`"));