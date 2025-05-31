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
    font-family: 'Poppins', sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
    background-color: #fff;
  }

  h2 {
    font-weight: 600;
    color: #222;
    margin-bottom: 20px;
    border-bottom: 3px solid #ff4081;
    padding-bottom: 8px;
    text-align: center;
    font-size: 2rem;
  }

  .center-section {
    max-width: 900px;
    margin: 60px auto;
    padding: 40px 30px;
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    line-height: 1.8;
  }

  p {
    text-align: justify;
    margin-bottom: 16px;
    font-weight: 400;
    font-size: 1rem;
  }

  p strong {
    color: #111;
    margin-bottom: 16px;
    font-weight: 400;
    font-size: 1rem;
  }

  .signature {
    margin-top: 50px;
    font-style: italic;
    font-weight: 600;
    color: #ff4081;
    font-size: 1.1rem;
    text-align: right;
  }

  @media (max-width: 768px) {
    .center-section {
      padding: 20px;
    }

    h2 {
      font-size: 1.5rem;
    }

    p {
      font-size: 1rem;
    }

    .signature {
      text-align: center;
    }
  }
  .footer-section a {
  text-decoration: none;
  color: inherit;
}

.footer-section a h3 {
  margin: 0;
}
.center-section {
  background: linear-gradient(135deg, #f8fafc 0%, #ffe3f6 100%);
  border-radius: 18px;
  box-shadow: 0 10px 32px rgba(255, 64, 129, 0.08), 0 2px 4px rgba(0,0,0,0.03);
  padding: 48px 40px;
  margin-top: 70px;
  margin-bottom: 70px;
  transition: box-shadow 0.3s;
}

.center-section:hover {
  box-shadow: 0 16px 40px rgba(255, 64, 129, 0.13), 0 4px 8px rgba(0,0,0,0.05);
}

.center-section h2 {
  letter-spacing: 1px;
  color: #ff4081;
  background: linear-gradient(90deg, #ff4081 40%, #ffb6e6 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  margin-bottom: 28px;
  font-size: 2.2rem;
  border: none;
  padding-bottom: 0;
}

.center-section p {
  font-size: 1.08rem;
  color: #444;
  margin-bottom: 18px;
  line-height: 1.85;
  background: rgba(255,255,255,0.7);
  border-radius: 8px;
  padding: 8px 12px;
  box-shadow: 0 1px 4px rgba(255,64,129,0.03);
}

.center-section p strong {
  color: #ff4081;
  font-weight: 600;
}

.signature {
  margin-top: 60px;
  font-style: italic;
  font-weight: 700;
  color: #ff4081;
  font-size: 1.15rem;
  text-align: right;
  letter-spacing: 0.5px;
}

@media (max-width: 768px) {
  .center-section {
    padding: 18px 8px;
    margin-top: 30px;
    margin-bottom: 30px;
  }
  .center-section h2 {
    font-size: 1.3rem;
  }
  .signature {
    text-align: center;
    font-size: 1rem;
  }
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
  <p><strong>Stylique</strong> is a fashion e-commerce platform with a serious sense of style, bringing the best of high-fashion right from the runway to your closet.</p>

  <p>Buying, storing, and owning high-maintenance couture with the guilt of using it over and over is so last decade. Stylique struts into the season with palpable poise and versatility, so you never have to do boring again.</p>

  <p>With a collection ranging from lust-worthy lehengas to chic separates and sultry silhouettes — Stylique has your every ethnic impulse covered.</p>

  <p>Step in to make your life significantly simpler and a whole lot sexier with the most aspired outfits on rent at your fingertips — in store and online — anytime, anywhere!</p>

  <h2>THERE'S MORE!</h2>
  <p>Worried about fittings and finding something that suits you? Drop into the store or email us for a free trial. Concerned about hygiene? So are we! Every order includes free delivery, pick up, and a high level of hygiene care.</p>

  <p class="signature">With love from your next outfit,<br />xoxo<br /><strong>The Stylique Team</strong></p>
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