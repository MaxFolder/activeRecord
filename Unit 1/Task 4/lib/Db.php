<?php

namespace WS\Education\Unit1\Task4;

use PDO;

class Db {

    const USER = "root";
    const PWD = "test";
    const DBNAME = "activeRecord";
    const HOST = "localhost";

    private static $db;
    private $pdo;

    private function __construct() {
        $pdo = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME.'', self::USER, self::PWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
    }

    public static function getInstance() {

        if (!self::$db) {
            self::$db = new Db();
        }
        return self::$db;
    }

    public function getPDO() {
        return $this->pdo;
    }

}