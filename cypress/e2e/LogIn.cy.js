describe('Prueba de inicio de sesión', () => {
    beforeEach(() => {
        cy.visit('http://ticolancer-desarrollo.test/login'); 
    });

    describe('Prueba inicial de Cypress', () => {
        it('Carga la página de inicio de sesión', () => {
            cy.get('h1').should('contain', 'Inicia sesión'); 
        });

        it('Debería iniciar sesión exitosamente con credenciales válidas', () => {
            
            cy.get('input[name="email"]').first().type('jorge@gmail.com');
            cy.get('input[name="password"]').type('1234'); 

            cy.get('input[type="submit"][value="Iniciar sesión"]').click();

        });

       

    });
});
