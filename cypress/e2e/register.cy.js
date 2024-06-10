describe('template spec', () => {

  // This step tries to create a new user, 
  // John Smith, with email John.Smith@gmail.com,
  // and password "myPassword123"
  beforeEach(() => {
    cy.visit('http://localhost/codespace/Web%20Technologies/WT-eCommerce/login.php');

    // Query for the "Create Account" button
    cy.get('[data-cy="register"]').as('registerBtn');
    
    cy.get("@registerBtn").click();
    cy.url().should('include', 'register.php');

    const first_name = "John";
    cy.get('input[name="first_name"]').as('firstNameInput');
    cy.get('@firstNameInput').type(first_name);
    cy.get('@firstNameInput').should('have.value', first_name);

    const last_name = "Smith";
    cy.get('input[name="last_name"]').as('lastNameInput');
    cy.get('@lastNameInput').type(last_name);
    cy.get('@lastNameInput').should('have.value', last_name);

    const email = "John.Smith@gmail.com";
    cy.get('input[name="email"]').as('emailInput');
    cy.get('@emailInput').type(email);
    cy.get('@emailInput').should('have.value', email);

    const password = "myPassword123";
    cy.get('input[name="pass1"]').as('passwordInput');
    cy.get('@passwordInput').type(password);
    cy.get('@passwordInput').should('have.value', password);

    cy.get('input[name="pass2"]').as('passwordInput');
    cy.get('@passwordInput').type(password);
    cy.get('@passwordInput').should('have.value', password);

    cy.get("input").contains("Create Account Now").click();
  })


  it('allows the user to login with the right credentials', () => {
    cy.visit('http://localhost/codespace/Web%20Technologies/WT-eCommerce/login.php');

    // Query for the email input field
    cy.get('[data-cy="email"]').as('emailInput');
    // Query for the password input field
    cy.get('[data-cy="password"]').as('passwordInput');

    // Assuming there is a registered user
    // with email John.Smith@gmail.com and password myPassword123
    cy.get('@emailInput').type("John.Smith@gmail.com");
    cy.get('@passwordInput').type("myPassword123");

    cy.get("input").contains("Login").click();

    cy.url().should('include', 'home.php');
  })

})