<?php

use WS\Education\Unit1\Task4\User;

include "../autoload.php";

//namespace WS\Education\Unit1\Task4;


/**
 * @var User $newUser
 */

$userId = 786;

//Обновление записи в таблице

//$newUser = User::find($userId); // должен вернуть обьект строки таблицы
//$newUser->setName("folder1");
//$newUser->save();

//Создание записи в таблице

//$newRow = new User();
//$newRow->setName("Max Folder");
//$newRow->setAge("50");
//$newRow->save();

//
//Удаление записи в таблице
/**
 * @var User $rowObj
 */


$rowObj = User::find($userId);
$rowId = $rowObj->getId();
User::delete($rowId);
