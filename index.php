<?php
header("Content-Type:text/html; charset=UTF-8");

require_once("api/config.php");
require_once("api/core.php");

if (isset($_GET["option"])) {
  $class = trim(strip_tags($_GET["option"]));
}
elseif (isset($_POST["option"])) {
  $class = trim(strip_tags($_POST["option"]));
}
else {
  $class = "main";
}

if (file_exists("api/".$class.".php")) {  //Если файл существует
  include("api/".$class.".php");          //То подключаем

  if (class_exists($class)) {         //Если класс существует
    $obj = new $class;                //Создаем объект от класса Main
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
