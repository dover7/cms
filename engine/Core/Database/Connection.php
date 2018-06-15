<?php

/**
 * Created by PhpStorm.
 * User: Диман_тест
 * Date: 20.05.2018
 * Time: 11:55
 */
namespace Engine\Core\Database;

use PDO;

use Engine\Core\Config\Config;

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
            $config = Config::file('database');
            $dsn  = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];
            $this->link = new PDO($dsn, $config['username'], $config['password']);
            return $this;
        }

    /**
     * @param $sql
     * @param array $values
     * @return mixed
     */
    public function execute($sql, $values = [])
        {
            $sth = $this->link->prepare($sql);
            return $sth->execute($values);
        }

    /**
     * @param $sql
     * @param array $values
     * @return array
     */
    public function query($sql, $values = []){
        $sth = $this->link->prepare($sql);
        $sth->execute($values);
            $result = $sth->FetchAll(PDO::FETCH_ASSOC);
            if ($result === false) {
                return [];
            }
            return $result;
        }

        public function lastInsertId()
        {
            return $this->link->lastInsertId();
        }

}

//$db = new connection();

//$db->execute("INSERT INTO `user` SET `username`='Diman',`password`='123456',`date`=".time());
//print_r($db->query("SELECT * FROM `user`"));