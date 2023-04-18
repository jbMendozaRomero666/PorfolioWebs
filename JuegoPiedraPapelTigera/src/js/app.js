document.addEventListener('DOMContentLoaded', function () {
    iniciarApp();
});

function iniciarApp() {
    game();

}

const select = document.getElementById('seleccionar');

select.addEventListener('change', validar)
const mostrar = document.querySelector('.mostrar');

function validar() {
    
    let option = this.options[select.selectedIndex];
    const opt = option.text;
    game(opt);
    const li = document.createElement('li');
    li.innerHTML = `
                 <p>Jugador</p>
                 <img src="src/img/${opt}.png" alt=""> 
                 `;
    mostrar.appendChild(li);

}


function game(jugador) {
    limpiarHtml();
    let juego = ['piedra', 'papel', 'tijeras'];


    let random = juego[Math.floor(Math.random() * juego.length)];

    console.log(random);

    const li = document.createElement('li');

    li.innerHTML = `
                <p>Robot</p>
                <img src="src/img/${random}.png" alt="">
                 `;

    mostrar.appendChild(li);

    if (jugador !== random) {

        if (random === 'piedra') {
            if (jugador === 'tijeras') {
                // console.log(' el Ganador es Piedra');
                alerta('El ganador es Piedra');
            } else {
                alerta('El ganador es Papel');
            }
        } else if (random === 'papel') {
            if (jugador === 'piedra') {
                alerta('El ganador es Papel');
                // console.log('el Ganador es Papel')
            } else {
                alerta('El ganador es Tijeras');
                // console.log('el Ganador es tijeras')
            }
        } else if (random === 'tijeras') {
            if (jugador === 'piedra') {
                alerta('El ganador es Piedra');
                // console.log(' el Ganador es Piedra')
            } else {
                alerta('El ganador es Tijeras');
                // console.log(' el Ganador es tijeras')
            }
        }

    } else {
        alerta('Empate');
        // console.log(`Empate`);
    }
}

function limpiarHtml(){

    while(mostrar.firstChild){
        mostrar.removeChild(mostrar.firstChild);
    }
}

function ModoOscuro(){

    const nav = document.getElementById('nav');
    const cambio = document.body.classList;
    nav.addEventListener('click',()=>{
    //   cambio.toggle('ModoOscuro');
     
      const verificar = document.querySelector('.ModoOscuro');
      if(!verificar){
        cambio.add('ModoOscuro');
      }else{
        cambio.remove('ModoOscuro');
      }

    // !verificar ? cambio.add('ModoOscuro') : cambio.remove('ModoOscuro');
    });

}

function alerta(mensaje){
  const container = document.querySelector('.container');
  const div = document.createElement('DIV');
  div.classList.add('alerta');
  const p = document.createElement('P');
  p.innerHTML = mensaje;
  div.appendChild(p);
  container.appendChild(div);

  setTimeout(() => {
    const alerta = document.querySelector('.alerta');
    alerta.remove();
  }, 3000);
  
}