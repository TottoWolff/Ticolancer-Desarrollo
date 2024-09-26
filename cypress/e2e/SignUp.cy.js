describe('Prueba de registro', () => {
    beforeEach(() => {
        cy.visit('http://ticolancer-desarrollo.test/signup');
    });

    describe('Prueba inicial de Cypress', () => {
        it('Carga la página de inicio', () => {
            cy.visit('http://ticolancer-desarrollo.test/signup');
            cy.get('h1').should('contain', 'Bienvenido a ');
        });

        it('Debería registrar un nuevo usuario exitosamente', () => {
            // Completa el formulario de registro
            cy.get('input[name="email"]').type("nene@gmail.com");
            cy.get('input[name="password"]').type('1234');
            cy.get('input[name="password_confirmation"]').type('1234');
            cy.get('input[type="button"][value="Siguiente "]').first().click();

            Cypress.on('uncaught:exception', (err, runnable) => {
                if (err.message.includes("Cannot read properties of null")) {
                    return false; // Ignora el error
                }
            });

            // Completa el segundo paso: crea tu perfil
            cy.get('input[name="username"]').type('nene');
            cy.get('input[name="name"]').type('Emanuel');
            cy.get('input[name="lastname"]').type('Jiménez');
            cy.get('input[type="button"][value="Siguiente "]')
                .filter(':visible')  
                .click();

            // Completa el tercer paso: información de contacto
            cy.get('input[name="phone"]').type('60000000'); 
            cy.get('input[type="button"][value="Siguiente "]').last().click();

            // Completa el cuarto paso: ubicación
            cy.get('select[name="province"]').select('1'); 
            cy.get('select[name="city"]').select('1'); 
            cy.get('input[type="submit"][value="Enviar "]').click();

            // Verifica si el registro fue exitoso
            cy.get('.bg-green-500').should('contain', 'Registro exitoso'); 
        });
    });
});
