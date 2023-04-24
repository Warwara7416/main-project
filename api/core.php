<?php
abstract class Core
{
  protected $connect;   //соединение с базой данных

  public function __construct() {
    //Соединение с Базой Данных
    $this->connect = new mysqli(HOST, USER, PASSWORD, DATABASE);

    if ($this->connect->connect_error) {
      exit("Ошибка подключения к Базе Данных: " . $this->connect->connect_error);
    }

    //Установка кодировки
    $this->connect->set_charset("utf8");
  }

  public function __destruct() {
    $this->connect->close();
  }

  public function get_body() {
    include "template/index.php";
  }

  public function formatstr ($str) {
    $str = trim             ($str);
    $str = stripslashes     ($str);
    $str = htmlspecialchars ($str);
    return $str;
  }
}
