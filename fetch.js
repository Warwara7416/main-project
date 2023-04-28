const formAuth = document.getElementById("from-auth");
const output = document.querySelector(".profile");

formAuth.addEventListener("submit", auth);

function auth(event) {
  event.preventDefault(); //Отменяем отправку формы
  let data = new FormData(formAuth);
  fetch("api/auth.php", {
    method: 'POST',
    'Content-Type': 'application/json',
    body: data
  }).then(
    (response) => {
      return response.json();
  }).then(
      (json) => {
        console.log(json);
        if (json.status) {
          output.innerHTML = "Вы авторизованы как " + json.name;
          formAuth.style.display = "none";
        }
        else {
          let p = document.createElement("p");
          p.innerHTML = "Ошибка авторизации";
          output.prepend(p);
        }
      })

}
