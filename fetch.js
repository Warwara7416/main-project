const formAuth = document.getElementById("from-auth");
const output = document.querySelector(".profile");

formAuth.addEventListener("submit", auth);

function auth(event) {
  event.preventDefault(); //Отменяем отправку формы
  let data = new FormData(formAuth);
  fetch("api/auth.php", {
    method: 'POST',
    body: data
  }).then(
    (response) => {
      return response.text();
  }).then(
      (text) => {
        if (text) {
          output.innerHTML = "Вы авторизованы";
          formAuth.style.display = "none";
        }
        else {
          let p = document.createElement("p");
          p.innerHTML = "Ошибка авторизации";
          output.prepend(p);
        }
      })

}
