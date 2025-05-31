<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cloth Rental Shop</title>
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
      background-color: white;
      padding: 15px 30px;
    }

    /* Logo Styling */
    .logo {
      font-size: 24px;
      color: black;
      font-weight: bold;
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

    select option {
      color: black;
    }

    .container {
      display: flex;
      /* Enables side-by-side layout */
      justify-content: space-around;
      /* Adjusts spacing */
      position : relative;
    }

    .box {
      margin: 10px;
      height: 100vh;
      width: 50vw;
      /* Adjusts width */
      border: 2px solid white;
      /* Adds border */
      overflow: hidden;
    }

    img {
      width: 100%;
      /* Ensures image fills the box */
      height: auto;
      overflow: hidden;

    }

    .text-overlay {
      position : absolute ;
      top: 20%;
      left: 30%;
      transform: translate(-50%, -50%);
      font-size: 50px;
      /* Adjust size */
      font-weight: bold;
      background: transparent;
    }

    .boy{
      position : absolute ;
      top: 50%;
      left: 80%;
      transform: translate(-50%, -50%);
      font-size: 50px;
      /* Adjust size */
      font-weight: bold;
     
    }

/* feature */
    .fe{
      margin: 20px;
      /* padding:10px ; */
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
  cursor: pointer; /* Makes the section clickable */
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
                        <option value="herdemo.php">For Her</option>
                        <option value="ForHim.php">For Him</option>
                    </select>
                </li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <!-- <li><a href="#">Login</a></li> -->
                <li><a href="Profile.php">My Account</a></li>
                <li>
                  <a href="cart.php" title="Cart" style="display: flex; align-items: center;">
                    <!-- Cart Icon (Font Awesome) -->
                    <i class="fa fa-shopping-cart" style="font-size: 28px;"></i>
                  </a>
                </li>
            </ul>
        </nav>
    </header>

  <!-- the main pic -->
  <div>
    <div style="position: relative; width: 100%;">
      <img src="main.webp" style="width: 100%; display: block;">
      <div style="position: absolute; top: 40%; left:60%; transform: translateY(-50%); background:transparent; padding: 50px 32px; 
      border-radius: 12px; color: #fff; max-width: 420px; text-align: right; box-shadow: 0 4px 24px rgba(0,0,0,0.18);">
        <h1 style="font-size: 2.5em; margin-bottom: 12px; right:80%; font-weight: bold; white-space: nowrap;">Welcome to THE STYLIQUE</h1>
        <p style="font-size: 1.2em; margin-bottom: 8px; margin-left:20%; white-space: nowrap;">~ Rent premium outfits for every occasion.</p>
        <p style="font-size: 1.1em; margin-bottom: 8px;margin-left:20%; white-space: nowrap;">~ Affordable. Sustainable. Hassle-free.</p>
        <p style="font-size: 1em;margin-bottom: 8px; margin-left:20%;white-space: nowrap;">~ Browse our exclusive collection for him & her and<br> make your event memorable!</p>
      </div>
    </div>
  </div>

  <!-- for him gor her -->
  <div class="container">
    <div class="box">
      <a href="her.php"><img src="her.jpg" alt="Image 1"></a>
      <div class="overlay-text">For Her</div>
      <style>
        .overlay-text {
          display: none;
          position: absolute;
          top: 50%;
          left: 20%;
          transform: translate(-50%, -50%);
          font-size: 50px;
          font-weight: bold;
          color: #fff;
          text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
          pointer-events: none;
          white-space: nowrap;
        }
        .box {
          position: relative;
            transition: all 0.8s ease;
        }
        .box:hover .overlay-text {
          display: block;
        }
      </style>
    </div>
    <div class="box">
      <a href="forhim.php"><img src="1him.jpg" alt="Image 2"></a>
      <h1 class="boy">For him</h1>
    </div>
  </div>

  <div class="fe">
    <img src="fe.png" alt="">
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