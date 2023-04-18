document.addEventListener('DOMContentLoaded', function () {
    iniciarApp();
});

function iniciarApp() {
    consultarApi();
    black();
}

async function consultarApi() {
    let num = 24;
    let poke = [];

    for (let i = 0; i < num; i++) {
        poke[i] = i;
    }


    for (let i = 1; i <= poke.length; i++) {

        let url = `https://pokeapi.co/api/v2/pokemon/${i}`;
        try {
            const response = await fetch(url);
            const data = await response.json(response);
            mostrarApi(data);

        } catch (error) {
            console.log(error);
        }
    }
}


function mostrarApi(data) {

    const {
        sprites,
        name
    } = data;



    const img = sprites.other.dream_world.front_default;

    const divCard = document.createElement('DIV');
    divCard.classList.add('card');
    const divCarBody = document.createElement('DIV');
    divCarBody.classList.add('card-body');
    divCarBody.innerHTML = `
    <p class="name">Nombre: ${name}</p>
    <img class="imagenes" src="${img}" alt="imagen pokemon">

    `;
    divCard.appendChild(divCarBody);
    const cartas = document.querySelector('.cartas');
    cartas.appendChild(divCard);

}

function black() {


    const black = document.getElementById('black');

    black.addEventListener('click', () => {
        const s = document.querySelector('.black');
        const v = document.body.classList;
        //? forma corta toogle
        // v.toggle('black');

        //? forma con condicional
        // if(!s){
        //     v.add('black');
        // }else{
        //     v.remove('black');
        // }
        //?forma con perador ternario
        !s ? v.add('black') : v.remove('black');
    });
}
