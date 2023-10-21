///<reference types="cypress" />

describe('se esta probamdo el login',()=>{

    it('prueba la autenticacion en /login',()=>{
      
        cy.visit('/login');

        cy.get('[data-cy="heading-login"]').should('exist');
        cy.get('[data-cy="heading-login"]').should('have.text','Iniciar Sesión');

        cy.get('[data-cy="formulario-login"]').should('exist');

        //Ambos campos son obligatorios
        cy.get('[data-cy="formulario-login"]').submit();
        cy.get('[data-cy="alerta-login"]').should('exist');
        cy.get('[data-cy="alerta-login"]').eq(0).should('have.class','alerta').and('have.class','error');
        cy.get('[data-cy="alerta-login"]').eq(0).should('have.text','El Email es obligatorio');
         
        cy.get('[data-cy="alerta-login"]').eq(1).should('have.class','alerta').and('have.class','error');
        cy.get('[data-cy="alerta-login"]').eq(1).should('have.text','El Password es obligatorio');


    })
});
