let senha = document.querySelector("#senha");
let alerta = document.querySelector(".box__form--alert");
senha.addEventListener("keydown", function (event) {
  let flag = event.getModifierState && event.getModifierState("CapsLock");
  if(flag) {
    alerta.innerHTML = "CapsLock ligado";
  } else {
    alerta.innerHTML = "";
  }
});
