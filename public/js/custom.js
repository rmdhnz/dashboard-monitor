const myAlert = document.getElementById("my-alert-tambah-cabang");

setTimeout(() => {
  myAlert.style.opacity = "0";
  setTimeout(() => {
    myAlert.remove();
  }, 250);
}, 3000);
