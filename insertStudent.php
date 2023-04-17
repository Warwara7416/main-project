<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$age   = $_POST["age"];
$sex   = $_POST["sex"];


require_once ("config.php");

//Соединение с Базой Данных
$connect = new mysqli(HOST, USER, PASSWORD, DATABASE);

if($connect->connect_error) {
  exit("Ошибка подключения к Базе Данных: ".$connect->connect_error);
}

//Установка кодировки
$connect->set_charset("utf8");

//Код запроса
$sql = "INSERT INTO `students`(`fname`, `lname`, `sex`, `age`) VALUES ('$fname','$lname','$sex', $age)";

//Выполнение запроса
$result = $connect->query($sql);

if ($result) {
  echo "ok";
}
else {
  echo "error";
}
?>
