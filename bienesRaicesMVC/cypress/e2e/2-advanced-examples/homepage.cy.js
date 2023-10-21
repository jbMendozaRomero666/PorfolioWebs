///<reference types="cypress" />
describe('Cargar la pagina principal', () => {
    it('Prueba el header de la pagina principal', () => {
        cy.visit('/');

        cy.get('[data-cy="heading-sitio"]').should('exist');
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal', 'Bienes Raices');
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', 'Venta de Casas y Departamentos Exclusivos  de lujo');


    });

    it('Prueba el Bloque de los iconos Principales', () => {

        cy.get('[data-cy="heading-nosotros"]').should('exist');
        cy.get('[data-cy="heading-nosotros"]').should('have.prop', 'tagName').should('equals', 'H2');


        //selecciona los iconos

        cy.get('[data-cy="iconos-nosotros"]').should('exist');
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length', 3);
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('not.have.length', 4);

    });

    it('Prueba la seccion Propiedades', () => {
        cy.get('[data-cy="anuncio"]').should('have.length', 3);
        cy.get('[data-cy="anuncio"]').should('not.have.length', 5);

        //Probar en enlace de la propiedad
        cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo-block');
        cy.get('[data-cy="enlace-propiedad"]').should('not.have.class', 'boton-amarillo');
        cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal', 'Ver Propiedad');

        //probar un enlace de propiedades
        cy.get('[data-cy="enlace-propiedad"]').first().click();
        cy.get('[data-cy="titulo-propiedad"]').should('exist');

        cy.wait(2000);
        cy.go('back');

    });

    it("Prueba el Routing hacia todas las Paginas", () => {
        cy.get('[data-cy="ver-propiedades"]').should('exist');
        cy.get('[data-cy="ver-propiedades"]').should('have.class','boton-verde');
        cy.get('[data-cy="ver-propiedades"]').invoke('attr','href').should('equal','/propiedades');
        cy.get('[data-cy="ver-propiedades"]').first().invoke('text').should('equal', 'Ver Todas');
        cy.get('[data-cy="ver-propiedades"]').first().click();
        cy.get('[data-cy="heading-propiedades"]').should('exist');
        cy.get('[data-cy="heading-propiedades"]').invoke('text').should('equal','Casas y Depas en Venta');
        cy.wait(2000);
        cy.go('back');
    });

    it(" Prueba el bloque de contacto" ,()=>{
            cy.get('[data-cy="imagen-contacto"]').should('exist');
            cy.get('[data-cy="imagen-contacto"]').find('h2').invoke('text').should('equal','Encuentra la casa de tus sueños');
            cy.get('[data-cy="imagen-contacto"]').find('p').invoke('text').should('equal','Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut, magni.');

            cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr','href')
            .then( href =>{
                cy.visit(href);
            })
            cy.get('[data-cy="heading-contacto"]').should('exist');
            cy.wait(2000);
            cy.visit('/');
    })

    it('prueba los testimoniales y el blog', ()=>{
        cy.get('[data-cy="blog"]').should('exist');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('not.equal','testimoniales');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal','Nuestro Blog');
        cy.get('[data-cy="blog"]').find('img').should('have.length',2);
        


        cy.get('[data-cy="testimoniales"]').should('exist');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('not.equal','Nuestro Blog');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('equal','testimoniales');

    })
});