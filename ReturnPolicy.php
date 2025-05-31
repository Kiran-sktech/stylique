<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Return Policy - Stylique</title>
  <link rel="stylesheet" href="style.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f9f9f9;
      padding: 40px 20px;
      max-width: 900px;
      margin: auto;
      color: #333;
    }
    h2 {
      font-weight: 600;
      color: #222;
      border-bottom: 2px solid #ff4081;
      padding-bottom: 6px;
      margin-bottom: 20px;
      text-align:center;
    }
    ol {
      padding-left: 20px;
      line-height: 1.8;
    }
    li {
      margin-bottom: 12px;
    }
    strong {
      color: #000;
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
  <h2>RETURN POLICY</h2>
  <ol>
    <li><strong>Return Timeline:</strong> Products must be returned <strong>on or before the due return date</strong> mentioned at the time of delivery.</li>
    
    <li><strong>Late Return Penalty:</strong> If the product is not returned on time, a <strong>daily penalty of 5% of the retail value</strong> of the product will be charged.</li>
    
    <li><strong>Original Packaging:</strong> Products must be returned in the <strong>same packaging</strong> as delivered.</li>
    
    <li><strong>Authorized Collection Only:</strong> Returns must be handed over <strong>only to the person authorized</strong> by Stylique.</li>
    
    <li><strong>Proper Packing:</strong> If returning without authorized pickup, products must be <strong>properly packed and sealed</strong>. Any <strong>damage during return</strong> will be the <strong>user's responsibility</strong>.</li>
  </ol>
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