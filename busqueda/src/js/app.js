// const frutas = [
//     { nombre: 'manzana', precio: 1.5, cantidad: 10 },
//     { nombre: 'pera', precio: 2.0, cantidad: 15 },
//     { nombre: 'naranja', precio: 1.0, cantidad: 20 },
//     { nombre: 'plátano', precio: 0.5, cantidad: 30 }
//   ];

//   const frutasInput = document.querySelector('#frutasInput');
//   const frutasLista = document.querySelector('#frutasLista');

//   frutasInput.addEventListener('input', busqueda);

//   function busqueda(){
//     const texto = frutasInput.value.toLowerCase();
//     const frutasFiltradas = frutas.filter(fruta => fruta.nombre.toLowerCase().includes(texto));

// // Limpiar lista anterior
// frutasLista.innerHTML = '';

// frutasFiltradas.forEach(fruta =>{
//     const li = document.createElement('li');
//     li.textContent = `${fruta.nombre} - Precio: ${fruta.precio} - Cantidad: ${fruta.cantidad}`;
//     frutasLista.appendChild(li);
// });
//   }

const inputsearcher = document.getElementById('inputsearcher');
const nameViewPokemon = document.getElementById('nameViewPokemon');
const showCardPokemon = document.getElementById('showCardPokemon');
const btnsearcher = document.getElementById('btnsearcher');

const urlAppPokemon = 'https://pokeapi.co/api/v2/pokemon/';
let pokeName = [];
let pruebas = [];

async function consultPokeApi() {
  const url = await fetch(urlAppPokemon);
  const result = await url.json();
  const results = result.results;
  pokeName = [...results];

  showViewPokemonName();
  pruebasIntegradas(pokeName);

}

function pruebasIntegradas(pokeName) {

  pokeName.forEach(pokeName => {
    const {
      name
    } = pokeName;
    fetch(`${urlAppPokemon}${name}`)
      .then(response => response.json())
      .then(data => pruebas.push(data));

  })
}

consultPokeApi();
viewPokemonCard();

function viewPokemonCard() {


  let text = inputsearcher.value.trim().toLowerCase();

  const filtrarNamePokemon = pruebas.filter(poke => poke.name.toLowerCase().includes(text));

  cleanHtml(showCardPokemon);
  filtrarNamePokemon.forEach(filtrarNamePokemon => {
    const {
      name,
      sprites,
      stats
    } = filtrarNamePokemon;
    // console.log(filtrarNamePokemon);
    hp = stats[0].stat.name;
    point = stats[0].base_stat;
    attack = stats[1].stat.name;
    attackpoint = stats[1].base_stat;
    defense = stats[2].stat.name;
    defensepoint = stats[2].base_stat;
    speed = stats[2].stat.name;
    speedpoint = stats[2].base_stat;
    let imgsrc = sprites.other.dream_world.front_default;
    let div = document.createElement('DIV');
    div.innerHTML = `
    <div id= 'card'>
      <div class='card-body'>
           <img src="${imgsrc}" alt="card pokemon">
           <h1>${name}</h1>
        <div class='card-footer'>
           
           <p>${hp}: ${point}</p>
           <p>${attack}: ${attackpoint}</p>
           <p>${defense}: ${defensepoint}</p>
           <p>${speed}: ${speedpoint}</p>
        </div>
       </div>
    </div>
    `;
    showCardPokemon.appendChild(div);
  })


}
btnsearcher.addEventListener('click', busqueda);
inputsearcher.addEventListener('input', busqueda);

function busqueda(e) {
  if (inputsearcher.value === '') {
    alert('No puede estar vacio el campo');
    showViewPokemonName();
    viewPokemonCard();
    return;
  }
  showViewPokemonName();
  viewPokemonCard();

}

function showViewPokemonName() {

  let text = inputsearcher.value.trim().toLowerCase();

  const filtrarNamePokemon = pokeName.filter(poke => poke.name.toLowerCase().includes(text));

  if (filtrarNamePokemon.length !== 0) {
    cleanHtml(listPokemon);
    filtrarNamePokemon.forEach(buspokemon => {
      const listPokemon = document.querySelector('#listPokemon');
      const li = document.createElement('LI');
      li.textContent = `${buspokemon.name}`;
      listPokemon.appendChild(li);
    });
  } else {
    alert('No se encientra el nombre del Pokemon Ingresado Intente de nuevo');
  }

}

function cleanHtml(pokenex) {
  while (pokenex.firstChild) {
    pokenex.removeChild(pokenex.firstChild);
  }
}

function alert(mensaje) { 
  clearAlert();
  
  const alert = document.createElement('DIV');
  alert.classList.add('alert');
  const p = document.createElement('P');
  p.innerHTML = mensaje;
  alert.appendChild(p);
  nameViewPokemon.appendChild(alert);

    setTimeout(() => {
    if (alert.parentNode) {
      alert.parentNode.removeChild(alert);
    }
  }, 3000);
  
}

function clearAlert() {
  const alerts = document.querySelector('.alert');

  if(alerts){
    alerts.remove();
  }
}

const dark = document.getElementById('dark');

dark.addEventListener('click',ModeDark);

function ModeDark(){
let cambio =document.body.classList;
 
const CambioDark = document.querySelector('.ModeDarkBody');

  // console.log(dark.innerHTML);
  // if(CambioDark){
  //   cambio.remove('ModeDarkBody');
  //   dark.innerHTML = 'Dark';
  // }else{
  //   cambio.add('ModeDarkBody');
  //   dark.innerHTML = 'Normal';

  // }
 // cambio.toggle('ModeDarkBody');
  CambioDark ? (cambio.remove('ModeDarkBody') , dark.innerHTML = 'Dark' ) : (cambio.add('ModeDarkBody'), dark.innerHTML = 'Normal');
  
}