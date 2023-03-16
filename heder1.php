<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Header Example</title>
   <style>

header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem;
  background-color: #fff;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}

.logo a {
  font-size: 1.5rem;
  font-weight: bold;
  color: #333;
  text-decoration: none;
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

nav ul li {
  margin-right: 1rem;
}

nav ul li a {
  font-size: 1rem;
  font-weight: bold;
  color: #333;
  text-decoration: none;
  transition: all 0.3s ease-in-out;
}

nav ul li a:hover {
  color: #f00;
}

@media only screen and (max-width: 768px) {
  header {
    flex-direction: column;
    align-items: flex-start;
  }

  .logo a {
    margin-bottom: 1rem;
  }

  nav ul {
    flex-direction: column;
  }

  ul li {
margin: 0.5rem 0;
}
}

@media only screen and (max-width: 576px) {
.logo a {
font-size: 1.2rem;
}

nav ul li a {
font-size: 0.9rem;
}
}

   </style>

  </head>
  <body>
    <header>
      <div class="logo">
        <a href="#">Your Logo</a>
      </div>
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </nav>
    </header>
    <section>
      <h1>Welcome to Our Website</h1>
      <p>Learn more about our products and services</p>
      <button>Get Started</button>
    </section>
  </body>
</html>
