const formAuth = document.getElementById("from-auth");

formAuth.addEventListener("submit", auth);

function auth(event) {
  event.preventDefault(); //Отменяем отправку формы
  let data = new FormData(formAuth);
  fetch("api/auth.php",{
    method: 'POST',
    body:   data
  }).then (
    (response)=>  { return response.text();
  }).then (
    (text)    =>  { console.log(text);
  })

}
