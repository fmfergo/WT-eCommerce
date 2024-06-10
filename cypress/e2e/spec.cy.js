describe('template spec', () => {

  // A previous step before any tests in this spec is to log into an existing account
  beforeEach(() => {
    cy.visit('http://localhost/codespace/Web%20Technologies/WT-eCommerce/login.php');

    // Query for the email input field
    cy.get('[data-cy="email"]').as('emailInput');
    // Query for the password input field
    cy.get('[data-cy="password"]').as('passwordInput')

    // Assuming there is a registered user
    // with email John.Smith@gmail.com and password myPassword123
    // It should be created after running the tests in register.cy.js
    cy.get('@emailInput').type("John.Smith@gmail.com");
    cy.get('@passwordInput').type("myPassword123");

    cy.get("input").contains("Login").click();

  });


  it('allows the user to log out', () => {

    cy.get('[data-cy="logout"]').click();

    // When the user is logged out, the page redirects him to the login page
    cy.url().should('include', 'login.php');

  })

  it('adds an item to the shopping cart', () => {

    // An "Add to Cart" button is clicked
    cy.get('a').eq('4').click();

    // The page acknowleges that an item has been added to the shopping cart
    cy.url().should('include', 'added.php');
    cy.get('p').contains("has been added to your cart");
  })

  it('adds a second item of the same kind to the shopping cart', () => {

    // An "Add to Cart" button is clicked
    cy.get('a').eq('4').click();

    // We continue shopping and add a second item of the same kind
    // to the shopping cart
    cy.get('a').contains("Continue Shopping").click();
    cy.get('a').eq('4').click();

    // The page acknowleges that an item has been added to the shopping cart
    cy.url().should('include', 'added.php');

    cy.get('p').contains("Another");
  })

  it('shows the shopping cart after adding one item', () => {
    // An "Add to Cart" button is clicked
    cy.get('a').eq('4').click();

    // We go to the shopping cart
    cy.get('a').contains("View Your Cart").click();
    cy.get('p').contains("£ 12.99");
  })

  it('shows the shopping cart with the current content', () => {

    // An "Add to Cart" button is clicked
    cy.get('a').eq('4').click();

    // We continue shopping and add a second item to the shopping cart
    cy.get('a').contains("Continue Shopping").click();
    cy.get('a').eq('6').click();

    // We check the shopping cart total
    cy.get('a').contains("View Shopping Cart").click();
    cy.get('p').contains("£ 23.98");

  })

})