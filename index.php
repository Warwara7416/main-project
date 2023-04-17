<?php
header("Content-Type:text/html; charset=UTF-8");

require_once("api/config.php");
require_once("api/core.php");

if (file_exists("api/main.php")) {  //Если файл существует
  include("api/main.php");          //То подключаем

  if (class_exists("Main")) {       //Если класс существует
    $obj = new Main;                //Создаем объект от класса Main
    $obj->get_body();
  }
  else {
    exit ("<p>Неверный класс</p>");
  }
}
else {
  exit ("<p>Неверный путь</p>");
}
?>
