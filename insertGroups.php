<?php
$title = $_POST["title"];

require_once ("config.php");

//Соединение с Базой Данных
$connect = new mysqli(HOST, USER, PASSWORD, DATABASE);

if($connect->connect_error) {
  exit("Ошибка подключения к Базе Данных: ".$connect->connect_error);
}

//Установка кодировки
$connect->set_charset("utf8");

//Код запроса
$sqlGroups = "INSERT INTO `groups`(`title`) VALUES ('$title')";

//Выполнение запроса
$resultGroups = $connect->query($sqlGroups);

if ($resultGroups) {
  echo "ok";
}
else {
  echo "error";
}
