<?php
require_once ("config.php");

//Соединение с Базой Данных
$connect = new mysqli(HOST, USER, PASSWORD, DATABASE);

if($connect->connect_error) {
  exit("Ошибка подключения к Базе Данных: ".$connect->connect_error);
}

//Установка кодировки
$connect->set_charset("utf8");

$id = $_GET['id'];

$sql = "UPDATE `students` SET `num_like`= `num_like` + 1 WHERE `student_id` = $id";

$result = $connect->query($sql);

if ($result) {
  echo "ok like";
}
else {
  echo "error like";
}

?>
