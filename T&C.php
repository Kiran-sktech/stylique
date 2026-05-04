<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Terms and Conditions - Stylique</title>
  <link rel="stylesheet" href="style.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    /* General Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    /* Header Styling */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #a9ba9d ;
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
    /* nav end */

    /* content */
  .terms-box {
    max-width: 900px;
    margin: 40px auto;
    background-color: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .terms-box h1,
  .terms-box h2 {
    color: #800020;
    margin-top: 30px;
    margin-bottom: 15px;
  }

  .terms-box h1 {
    font-size: 30px;
  }

  .terms-box h2 {
    font-size: 22px;
  }

  .terms-box p {
    color: #000;
    font-size: 16px;
    line-height: 1.7;
    margin-bottom: 20px;
  }

  .terms-box strong {
    font-weight: bold;
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
                        <option value="wedding">Wedding</option>
                        <option value="Engagement">Engagement</option>
                        <option value="herdemo.html">Reception</option>
                        <option value="Party Night">Party Night</option>
                    </select>
                </li>
                <li><a href="ContactUs.php">Contact Us</a></li>
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
  <div class="terms-box">
  <h1>Terms and Conditions</h1>

  <h2>Introduction</h2>
  <p>Welcome to Stylique. By accessing or using our website and services, you agree to follow and be bound by these Terms and Conditions. Please read them carefully as they govern your relationship with us.</p>

  <h2>User Eligibility</h2>
  <p>By using Stylique, you confirm that you are at least 18 years old and have the legal capacity to enter into binding contracts. If you are using our services on behalf of a company or organization, you represent that you have the authority to bind that entity to these terms.</p>

  <h2>Sale and Renting of Products</h2>
  <p>Stylique offers rental services for clothing only. When you rent a product, you enter into a rental agreement with us. All rented items must be returned in the same condition as received, except for normal wear and tear. Failure to return items on time or returning damaged items may result in additional charges. The prices, rental periods, and policies related to payment, refunds, and cancellations are as outlined on our website.</p>

  <h2>Terms of Use</h2>
  <p>You agree to use Stylique’s website and services only for lawful purposes. Any misuse of the website, including but not limited to fraudulent activity, abuse of services, or violation of any laws or regulations, may lead to suspension or termination of your access. You are responsible for maintaining the confidentiality of your account information and for all activities under your account.</p>

  <h2>Services</h2>
  <p>Stylique provides convenient delivery and pickup services as part of our rental process. You agree to cooperate in scheduling deliveries and returns as per the agreed timeline. Changes to delivery or pickup arrangements should be communicated in advance. We strive to maintain the quality of our service but do not guarantee uninterrupted availability.</p>

  <h2>Site Content</h2>
  <p>All content on Stylique, including text, images, logos, and designs, is the intellectual property of Stylique or its partners. You may not use, reproduce, or distribute any content without our prior written permission.</p>

  <h2>User Account</h2>
  <p>To rent products, you may need to create a user account with accurate and up-to-date information. You are responsible for keeping your account credentials secure and notifying us immediately of any unauthorized use. We reserve the right to suspend or terminate accounts that violate these terms.</p>

  <h2>Contact Us</h2>
  <p>If you have any questions or concerns about these Terms and Conditions, please reach out to us at <strong>contact@stylique.com</strong> or call <strong>+91 8459515366 / +91 9145251934</strong>. We are here to assist you.</p>
</div>

  <footer>
  <div class="footer-container">
    <div class="footer-section" onclick="navigateTo('cancel.html')">
      <a href="Cancellation.php"><h3>Cancellation Policy</h3></a>
      <p>We allow cancellations within 24 hours of purchase. Click to read more.</p>
    </div>
    <div class="footer-section" onclick="navigateTo('return.html')">
      <a href="ReturnPolicy.php"><h3>Return Policy</h3></a>
      <p>Products can be returned within 15 days. Click to read more.</p>
    </div>
    <div class="footer-section" onclick="navigateTo('terms.html')">
      <a href="T&C.php"><h3>Terms & Conditions</h3></a>
      <p>By using our website, you agree to our terms. Click to read more.</p>
    </div>
    <div class="footer-section" onclick="navigateTo('privacy.html')">
      <a href="PrivacyPolicy.php"><h3>Privacy Policy</h3></a>
      <p>Your data is protected as per our policy. Click to read more.</p>
    </div>
  </div>
</footer>
</body>
</html>