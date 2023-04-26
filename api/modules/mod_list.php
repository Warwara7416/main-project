<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
  <label for="age"></label>
  <input type="range" id="age" name="age" min="0" value="110" max="110" step="1" oninput="level.value = age.valueAsNumber">

  <output for="age" name="level">110</output><br>

  <input type="radio" id="desc_sort" name="sort" value="desc">
  <label for="desc_sort">По убыванию</label><br>

  <input type="radio" id="asc_sort"  name="sort" value="asc">
  <label for="asc_sort">По возрастанию</label><br>

  <input type="submit" value="Фильтровать">
</form>

<?php
$extra_sql  = " ";

if (isset($_POST['age'])) {
  $age       = $this -> formatstr($_POST['age']);
  $extra_sql = "WHERE age < $age";
}

//Код запроса
$sql = "SELECT * FROM `students`".$extra_sql;

//Выполнить запрос
$result = $this->connect->query($sql);





//Сортировка по возрастанию/убыванию (сделать через SQL ORDER BY)
if (isset($_POST['sort'])) {
  if ($_POST['desc']) {
    echo "hello";
  }
}






//Вывести результаты запроса на страницу
while ($row = $result->fetch_assoc()) {
  echo "<div>
          <a href='?option=details&id=$row[student_id]'>$row[lname]</a>, $row[fname], $row[sex], $row[age]
        </div>";
}
?>
