<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
    $item = [
        'title' => $_POST['title'] ?? '',
        'size' => $_POST['size'] ?? '',
        'start' => $_POST['start'] ?? '',
        'return' => $_POST['return'] ?? ''
    ];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][] = $item;
    echo json_encode(['success' => true]);
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Women's Wear on Rent</title>
    <link rel="stylesheet" href="style.css" />
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
            background: linear-gradient( rgba(0,0,0,0.5)), url('bg_of_her.jpg') center/cover no-repeat;
            height: 400px;
            position: relative;
            color: white;
        }

        .banner-text {
            position: absolute;
            bottom: 150px;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -60%);
            padding: 0 30px;
            font-size: 45px;
            font-weight: bold;
            border-radius: 10px;
        }

        .category-dropdown {
            position: absolute;
            left: 50%;
            top: calc(50% + 60px);
            transform: translateX(-50%);
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

        /*cart*/
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }

        .cart-item select {
            margin-left: 10px;
            padding: 4px;
        }

        .cart-item i {
            cursor: pointer;
            color: #cc0000;
            margin-left: 10px;
        }



        /* for pop up */
         .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            width: 400px;
            max-width: 90%;
            position: relative;
            animation: fadeZoomIn 0.3s ease-out;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }

        .modal-close {
            position: absolute;
            top: 12px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
        }

        .modal-content img {
            width: 100%;
            height: 220px;
            object-fit: contain;
            margin-bottom: 20px;
        }

        .modal-content h3 {
            margin-bottom: 10px;
            font-size: 22px;
        }

        .modal-content label {
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .modal-content input,
        .modal-content select {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .modal-content button {
            margin-top: 16px;
            padding: 10px 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .modal-content button:hover {
            background-color: #444;
        }
/* footer */
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
                        <option value="him.php">For Him</option>
                    </select>
                </li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li>
                    <a href="login.php" title="Login" style="display: flex; align-items: center;">
                        <!-- Login Icon (Font Awesome) -->
                        <i class="fa fa-sign-in-alt" style="font-size: 28px;"></i>
                    </a>
                </li>
                <!-- cart further added things -->
                <li style="position: relative;">
                    <a href="javascript:void(0);" title="Cart" onclick="toggleCartDropdown()"
                        style="display: flex; align-items: center;">
                        <i class="fa fa-shopping-cart" style="font-size: 28px;"></i>
                    </a>
                    <div id="cartDropdown"
                        style="display: none; position: absolute; right: 0; top: 40px; background: #fff; border: 1px solid #ccc; width: 280px; z-index: 1000; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 8px; padding: 10px;">
                        <div id="cartItems"></div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Banner -->
    <div class="banner">
        <div class="banner-text">Women's Wear on Rent</div>
        <div class="category-dropdown">
            <select id="category" onchange="filterByCategory()">
                <option value="all">All Categories</option>
                <option value="lehenga">Lehengas</option>
                <option value="saree">Sarees</option>
                <option value="partywear">Party Wear</option>
                <option value="anarkali">Anarkali</option>
            </select>
        </div>
    </div>

    <!-- Product Sections -->
    <div class="products-section" id="lehenga">
        <div class="section-header">
            <h2 class="animated-heading">Lehengas</h2>
            <div class="section-sort">
                <label>Sort By:</label>
                <select onchange="sortSection('lehenga', this.value)">
                    <option value="low-high">Price: Low to High</option>
                    <option value="high-low">Price: High to Low</option>
                    <option value="a-z">Name: A-Z</option>
                    <option value="z-a">Name: Z-A</option>
                </select>
            </div>
        </div>
        <div class="products" data-category="lehenga">
            <div class="product">
                <img src="len3.jpg" alt="Classy Lehengas">
                <h4>Classy Lehengas</h4>
                <p>₹2900</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';"
                >
                    Rent Now
                </button>

            </div>
            <div class="product">
                <img src="len2.jpg" alt="Royal Lehenga">
                <h4>Royal Pink Lehenga</h4>
                <p>₹3100</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';">
                    Rent Now
                </button>

            </div>
            <div class="product">
                <img src="len1.jpg" alt="Yellow-Blue Lehenga">
                <h4>Yellow-Blue Lehenga</h4>
                <p>₹3500</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';">
                    Rent Now
                </button>

            </div>
            <div class="product">
                <img src="len4.jpg" alt="Patterned Lehenga">
                <h4>Patterned Lehenga</h4>
                <p>₹2200</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';">
                    Rent Now
                </button>
            </div>
        </div>
    </div>

    <div class="products-section" id="saree">
        <div class="section-header">
            <h2 class="animated-heading">Sarees</h2>
            <div class="section-sort">
                <label>Sort By:</label>
                <select onchange="sortSection('saree', this.value)">
                    <option value="low-high">Price: Low to High</option>
                    <option value="high-low">Price: High to Low</option>
                    <option value="a-z">Name: A-Z</option>
                    <option value="z-a">Name: Z-A</option>
                </select>
            </div>
        </div>
        <div class="products" data-category="saree">
            <div class="product">
                <img src="saree3.jpg" alt="Glamorous Saree">
                <h4>Glamorous Saree</h4>
                <p>₹1200</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';" >
                    Rent Now
                </button>
            </div>
            <div class="product">
                <img src="saree2.jpg" alt="Silk Saree">
                <h4>Silk Copper Enhanced Saree</h4>
                <p>₹999</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';">
                    Rent Now
                </button>
            </div>
            <div class="product">
                <img src="saree1.jpg" alt="Silk Saree">
                <h4>Silk Saree</h4>
                <p>₹1700</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';">
                    Rent Now
                </button>
            </div>
            <div class="product">
                <img src="saree4.jpg" alt="Silk Saree">
                <h4>Silk Silver Enhanced Saree</h4>
                <p>₹1100</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';" >
                    Rent Now
                </button>
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
                <img src="party3.jpg" alt="Flower Party Wear">
                <h4>Flower Party Wear</h4>
                <p>₹900</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';">
                    Rent Now
                </button>
            </div>
            <div class="product">
                <img src="party2.jpg" alt="Golden Gown">
                <h4>Golden Gown</h4>
                <p>₹1100</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';">
                    Rent Now
                </button>
            </div>
            <div class="product">
                <img src="party1.jpg" alt="Silk Saree">
                <h4>Leaf Theme Beautiful Dress</h4>
                <p>₹850</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';" >
                    Rent Now
                </button>
            </div>
            <div class="product">
                <img src="party4.jpg" alt="Silk Saree">
                <h4>Navy Blue Net Dress</h4>
                <p>₹850</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';">
                    Rent Now
                </button>
            </div>
        </div>
    </div>

    <div class="products-section" id="anarkali">
        <div class="section-header">
            <h2 class="animated-heading">Anarkali</h2>
            <div class="section-sort">
                <label>Sort By:</label>
                <select onchange="sortSection('anarkali', this.value)">
                    <option value="low-high">Price: Low to High</option>
                    <option value="high-low">Price: High to Low</option>
                    <option value="a-z">Name: A-Z</option>
                    <option value="z-a">Name: Z-A</option>
                </select>
            </div>
        </div>
        <div class="products" data-category="anarkali">
            <div class="product">
                <img src="an3.jpg" alt="Elegant Anarkali Set">
                <h4>Elegant Anarkali Set</h4>
                <p>₹600</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';">
                    Rent Now
                </button>
            </div>
            <div class="product">
                <img src="an2.jpg" alt="Blue Anarkali">
                <h4>Blue Anarkali</h4>
                <p>₹700</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';">
                    Rent Now
                </button>
            </div>
            <div class="product">
                <img src="an1.jpg" alt="Silk Saree">
                <h4>Green Anarkali</h4>
                <p>₹850</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';">
                    Rent Now
                </button>
            </div>
            <div class="product">
                <img src="an4.jpg" alt="Silk Saree">
                <h4>Full Sleeves Anarkali</h4>
                <p>₹850</p>
                <button 
                    onclick="openModal('Classy Lehengas', 'len3.jpg')" 
                    style="margin-top: 10px; padding: 10px 20px; background: #333; color: #fff; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;"
                    onmouseover="this.style.background='#444';"
                    onmouseout="this.style.background='#333';">
                    Rent Now
                </button>
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
            const section = document.querySelector(`.products[data-category="${sectionId}"]`);

            // const section = document.querySelector([data - category="${sectionId}"]);
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




        function openModal(title, imgSrc) {
            document.getElementById("modalImage").src = imgSrc;
            document.getElementById("modalTitle").innerText = title;
            document.getElementById("startDate").value = "";
            document.getElementById("returnDate").value = "";
            document.getElementById("size").value = "";

            document.getElementById("rentalModal").style.display = "flex";
        }


        function closeModal() {
            document.getElementById("rentalModal").style.display = "none";
        }

        function updateReturnDate() {
            const start = document.getElementById("startDate").value;
            const days = parseInt(document.getElementById("duration").value);
            if (start) {
                const startDate = new Date(start);
                startDate.setDate(startDate.getDate() + days);
                document.getElementById("returnDate").value = startDate.toISOString().split("T")[0];
            } else {
                document.getElementById("returnDate").value = "";
            }
        }

        function placeOrder() {
            const title = document.getElementById("modalTitle").innerText;
            const start = document.getElementById("startDate").value;
            const returnDate = document.getElementById("returnDate").value;
            const size = document.getElementById("size").value;

            if (!start || !size) {
                alert("Please select a start date and size.");
                return;
            }

            alert(`Item Added To Cart "${title}"\nStart: ${start}\nReturn: ${returnDate}\nSize: ${size}`);
            closeModal();
        }

        /*cart*/
        let cart = [];

        function placeOrder() {
            const title = document.getElementById("modalTitle").innerText;
            const start = document.getElementById("startDate").value;
            const returnDate = document.getElementById("returnDate").value;
            const size = document.getElementById("size").value;

            if (!start || !size) {
                alert("Please select a start date and size.");
                return;
            }

            cart.push({ title, size });
            updateCartDropdown();
            alert(`Item Added To Cart:\n"${title}"\nStart: ${start}\nReturn: ${returnDate}\nSize: ${size}`);
            closeModal();
        }

        function updateCartDropdown() {
            const cartItemsContainer = document.getElementById("cartItems");
            cartItemsContainer.innerHTML = "";

            if (cart.length === 0) {
                cartItemsContainer.innerHTML = "<p style='text-align:center;'>Cart is empty</p>";
                return;
            }

            cart.forEach((item, index) => {
                const div = document.createElement("div");
                div.className = "cart-item";
                div.innerHTML = `
            <span>${item.title}</span>
            <select onchange="updateSize(${index}, this.value)">
                <option value="S" ${item.size === "S" ? "selected" : ""}>S</option>
                <option value="M" ${item.size === "M" ? "selected" : ""}>M</option>
                <option value="L" ${item.size === "L" ? "selected" : ""}>L</option>
                <option value="XL" ${item.size === "XL" ? "selected" : ""}>XL</option>
            </select>
            <i class="fa fa-trash" onclick="removeCartItem(${index})"></i>
        `;
                cartItemsContainer.appendChild(div);
            });
        }

        function updateSize(index, newSize) {
            cart[index].size = newSize;
            updateCartDropdown();
        }

        function removeCartItem(index) {
            cart.splice(index, 1);
            updateCartDropdown();
        }

        function toggleCartDropdown() {
            const dropdown = document.getElementById("cartDropdown");
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        }
        // Ensure "Nothing in your cart" is shown if cart is empty on page load
        document.addEventListener("DOMContentLoaded", function () {
            const cartItemsContainer = document.getElementById("cartItems");
            if (cartItemsContainer && (!cart || cart.length === 0)) {
                cartItemsContainer.innerHTML = "<p style='text-align:center;'>Nothing in your cart</p>";
            }
        });

        const cartDropdown = document.getElementById("cartDropdown");
        if (cartDropdown) {
            const reviewBtn = document.createElement("button");
            reviewBtn.innerText = "Review your Cart";
            reviewBtn.style.width = "100%";
            reviewBtn.style.marginTop = "10px";
            reviewBtn.style.background = "#333";
            reviewBtn.style.color = "#fff";
            reviewBtn.style.border = "none";
            reviewBtn.style.borderRadius = "6px";
            reviewBtn.style.padding = "10px 0";
            reviewBtn.style.cursor = "pointer";
            reviewBtn.onclick = function () {
                window.location.href = "review.php";
            };
            cartDropdown.appendChild(reviewBtn);
        }
    </script>





    <!-- Rental Modal -->
    <div id="rentalModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="Product Image">
            <h3 id="modalTitle"></h3>
            <label>Start Date:
                <input type="date" id="startDate" onchange="updateReturnDate()">
            </label>
            <label>Duration:
                <select id="duration" onchange="updateReturnDate()">
                    <option value="4">4 Days</option>
                </select>
            </label>
            <label>Return Date:
                <input type="text" id="returnDate" disabled>
            </label>
            <label>Size:
                <select id="size">
                    <option value="">Select Size</option>
                    <option value="S">Small</option>
                    <option value="M">Medium</option>
                    <option value="L">Large</option>
                    <option value="XL">Extra Large</option>
                </select>
            </label>
            <button onclick="placeOrder()">Add To Cart</button>
        </div>
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