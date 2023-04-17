const formInsert = document.getElementById("form-insert-student");
formInsert.addEventListener("submit", (event) => {
  event.preventDefault();   //отменяем стандартную отправную форму
  console.log("ok");
  let formData = new FormData(formInsert);  //собираем данные с формы, которые ввел пользователь

  let xhr = new XMLHttpRequest(); //создаем объект отправки запроса на сервер
  xhr.open("POST", "insertStudent.php");  //открываем соединение
  xhr.send(formData); //отправка данных на сервер
  xhr.onload = () => {console.log(xhr.response)};
});
