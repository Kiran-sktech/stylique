<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cancellation Policy - Stylique</title>
  <link rel="stylesheet" href="style.css" />
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
  .cancellation-policy-box {
    max-width: 800px;
    margin: 40px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .cancellation-policy-box h2 {
    color: #800020;
    font-size: 26px;
    margin-bottom: 20px;
  }

  .cancellation-policy-box ol {
    padding-left: 20px;
  }

  .cancellation-policy-box li {
    color: #000;
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 15px;
  }

  .cancellation-policy-box a {
    color: #800020;
    text-decoration: underline;
  }

  .cancellation-policy-box li strong {
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
  <div class="cancellation-policy-box">
  <h2>CANCELLATION POLICY</h2>
  <ol>
    <li><strong>100% Refund:</strong> If you cancel your order <strong>7 or more days</strong> before the scheduled
      delivery date, you will receive a full refund of the rental amount.</li>

    <li><strong>50% Refund:</strong> If you cancel your order <strong>between 3 to 6 days</strong> before the delivery
      date, you will receive a 50% refund of the rental amount.</li>

    <li><strong>No Refund:</strong> If you cancel your order <strong>less than 3 days</strong> before the delivery date,
      no refund will be issued.</li>

    <li><strong>Security Deposit:</strong> This will always be refunded in full, regardless of when the cancellation is
      made.</li>

    <li><strong>Refund Process:</strong> Eligible refunds will be processed to your original payment method within
      <strong>45 days</strong> of cancellation.</li>

    <li><strong>How to Cancel:</strong> To cancel an order, please email us at <a
        href="mailto:contact@stylique.com">contact@stylique.com</a> with your order details.</li>
  </ol>
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