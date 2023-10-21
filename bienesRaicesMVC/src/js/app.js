document.addEventListener('DOMContentLoaded', function () {
    eventListeners();
    darkMode();
});

function darkMode() {

    const prefiereDarMode = window.matchMedia('(prefers-color-schema: dark)');
    //console.log(prefiereDarMode.maches);

    if (prefiereDarMode) {
        document.body.classList.add('dark-mode'); //para aderir al body una clase 
    } else {
        document.body.classList.add('dark-mode');
    }

    prefiereDarMode.addEventListener('change', function () {
        if (prefiereDarMode) {
            document.body.classList.add('dark-mode'); //para aderir al body una clase 
        } else {
            document.body.classList.add('dark-mode');
        }
    });
    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
    }); //esto es un colback
}


function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
}

function navegacionResponsive() {

    const navegacion = document.querySelector('.navegacion');

    if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');
    }

    //realiza lo mismo pero es mas corto el codigo
    //navegacion.classList.toggle('mostrar');

}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
          <label for="telefono">Tu numero de telefono </label>
          <input data-cy="input-telefono" type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]">
          <p>Eliga la fecha y la hora</p>

          <label for="fecha">Fecha: </label>
          <input data-cy="input-fecha" type="date" id="fecha" name="contacto[fecha]">

          <label for="hora">Hora: </label>
          <input data-cy="input-hora" type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
     `;
    } else {
        contactoDiv.innerHTML = `
         <label for="email">Tu E-mail</label>
         <input data-cy="input-email" type="email" placeholder="Tu email" id="email" name="contacto[email]" required>
`;
    }
}