
document.addEventListener('DOMContentLoaded', function () {
    iniciarapp();
});

function iniciarapp() {
    apiPokemon();
}

async function apiPokemon() {
    const url = `https://pokeapi.co/api/v2/pokemon/4`;
    try {
        const response = await fetch(url);
        const respuesta = await response.json(response);
        // console.log(respuesta);
            mostarPokemon(respuesta);
    } catch (error) {
        console.log(error)
    }
}

const mostarPokemon = (respuesta) => {

    const {
        name,
        abilities,
        moves,
        stats,
        sprites
    } = respuesta;

    const div = document.createElement('DIV');
    div.classList.add('card');

    const divD = document.createElement('DIV');
    divD.classList.add('card-body');
    const pokemon = sprites.other.dream_world.front_default;
    const abilidades = abilities[getRandomInt(2)].ability.name;
    const movi = moves[getRandomInt(83)].move.name;
    divD.innerHTML = `
    <div class="pokebolla">
        <div class="boll">
            <div class="bollArriba">
            </div>
            <div class="lineal">
            </div>
            <div class="bollAbajo">
            </div>
        </div>
        <div class="bolita">
            <div class="bolitas"></div>
        </div>
    </div>
    <img id="imagen" src="${pokemon}" alt="">
     <div class="card-text">
     <p class="nombre">${name}</p>
     <div class="card-text-body">
     <p class="">Habilidad: ${abilidades}</p>
     <p class="">Movimientos: ${movi}</p>
     <p class="">hp: ${stats[0].base_stat}</p>
     <p class="">attack: ${stats[1].base_stat}</p>
     <p class="">defense: ${stats[2].base_stat}</p>
     <p class="">special-attack: ${stats[3].base_stat}</p>
     <p class="">special-defense: ${stats[4].base_stat}</p>
     <p class="">speed: ${stats[5].base_stat}</p>
     </div>
     </div>
    `;

    div.appendChild(divD);

    const container = document.querySelector('.container');
    container.appendChild(div);
}

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}

function negro(){

    const boton = document.getElementById('button');

    boton.addEventListener('click', ()=>{
 document.body.classList.toggle('negro');
    })
}