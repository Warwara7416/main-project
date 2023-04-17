const formInsert = document.getElementById("form-insert-student");
const msg = document.querySelector(".message");
const content = document.querySelector(".content");

formInsert.addEventListener("submit", (event) => {
  event.preventDefault();   //отменяем стандартную отправную форму
  console.log("ok");
  let formData = new FormData(formInsert);  //собираем данные с формы, которые ввел пользователь

  let xhr = new XMLHttpRequest();         //создаем объект отправки запроса на сервер
  xhr.open("POST", "insertStudent.php");  //открываем соединение
  xhr.send(formData);                     //отправка данных на сервер

  xhr.onload = () => {

    if(xhr.response == "ok") {
      msg.innerHTML = "Студент добавлен";
      msg.classList.add("success");
      msg.classList.add("show-message");

      let div   = document.createElement("div");
      let fname = formData.get("fname");
      let lname = formData.get("lname");
      let sex   = formData.get("sex");
      let age   = formData.get("age");

      div.innerHTML = `${lname}, ${fname}, ${sex}, ${age}`;
      content.append(div);
    }

    else {
      msg.innerHTML = "Ошибка";
      msg.classList.add("reject");
      msg.classList.add("show-message");
    }

  };

});
