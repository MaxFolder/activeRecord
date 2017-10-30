<?php

namespace WS\Education\Unit1\Task4;

class User extends AbstractActiveRecord {

    protected $id;
    protected $name;
    protected $age;

    protected static $tableName = "user";

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
}

