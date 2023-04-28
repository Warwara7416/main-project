<?php
session_start();
require_once ("config.php");

//Соединение с Базой Данных
$connect = new mysqli(HOST, USER, PASSWORD, DATABASE);

if($connect->connect_error) {
  exit("Ошибка подключения к Базе Данных: ".$connect->connect_error);
}

//Установка кодировки
$connect->set_charset("utf8");

$login    = $_POST['login'];
$password = $_POST['password'];


$sql = "SELECT *
        FROM `users`
        WHERE `login` = ? AND `password` = md5(?)";

$result = $connect->prepare($sql);
$result->bind_param("ss", $login, $password);
$result->execute();
$result = $result->get_result();

if ($row = $result->fetch_assoc()) {
  $response = [
    "status"  =>  "true",
    "name"    =>  $row["name"],
    "login"   =>  $row["login"]
  ];
  $_SESSION["user-name"] = $row["name"];
}
else {
  $response = [
    "status"  =>  false
  ];
}

echo json_encode($response);








?>
