const formAuth = document.getElementById("from-auth");
const output = document.querySelector(".profile");

formAuth.addEventListener("submit", auth);

async function auth(event) {
  event.preventDefault(); //Отменяем отправку формы

  let data = new FormData(formAuth);

  const response = await fetch("api/auth.php", {
    method: 'POST',
    'Content-Type': 'application/json',
    body: data
  });

  json = await response.json();

  console.log(json);

  if (json.status) {
    output.innerHTML = "Вы авторизованы как " + json.name + "<a href='profile.php'>Профиль</a>";
    formAuth.style.display = "none";
  }
  else {
    let p = document.createElement("p");
    p.innerHTML = "Ошибка авторизации";
    output.prepend(p);
  }
}
