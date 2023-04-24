<?php
//Создание подготавливаемого запроса
$result = $this -> connect -> prepare ("SELECT * FROM students WHERE student_id=?");

//Не акутально
// $result = $this -> connect -> query ("SELECT * FROM students WHERE student_id = $id");

//Связывание параметров с метками
$result -> bind_param("id", $id);

//Выполнение запроса
$result -> execute();

// Получение данных
$rows = $result -> get_result();

if (!$rows) {
  echo "<p>Данных нет</p>";
}
else {
  echo "<p class = 'back'><a href = '/'>Назад</a></p>";
  $myrow = $rows -> fetch_assoc();

  echo "<div>
        $myrow[lname], $myrow[fname], $myrow[age]
        </div>";
}



?>
