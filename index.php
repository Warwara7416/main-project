<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Клиент-серверное приложение</title>
</head>
<body>

<form action="insertStudent.php" method="POST">
  <input type="text"   name="fname" id="fname" placeholder="Введите имя"     required><br>
  <input type="text"   name="lname" id="lname" placeholder="Введите фамилию" required><br>
  <input type="number" name="age"   id="age"   placeholder="Введите возраст" required><br>

  <input type="radio"  name="sex"   id="m"     value="m" checked>
  <label for="m">Мужской</label>

  <input type="radio"  name="sex"   id="f"     value="f">
  <label for="f">Женский</label>

  <input type="submit"  value="Добавить">
</form>

<?php

require_once ("config.php");

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
  echo "<div>
          $row[lname], $row[fname], $row[sex], $row[age]
        </div>";
}





?>

</body>
</html>
