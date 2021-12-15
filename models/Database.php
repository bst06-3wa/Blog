<?php
    namespace Models;

    abstract class Database
    {
        function __construct()
        {
            try {
                $this->bdd = new \PDO("mysql:dbname=" .BDD_CONNECT['dbname']. "host=" . BDD_CONNECT['host'], BDD_CONNECT['user'], BDD_CONNECT['password']);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
            
        }
    }