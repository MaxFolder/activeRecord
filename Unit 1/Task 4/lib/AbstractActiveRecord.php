<?php

namespace WS\Education\Unit1\Task4;

class AbstractActiveRecord {

    protected static $tableName;

    public function save() {

        $pdo = Db::getInstance()->getPDO();

        if ($this->id) {
            $sth = $pdo->prepare(
                "UPDATE " . static::$tableName .
                " SET " . $this->prepareUpdate() .
                " WHERE ID = :id"
            );

            $sth->bindParam(':id',$this->id, \PDO::PARAM_INT);

        } else {
            $sth = $pdo->prepare(
                "INSERT INTO " . static::$tableName .
                " SET " . $this->prepareUpdate()
            );
        }

        $vars = $this->getVars();

        foreach ($vars as $key => $var) {
            $sth->bindValue(":" . $key, $var);
        }

        $sth->execute();

    }

    protected function getVars() {
        $vars = get_object_vars($this);

        if (isset($vars["id"])) {
            unset($vars["id"]);
        }
        return $vars;
    }

    protected function prepareUpdate() {
       $vars = $this->getVars();
       $varsKeys = array_keys($vars);

        $arSql = [];

       foreach ($varsKeys as $key) {
           $arSql[]= $key."=:".$key;
       }
       $sqlString = implode(",", $arSql);

       return $sqlString;
    }


    public static function delete($id) {
        $pdo = Db::getInstance()->getPDO();

        $sth = $pdo->prepare(
            "DELETE FROM  " . static::$tableName .
            " WHERE id = :id"
        );

        $sth->bindParam(':id', $id, \PDO::PARAM_INT);

        $sth->execute();
    }


    public static function find($id) {
        $pdo = Db::getInstance()->getPDO();
        $sth = $pdo->prepare("SELECT * FROM " .static::$tableName . " WHERE ID = ?");
        $sth->execute([$id]);
        return( $sth->fetchObject(get_called_class()));

    }

}