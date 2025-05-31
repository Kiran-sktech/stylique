<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PRIVACY POLICY</title>
  <link rel="stylesheet" href="style.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f9f9f9;
      max-width: 900px;
      margin: 40px auto;
      padding: 0 20px;
      color: #333;
      line-height: 1.6;
    }
    h2 {
      font-weight: 600;
      color: #222;
      border-bottom: 2px solid #ff4081;
      padding-bottom: 6px;
      margin-bottom: 20px;
      text-align: center;
    }
    h3 {
      font-weight: 600;
      margin-top: 30px;
      color: #444;
    }
    p, ul {
      margin-top: 10px;
    }
    ul {
      padding-left: 20px;
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
  <h2>PRIVACY POLICY</h2>

  <p>At <strong>Stylique</strong>, we value your privacy. This policy outlines how we collect, use, store, and protect your personal information when you interact with our website or services.</p>

  <h3>Information We Collect</h3>
  <ul>
    <li><strong>Personal Information:</strong> Name, contact number, email address, delivery address.</li>
    <li><strong>Order Details:</strong> Rented products, rental duration, payment status.</li>
    <li><strong>Payment Information:</strong> Limited to the method of payment (handled securely by payment gateways – we do not store card details).</li>
    <li><strong>Technical Information:</strong> IP address, browser type, device details, and browsing behavior.</li>
  </ul>

  <h3>How We Use Your Information</h3>
  <ul>
    <li>Process and deliver your orders.</li>
    <li>Communicate about your bookings or account.</li>
    <li>Provide customer support.</li>
    <li>Improve user experience and website performance.</li>
    <li>Send occasional promotional or service-related emails (you may opt out anytime).</li>
  </ul>

  <h3>Data Security</h3>
  <p>We implement strict security measures to safeguard your personal data from unauthorized access, misuse, or disclosure.</p>

  <h3>Sharing of Information</h3>
  <p>We <strong>do not sell or rent</strong> your personal data to third parties. However, we may share limited information with:</p>
  <ul>
    <li><strong>Delivery partners</strong> to ensure timely product delivery.</li>
    <li><strong>Payment gateways</strong> for secure transactions.</li>
    <li><strong>Legal authorities</strong> if required by law.</li>
  </ul>

  <h3>User Rights</h3>
  <ul>
    <li>Access or update your personal information.</li>
    <li>Request deletion of your data (subject to legal/transactional requirements).</li>
    <li>Opt out of marketing communications at any time.</li>
  </ul>

  <h3>Policy Updates</h3>
  <p>This Privacy Policy may be updated as needed. We recommend reviewing it periodically to stay informed.</p>

  <h3>Contact Us</h3>
  <strong>Email:</strong> <a href="mailto:contact@thestylease.com">contact@thestylique.com</a><br/>
  <strong>Phone:</strong> 08459515366 / 09145251934<br />
  <strong>Address:</strong> 18/ [2 A 2] 2 ,Pratap Nagar , Opp.SRP Camp Vijapur Road,
            Solapur, Maharashtra, India.
            Pin code: 413008</p>
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