<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Men's Wear on Rent</title>
    <link rel="stylesheet" href="style.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                transform: translateX(-50px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeZoomIn {
            from {
                transform: scale(0.95);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .animated-heading {
            animation: slideInLeft 1s ease forwards;
        }

        .product img {
            animation: fadeZoomIn 1s ease-in-out forwards;
        }

        /* Banner Section */
        .banner {
            background: url('forhim.jpg') center/cover no-repeat;
            height: 400px;
            position: relative;
            color: white;
        }

        .banner-text {
            position: absolute;
            bottom: 150px;
            right: 150px;
            padding: 20px 30px;
            font-size: 45px;
            font-weight: bold;
            border-radius: 10px;
        }

        .category-dropdown {
            position: absolute;
            bottom: 90px;
            left: 63%;
            border-radius: 8px;
            border: 2px solid white;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(4px);
            padding: 3px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .category-dropdown select {
            font-size: 18px;
            font-weight: 600;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            background: transparent;
            color: white;
            cursor: pointer;
            outline: none;
            appearance: none;
        }

        .category-dropdown select option {
            color: black;
            background-color: white;
        }

        .products-section {
            padding: 50px 40px;
            position: relative;
        }

        .products-section h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
            display: inline-block;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-sort {
            font-size: 16px;
        }

        .section-sort select {
            padding: 6px 12px;
            border-radius: 6px;
            border: 2px solid #888;
            font-weight: 600;
            cursor: pointer;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .product {
            text-align: center;
            padding: 10px;
        }

        .product img {
            width: 100%;
            height: 420px;
            object-fit: contain;
            border-radius: 8px;
            border: 2px solid #ccc;
            background-color: #fff;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .product img:hover {
            transform: scale(1.07) rotate(1deg);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
        }

        .product h4 {
            margin: 10px 0 5px;
        }

        .product p {
            color: #444;
        }

        /* Scroll to Top Button */
        #scrollBtn {
            display: none;
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 99;
            font-size: 22px;
            border: none;
            outline: none;
            background-color: #333;
            color: white;
            cursor: pointer;
            padding: 12px 16px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease;
        }

        #scrollBtn:hover {
            background-color: #555;
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
    <!-- Banner -->
    <div class="banner">
        <div class="banner-text">Men's Wear on Rent</div>
        <div class="category-dropdown">
            <select id="category" onchange="filterByCategory()">
                <option value="all">All Categories</option>
                <option value="wedding">Wedding</option>
                <option value="Engagement">Engagement</option>
                <option value="reception">Reception</option>
                <option value="partywear">Party Wear</option>
            </select>
        </div>
    </div>

    <!-- Product Sections -->
    <div class="products-section" id="wedding">
        <div class="section-header">
            <h2 class="animated-heading">Wedding</h2>
            <div class="section-sort">
                <label>Sort By:</label>
                <select onchange="sortSection('wedding', this.value)">
                    <option value="low-high">Price: Low to High</option>
                    <option value="high-low">Price: High to Low</option>
                    <option value="a-z">Name: A-Z</option>
                    <option value="z-a">Name: Z-A</option>
                </select>
            </div>
        </div>
        <div class="products" data-category="wedding">
            <div class="product">
                <img src="wed1.png" alt="Embroidered Sherwaani">
                <h4>Embroidered Sherwani</h4>
                <p>₹8600</p>
            </div>
            <div class="product">
                <img src="wed2.png" alt="Classic Black Achkan">
                <h4>Classic Black Achkan</h4>
                <p>₹6100</p>
            </div>
            <div class="product">
                <img src="wed3.png" alt="South Indian Groom Set">
                <h4>South Indian Groom Set</h4>
                <p>₹7500</p>
            </div>
            <div class="product">
                <img src="wed4.png" alt="Patterned Velvet Sherwani">
                <h4>Patterned Velvet Sherwani</h4>
                <p>₹6200</p>
            </div>
        </div>
    </div>

    <div class="products-section" id="engagement">
        <div class="section-header">
            <h2 class="animated-heading">Engagement</h2>
            <div class="section-sort">
                <label>Sort By:</label>
                <select onchange="sortSection('engagement', this.value)">
                    <option value="low-high">Price: Low to High</option>
                    <option value="high-low">Price: High to Low</option>
                    <option value="a-z">Name: A-Z</option>
                    <option value="z-a">Name: Z-A</option>
                </select>
            </div>
        </div>
        <div class="products" data-category="engagement">
            <div class="product">
                <img src="eng1.png" alt="Waistcoat Kurt">
                <h4>Waistcoat Kurta</h4>
                <p>₹5200</p>
            </div>
            <div class="product">
                <img src="eng2.png" alt="Dusty Rose Nehru Jacket and Kurta">
                <h4>Dusty Rose Nehru Jacket and Kurta</h4>
                <p>₹5999</p>
            </div>
            <div class="product">
                <img src="eng3.png" alt="Rust Floral Nehru Jacke">
                <h4>Rust Floral Nehru Jacket</h4>
                <p>₹4700</p>
            </div>
            <div class="product">
                <img src="eng4.png" alt="Silk Saree">
                <h4>Jodhpuri Kurta</h4>
                <p>₹5100</p>
            </div>
        </div>
    </div>

    <div class="products-section" id="reception">
        <div class="section-header">
            <h2 class="animated-heading">Reception</h2>
            <div class="section-sort">
                <label>Sort By:</label>
                <select onchange="sortSection('reception', this.value)">
                    <option value="low-high">Price: Low to High</option>
                    <option value="high-low">Price: High to Low</option>
                    <option value="a-z">Name: A-Z</option>
                    <option value="z-a">Name: Z-A</option>
                </select>
            </div>
        </div>
        <div class="products" data-category="reception">
            <div class="product">
                <img src="re1.png" alt="Black Silk Jacket Set with Resham Embroidery">
                <h4>Black Silk Jacket Set with Resham Embroidery</h4>
                <p>₹5800</p>
            </div>
            <div class="product">
                <img src="re2.png" alt="Linen Satin Tuxedo">
                <h4>Linen Satin Tuxedo</h4>
                <p>₹7100</p>
            </div>
            <div class="product">
                <img src="re3.png" alt="Ivory Sherwani">
                <h4>Ivory Sherwani</h4>
                <p>₹850</p>
            </div>
            <div class="product">
                <img src="re4.png" alt="Pastel bandhgala">
                <h4>Pastel bandhgala</h4>
                <p>₹4650</p>
            </div>
        </div>
    </div>

    <div class="products-section" id="partywear">
        <div class="section-header">
            <h2 class="animated-heading">Party Wear</h2>
            <div class="section-sort">
                <label>Sort By:</label>
                <select onchange="sortSection('partywear', this.value)">
                    <option value="low-high">Price: Low to High</option>
                    <option value="high-low">Price: High to Low</option>
                    <option value="a-z">Name: A-Z</option>
                    <option value="z-a">Name: Z-A</option>
                </select>
            </div>
        </div>
        <div class="products" data-category="partywear">
            <div class="product">
                <img src="pt1.png" alt="Philocaly Wine Bandhgala">
                <h4>Philocaly Wine Bandhgala</h4>
                <p>₹4600</p>
            </div>
            <div class="product">
                <img src="pt2.png" alt="Polinosic Jodhpuri Set">
                <h4>Polinosic Jodhpuri Set</h4>
                <p>₹4700</p>
            </div>
            <div class="product">
                <img src="pt3.png" alt="Hand-embroidered finesse">
                <h4>Hand-embroidered finesse</h4>
                <p>₹7550</p>
            </div>
            <div class="product">
                <img src="pt4.png" alt="Sage Green Blazer & Formal pants">
                <h4>Sage Green Blazer & Formal pants</h4>
                <p>₹6850</p>
            </div>
        </div>
    </div>
    <!-- Scroll to Top Button -->
    <button onclick="scrollToTop()" id="scrollBtn" title="Go to top">↑</button>

    <script>
        function filterByCategory() {
            const category = document.getElementById('category').value;
            if (category === 'all') {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                const section = document.getElementById(category);
                if (section) {
                    section.scrollIntoView({ behavior: 'smooth' });
                }
            }
        }

        function sortSection(sectionId, criteria) {
            const section = document.querySelector([data-category="${sectionId}"]);
            const products = Array.from(section.querySelectorAll(".product"));

            products.sort((a, b) => {
                const nameA = a.querySelector("h4").innerText.toLowerCase();
                const nameB = b.querySelector("h4").innerText.toLowerCase();
                const priceA = parseInt(a.querySelector("p").innerText.replace("₹", ""));
                const priceB = parseInt(b.querySelector("p").innerText.replace("₹", ""));

                switch (criteria) {
                    case "low-high": return priceA - priceB;
                    case "high-low": return priceB - priceA;
                    case "a-z": return nameA.localeCompare(nameB);
                    case "z-a": return nameB.localeCompare(nameA);
                }
            });

            section.innerHTML = "";
            products.forEach(product => section.appendChild(product));
        }
        // Show/hide the scroll button
        window.onscroll = function () {
            const scrollBtn = document.getElementById("scrollBtn");
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                scrollBtn.style.display = "block";
            } else {
                scrollBtn.style.display = "none";
            }
        };

        // Scroll smoothly to top
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

    </script>
    <footer>
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