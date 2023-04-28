<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Клиент-серверное приложение</title>
  <link rel="stylesheet" href="style.css">
  <script defer src="script.js"></script>
  <script defer src="fetch.js"></script>
</head>
<body>

<form id="form-insert-student">
  <input type="text"   name="fname" id="fname" placeholder="Введите имя"     required><br>
  <input type="text"   name="lname" id="lname" placeholder="Введите фамилию" required><br>
  <input type="number" name="age"   id="age"   placeholder="Введите возраст" required><br>

  <input type="radio"  name="sex"   id="m"     value="m" checked>
  <label for="m">Мужской</label>

  <input type="radio"  name="sex"   id="f"     value="f">
  <label for="f">Женский</label>

  <input type="submit"  value="Добавить">
</form>

<form id="form-insert-groups">
  <input type="text"   name="title" id="title" placeholder="Введите название группы" required><br>
  <input type="submit" value="Добавить">
</form>

<div class="content">
<?php

require_once ("api/config.php");

//Соединение с Базой Данных
$connect = new mysqli(HOST, USER, PASSWORD, DATABASE);

if($connect->connect_error) {
  exit("Ошибка подключения к Базе Данных: ".$connect->connect_error);
}

//Установка кодировки
$connect->set_charset("utf8");

//Код запроса
$sql = "SELECT * FROM `students`";

//Выполнить запрос
$result = $connect->query($sql);

//Вывести результаты запроса на страницу
while ($row = $result->fetch_assoc())
{
  echo "<div class='student' data-id='$row[student_id]'>
          $row[lname], $row[fname], $row[sex], $row[age]
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chat-heart-fill like' viewBox='0 0 16 16'>
          <path d='M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15Zm0-9.007c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z'/>
          </svg>
          <span class='num-like'>$row[num_like]</span>
        </div>";
}

//Код запроса
$sqlGroups = "SELECT * FROM `groups`";

$resultGroups = $connect->query($sqlGroups);

//Вывести результаты запроса на страницу
while ($row = $resultGroups->fetch_assoc())
{
  echo "<div>
          $row[title]
        </div>";
}
?>
</div>
<div class="block"></div>

<div class="message">
  0_o
</div>

<form id="from-auth" method="POST" action="api/auth.php">
  <input type="text"      id="login"    name="login"      placeholder="Введите логин"   required> <br>
  <input type="password"  id="pasword"  name="password"   placeholder="Введите пароль"  required> <br>
  <input type="submit"    value="Войти">
</form>

</body>
</html>
