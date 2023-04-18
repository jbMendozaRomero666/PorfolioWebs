const options = {
    method: 'GET',
    headers: {
        'X-RapidAPI-Key': '1f4ef4cf4cmsh68e0f334889e172p1d6492jsnbf72855614e9',
        'X-RapidAPI-Host': 'coinranking1.p.rapidapi.com'
    }
};

fetch('https://coinranking1.p.rapidapi.com/coins?referenceCurrencyUuid=yhjMzLPhuIDl&timePeriod=24h&tiers%5B0%5D=1&orderBy=marketCap&orderDirection=desc&limit=50&offset=0', options)
    .then(response => response.json())
    .then(response => console.log(response))
    .catch(err => console.error(err));

const container = document.querySelector('.container');

const renderResponse = (response) => {

    response.forEach(response => {

        const {
            name,
            color,
            symbol,
            iconUrl,
            rank,
            marketCap,
            price,
            btcPrice,
            coinrankingUrl,
            change
        } = response;

        const table = document.querySelector('#table');
        const row = document.createElement('ul');
        row.classList.add('ul');

        row.innerHTML = `
                           <li class="principal">
                           ${rank}
                           <img src="${iconUrl}" alt="Nombre Moneda ${name}">
                           <p>${name}<br><span>${symbol}</span></p>
                           </li>
                           <li>$${price}</li>
                           <li>${btcPrice}</li>
                           <li>$${marketCap}</li>
                           <li><a class="button" style="background-color: ${color};"href="${coinrankingUrl}">Grafico ${name} ${change}%</a></li>`;

                              table.appendChild(row);

    });
}
fetch('https://coinranking1.p.rapidapi.com/coins?referenceCurrencyUuid=yhjMzLPhuIDl&timePeriod=24h&tiers%5B0%5D=1&orderBy=marketCap&orderDirection=desc&limit=50&offset=0', options)
    .then((response) => response.json())
    .then((response) => renderResponse(response.data.coins));


function black() {

    const black = document.getElementById('black');

    black.addEventListener('click', () => {

        document.body.classList.toggle('black');



    });
}



// // peticionApi();
// // async function peticionApi() {

// //     try {
// //         const url = 'https://coinranking1.p.rapidapi.com/coins?referenceCurrencyUuid=yhjMzLPhuIDl&timePeriod=24h&tiers%5B0%5D=1&orderBy=marketCap&orderDirection=desc&limit=50&offset=0';

// //         const response = await fetch(url, {
// //             method: 'GET',
// //             headers: {
// //                 'X-RapidAPI-Key': '1f4ef4cf4cmsh68e0f334889e172p1d6492jsnbf72855614e9',
// //                 'X-RapidAPI-Host': 'coinranking1.p.rapidapi.com'
// //             }
// //         });


// //         const respuesta = await response.json();
// //         console.log(respuesta);

// //     } catch (error) {

// //     }
// // }