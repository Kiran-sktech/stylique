<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>About Stylique</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #fdfdfd;
    margin: 0;
    padding: 0;
  }

    /* Header Styling */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #a9ba9d;
      padding: 15px 30px;
    }

    /* Logo Styling */
    .logo {
      font-family: 'Playfair Display', serif;
      font-size: 32px;
      font-weight: 700;
      color: #800020;
      /* Stylish deep purple */
      letter-spacing: 2px;
      text-transform: uppercase;
    }



    /* Navigation Bar */
    nav ul {
      list-style: none;
      display: flex;
      align-items: center;
    }

    nav ul li {
      margin: 0 15px;
      position: relative;
    }

    nav ul li a {
      text-decoration: none;
      color: black;
      font-size: 18px;
      transition: 0.3s;
    }

    nav ul li a:hover {
      color: #f4a261;
    }

    nav ul li img {
      height: 50px;
      cursor: pointer;
    }

    /* Dropdown Styling */
    select {
      border: none;
      background: transparent;
      color: black;
      font-size: 18px;
      cursor: pointer;
      padding: 5px;
    }

    /* nav end   */

    /* main */
  

  .center-section {
    max-width: 900px;
    margin: 50px auto;
    background-color: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  .center-section h2 {
    color: #800020;
    margin-top: 30px;
    font-size: 28px;
  }

  .center-section p {
    color: #000;
    font-size: 16px;
    line-height: 1.6;
    margin-top: 15px;
  }

  .signature {
    font-style: italic;
    margin-top: 30px;
  }

  
      /* footer */
    footer {
      background-color: #a9ba9d;
      color: black;
      padding: 20px;
      text-align: center;
    }

    .footer-container {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }

    .footer-section {
      width: 22%;
      padding: 10px;
    }

    .footer-section h3 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .footer-section p {
      font-size: 14px;
    }

    .footer-bottom {
      margin-top: 20px;
    }

    .footer-section {
      width: 22%;
      padding: 10px;
      cursor: pointer;
      /* Makes the section clickable */
      transition: background 0.3s;
    }

    .footer-section:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .footer-section a {
      text-decoration: none;
      color: inherit;
    }

    .footer-section a h3 {
      margin: 0;
    }
  </style>
</head>

<body>
  <header>
    <div class="logo">STYLIQUE</div>
    <nav>
      <ul>
        <li><a href="main.php">Home</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li><a href="register.php">Register</a></li>
        <li>
         <select name="option" id="dropdown" onchange="location= this.value;">
            <option value="Categories" disabled selected>Categories</option>
            <option value="her.php">For Her</option>
            <option value="ForHim.php">For Him</option>
          </select>
        </li>
        <li><a href="ContactUs.php">Contact Us</a></li>
        <!-- <li><a href="#">Login</a></li> -->
        <li>
          <a href="login.php" title="Login" style="display: flex; align-items: center;">
            <!-- Login Icon (Font Awesome) -->
            <i class="fa fa-sign-in-alt" style="font-size: 28px;"></i>
          </a>
        </li>
        <li>
          <a href="cart.php" title="Cart" style="display: flex; align-items: center;">
            <!-- Cart Icon (Font Awesome) -->
            <i class="fa fa-shopping-cart" style="font-size: 28px;"></i>
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <div class="center-section">
    <h2>ABOUT STYLIQUE</h2>
    <p>Follow us to a world where your closet never ends.<br />
      A new avatar for every party you attend.</p>

    <p>Life's too exquisite to repeat what you wore—<br />
      That’s why we’ve curated the best of drop-dead-gorgeous couture.</p>

    <p>Why spend on outfits that become archaic as trends fade?<br />
      We’re here to change your life — make some serious amends.</p>

    <p>Looks for the day and looks for the starry night,<br />
      Flouncy, flirty, fabulous—with a fetish for delight.</p>

    <p>She’s the every look you desire, she’s the festive feel around you.<br />
      You are her muse, she’s blessed that she found you.</p>

    <p>So flex your fingertips to fashion — it’s that easy if you please.<br />
      She’s sassy, stylish, and at your service — We bring to you <strong>Stylique</strong>.</p>

    <h2>THE STYLIQUE EDGE</h2>
    <p><strong>Stylique</strong> is a fashion e-commerce platform with a serious sense of style, bringing the best of
      high-fashion right from the runway to your closet.</p>

    <p>Buying, storing, and owning high-maintenance couture with the guilt of using it over and over is so last decade.
      Stylique struts into the season with palpable poise and versatility, so you never have to do boring again.</p>

    <p>With a collection ranging from lust-worthy lehengas to chic separates and sultry silhouettes — Stylique has your
      every ethnic impulse covered.</p>

    <p>Step in to make your life significantly simpler and a whole lot sexier with the most aspired outfits on rent at
      your fingertips — in store and online — anytime, anywhere!</p>

    <h2>THERE'S MORE!</h2>
    <p>Worried about fittings and finding something that suits you? Drop into the store or email us for a free trial.
      Concerned about hygiene? So are we! Every order includes free delivery, pick up, and a high level of hygiene care.
    </p>

    <p class="signature">With love from your next outfit,<br />xoxo<br /><strong>The Stylique Team</strong></p>
  </div>

  <footer>
    <div class="footer-container">
      <div class="footer-section" onclick="navigateTo('cancel.html')">
        <a href="Cancellation.php">
          <h3>Cancellation Policy</h3>
        </a>
        <p>We allow cancellations within 24 hours of purchase. Click to read more.</p>
      </div>
      <div class="footer-section" onclick="navigateTo('return.html')">
        <a href="ReturnPolicy.php">
          <h3>Return Policy</h3>
        </a>
        <p>Products can be returned within 15 days. Click to read more.</p>
      </div>
      <div class="footer-section" onclick="navigateTo('terms.html')">
        <a href="T&C.php">
          <h3>Terms & Conditions</h3>
        </a>
        <p>By using our website, you agree to our terms. Click to read more.</p>
      </div>
      <div class="footer-section" onclick="navigateTo('privacy.html')">
        <a href="PrivacyPolicy.php">
          <h3>Privacy Policy</h3>
        </a>
        <p>Your data is protected as per our policy. Click to read more.</p>
      </div>
    </div>
  </footer>


</body>

</html>