function time() {
  const date = new Date();

  let horas = date.getHours();
  let min = date.getMinutes();
  let segundos = date.getSeconds();
  // console.log(`${horas}:${min}:${segundos}`);
  pm = false;

  horas = checkTime(horas);
  min = checkTime(min);
  segundos = checkTime(segundos);

  if (horas > 12) {
    horas -= 12;
    pm = true;
  } else {
    pm = false;
  }
 
  if (pm = true) {
    document.body.classList.add('noche');
  }
  pm = true ? 'pm' : 'am';
  document.getElementById("clock").innerHTML = horas + ":" + min + ":" + segundos + " " + pm;
  
  let tiempo = setTimeout(function () {
    time();
  }, 500);
 
}

function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}