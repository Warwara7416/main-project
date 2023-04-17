<?php
//Код запроса
$sql = "SELECT * FROM `students`";

//Выполнить запрос
$result = $this->connect->query($sql);

//Вывести результаты запроса на страницу
while ($row = $result->fetch_assoc())
{
  echo "<div>
          $row[lname], $row[fname], $row[sex], $row[age]
        </div>";
}
?>
