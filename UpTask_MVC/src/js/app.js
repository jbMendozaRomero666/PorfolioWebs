const mobileMenuBtn = document.querySelector('#mobile-menu');
const cerrarMenuBtn = document.querySelector('#cerrar-menu');
const sidebar = document.querySelector('.sidebar');


if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', function () {
        //toggle si esta la quita si no esta la coloca
        sidebar.classList.add('mostrar');
    });
}

if (cerrarMenuBtn) {
    cerrarMenuBtn.addEventListener('click', function () {
        sidebar.classList.add('ocultar');

        setTimeout(() => {
            sidebar.classList.remove('mostrar');
            sidebar.classList.remove('ocultar');

        }, 1000);
    });
}

//Elimina la clase de mortrar, en un tamaño de tablets y mayores

const anchoPantalla = document.body.clientWidth;

window.addEventListener('rezise', function () {
    const anchoPantalla = document.body.clientWidth;
    if (anchoPantalla >= 768) {
        sidebar.classList.remove('mostrar');
    }
});