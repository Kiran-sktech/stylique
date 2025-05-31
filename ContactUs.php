<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact - Stylique</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        h2 {
            font-weight: 600;
            color: #222;
            border-bottom: 2px solid #ff4081;
            padding-bottom: 6px;
            margin-bottom: 20px;
            text-align: center;
        }

        .contact-info {
            margin-bottom: 30px;
        }

        .contact-info p {
            margin: 10px 0;
            font-size: 1rem;
        }

        iframe {
            width: 100%;
            height: 400px;
            border: none;
            border-radius: 10px;
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
    <header style="max-width:auto;">
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
    <h2>CONTACT US</h2>
    <div class="contact-info">
        <p><strong>Address:</strong> 18/ [2 A 2] 2 ,Pratap Nagar , Opp.SRP Camp Vijapur Road,
            Solapur, Maharashtra, India.
            Pin code: 413008</p>
        <p><strong>Store Timings:</strong> 11AM – 7PM (Monday to Saturday)</p>
        <p><strong>Mobile No:</strong>08459515366 / 09145251934</p>
        <p><strong>Email:</strong> <a href="mailto:contact@thestylease.com">contact@thestylique.com</a></p>
    </div>

    <h2>LOCATE US</h2>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3794.6806799588424!2d75.8893877!3d17.6143827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc5d75b6d64eb25%3A0x31fb36694b3b0035!2sA.G.%20PATIL%20INSTITUTE%20OF%20TECHNOLOGY%20SOLAPUR!5e0!3m2!1sen!2sin!4v1716727616009!5m2!1sen!2sin"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
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