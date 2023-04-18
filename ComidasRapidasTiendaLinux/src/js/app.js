
const li = document.querySelectorAll('#navegacion li');
const containerBodyModalUbuntu = document.querySelector('.containerBodyModalUbuntu');
const listaDesordenada = document.querySelector('.listaDesordenada');
const ProductosTipoVentanaUbuntu = document.querySelector('.ProductosTipoVentanaUbuntu');

li.forEach(li => {

    li.addEventListener('click', ModalUbuntu);

});

function ModalUbuntu(e) {

    if (e.target.dataset.id === 'menu') {

    
        const menuUbuntu = document.querySelector('.menuUbuntu');

        if (!menuUbuntu) {
        
            const menuUbuntu = document.createElement('DIV');
            menuUbuntu.classList.add('menuUbuntu');
            const contenido = document.createElement('DIV');
            contenido.classList.add('contenido');
            menuUbuntu.appendChild(contenido);
            contenido.innerHTML = `
                            <ul>
                                <li data-id="Hamburguesa">
                                    <img src="src/img/Hamburguesa.png" alt="">
                                </li>
                                <li data-id="Tacos">
                                    <img src="src/img/Tacos.png" alt="">
                                </li>
                                <li data-id="Pizza">
                                    <img src="src/img/pizza.png" alt="">
                                </li>
                                <li data-id="lazaña">
                                    <img class="filter" src="src/img/lazana.png" alt="">
                                </li>
                                <li data-id="perrosCalientes">
                                    <img src="src/img/perrosCalientes.png" alt="">
                                </li>
                                <li data-id="bebidas">
                                    <img src="src/img/bebidas.png" alt="">
                                </li>
                             </ul>   

                                `;
            containerBodyModalUbuntu.appendChild(menuUbuntu);

            listaDesordenada.classList.add('seleccion');
        } else {
            menuUbuntu.remove('contenido');
            listaDesordenada.classList.remove('seleccion');
        }

    }else{
        
        apiRestauranteUbuntu(e.target.dataset.id);
    }
    // console.log(e.target.dataset.id);
    // console.log(menuUbuntu);


}

function ModalPersonalizadoDemasPantalla(response,id){
    

    const ProductosTipoVentanaUbuntu = document.querySelector('.ProductosTipoVentanaUbuntu');
  if(!ProductosTipoVentanaUbuntu){
    const ProductosTipoVentanaUbuntu = document.createElement('DIV');
    ProductosTipoVentanaUbuntu.classList.add('ProductosTipoVentanaUbuntu');
    //?Reemplazar forEach con map para generar las filas de la tabla. Esto permite utilizar join('') para convertir el array de filas en una cadena de texto que se pueda insertar dentro del HTML.
    ProductosTipoVentanaUbuntu.innerHTML = `
                                        <div class="barraMenuNav"></div>
                                            <div class="bodyContainer">
                                            <div class="panelLateralDerecho"></div>
                                            <div class="panelLateralIzquierdo">
                                            <div class="imagendelMenu">
                                            <img src="src/img/${id}.webp" alt="">
                                            </div>
                                           <div class="cartaMenu">
                                           <table>
                                                       <tr>
                                                           <th>Nombre</th>
                                                           <th>Descripcion</th>
                                                           <th>Precio</th>
                                                       </tr>
                                                       ${response.map(response =>{
                                                           const {
                                                             nombre,
                                                             descripcion,
                                                             precio
                                                           } = response;
                                                           return `
                                                           <tr>
                                                               <td>${nombre}</td>
                                                               <td>${descripcion}</td>
                                                               <td>${precio}</td>
                                                           </tr>
                                                           `
                                                      }).join('')};
                                                      </table>
                                           </div>
                                            </div>
                                        </div>
                                          ;`
                                          
            containerBodyModalUbuntu.appendChild(ProductosTipoVentanaUbuntu);
    }else{
        ProductosTipoVentanaUbuntu.remove();
        console.log('error')
    }


}


async function apiRestauranteUbuntu(id){
   
    const url = `http://localhost:5500/${id}`;

    const urlresponse = await fetch(url);
    const response = await urlresponse.json();
    console.log(response);
    ModalPersonalizadoDemasPantalla(response,id);

}