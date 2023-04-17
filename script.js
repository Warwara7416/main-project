const formInsert = document.getElementById("form-insert-student");
const msg = document.querySelector(".message");
const msgGroups = document.querySelector(".message");
const content = document.querySelector(".content");
const formInsertGroups = document.getElementById("form-insert-groups");

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

formInsertGroups.addEventListener("submit", (event) => {
  event.preventDefault();   //отменяем стандартную отправную форму
  console.log("ok");
  let formData = new FormData(formInsertGroups);  //собираем данные с формы, которые ввел пользователь

  let xhr = new XMLHttpRequest();         //создаем объект отправки запроса на сервер
  xhr.open("POST", "insertGroups.php");   //открываем соединение
  xhr.send(formData);                     //отправка данных на сервер

  xhr.onload = () => {

    if(xhr.response == "ok") {
      msgGroups.innerHTML = "Группа добавлена";
      msgGroups.classList.add("success");
      msgGroups.classList.add("show-message");

      let div   = document.createElement("div");
      let title = formData.get("title");

      div.innerHTML = `${title}`;
      content.append(div);
    }

    else {
      msgGroups.innerHTML = "Ошибка";
      msgGroups.classList.add("reject");
      msgGroups.classList.add("show-message");
    }

  };

});
