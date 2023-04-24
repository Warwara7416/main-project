const formInsert = document.getElementById("form-insert-student");
const msg = document.querySelector(".message");
const msgGroups = document.querySelector(".message");
const content = document.querySelector(".content");
const formInsertGroups = document.getElementById("form-insert-groups");


//Отправка данных через форму
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


//Отправка данных без формы - метод get
//Лайки
const btnsLike = document.querySelectorAll(".like");

function setLike (str1, str2) {
  return function(event) {
  let idStudent = event.target.closest(".student").dataset.id;
  let xhr       = new XMLHttpRequest();

  xhr.open("GET", "api/setLike.php?id=" + idStudent);

  xhr.onload = function() {
    if(xhr.response=="ok like") {
      let num = +event.target.closest(".student").querySelector(".num-like").textContent;

      event.target.closest(".student").querySelector(".num-like").textContent = num + 1;
      console.log(str1);
    }
    else {
      console.log(str2);
    }
  }

  xhr.send();
}
}

for (btn of btnsLike) {
  btn.addEventListener("click", setLike("Успешно", "Ошибка"));
}
