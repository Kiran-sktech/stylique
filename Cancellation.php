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
    /* Header Styling */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: white;
      padding: 15px 30px;
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

      body {
      font-family: 'Poppins', Arial, sans-serif;
      background: linear-gradient(135deg, #f8fafc 0%, #f4a261 100%);
      margin: 0;
      padding: 0;
      min-height: 100vh;
      color: #222;
      }
      /* Remove orange color and use a neutral accent */
      h2 {
        color: #2a9d8f;
      }

      ol li strong {
        color: #2a9d8f;
      }

      nav ul li a:hover {
        color: #2a9d8f;
      }
        h2 {
      text-align: center;
      margin-top: 40px;
      font-size: 2.2rem;
      font-weight: 600;
      color: #f4a261;
      letter-spacing: 1px;
        }

        ol {
      max-width: 700px;
      margin: 40px auto 60px auto;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.08);
      padding: 32px 36px;
      font-size: 1.1rem;
      line-height: 1.7;
        }

        ol li {
      margin-bottom: 18px;
      padding-left: 4px;
        }

        ol li strong {
      color: #e76f51;
        }

        a {
      color: #2a9d8f;
      transition: color 0.2s;
        }

        a:hover {
      color: #e76f51;
      text-decoration: underline;
        }

    nav ul li a:hover {
      color: #f4a261;
    }

    nav ul li img {
      height: 50px;
      cursor: pointer;
    }
    /* footer */
    footer {
      background-color: #333;
      color: white;
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
    <div class="logo">ClothRent</div>
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