///<reference types="cypress" />

describe('Prueba el formulario de Contacto',()=>{

    it('Prueba la apagina de contacto y el envio de emails',()=>{

        cy.visit('/contacto');

        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal','Contacto');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal','Formulario contacto');

        cy.get('[data-cy="heading-formulario"]').should('exist');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal','Llene el formulario de contacto');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('not.equal','Llena el formulario');

        cy.get('[data-cy="formulario-contacto"]').should('exist');
    });

    it('Lena los campos del formulario',()=>{
    
        cy.get('[data-cy="input-nombre"]').type('jesus bernardo mendoza romero');
        cy.get('[data-cy="input-mensaje"]').type('el perro esta escribiendo solo esto se un fantasma');
        cy.get('[data-cy="input-opciones"]').select('Vende');
        cy.get('[data-cy="input-precio"]').type('1200000');
        cy.get('[data-cy="forma-contacto"]').eq(1).check();

        cy.wait(3000);
        cy.get('[data-cy="forma-contacto"]').eq(0).check();

        cy.get('[data-cy="input-telefono"]').type('1234567890');
        cy.get('[data-cy="input-fecha"]').type('2022-12-03');
        cy.get('[data-cy="input-hora"]').type('12:30');

        cy.get('[data-cy="formulario-contacto"]').submit();
        cy.get('[data-cy="alerta-envio-formulario"]').should('exist');
        cy.get('[data-cy="alerta-envio-formulario"]').invoke('text').should('equal','Mensaje enviado correctamente');
        cy.get('[data-cy="alerta-envio-formulario"]').should('have.class', 'alerta').and('have.class','exito').and('not.have.class','error');
    });

    
});