<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Review Your Order</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        /* Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f5f5f5;
    color: #333;
    line-height: 1.6;
    padding: 0 20px;
}

/* Header */
header {
    background-color: #fff;
    padding: 20px 0;
    border-bottom: 1px solid #ddd;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    font-size: 1.8rem;
    font-weight: 600;
    color: #2c3e50;
    margin-left: 20px;
}

nav ul {
    list-style: none;
    display: flex;
    gap: 20px;
    margin-right: 20px;
}

nav a {
    text-decoration: none;
    color: #2c3e50;
    font-weight: 500;
    transition: color 0.3s ease;
}

nav a:hover {
    color: #007BFF;
}

/* Main container */
.review-order-container {
    background-color: #fff;
    max-width: 800px;
    margin: 40px auto;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.review-order-container h2 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 25px;
}

#orderDetails p {
    margin-bottom: 10px;
}

#orderDetails strong {
    color: #444;
}

#productSummary {
    list-style-type: disc;
    padding-left: 20px;
    margin-top: 10px;
}

#productSummary li {
    margin-bottom: 8px;
}

/* Buttons */
.order-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
    gap: 10px;
}

.order-actions button {
    flex: 1;
    padding: 12px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: transform 0.2s ease, background-color 0.3s ease;
}

#deleteOrder {
    background-color: #e74c3c;
}

#confirmOrder {
    background-color: #27ae60;
}

.order-actions button:hover {
    transform: scale(1.05);
    opacity: 0.9;
}

/* Return link */
.review-order-container a {
    display: block;
    text-align: center;
    margin-top: 20px;
    text-decoration: none;
    color: #007BFF;
    font-weight: 500;
    transition: color 0.3s ease;
}

.review-order-container a:hover {
    color: #0056b3;
}

/* Footer */
footer {
    background-color: #2c3e50;
    color: #fff;
    padding: 30px 0;
    margin-top: 50px;
}

.footer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 40px;
}

.footer-section a {
    text-decoration: none;
    color: #ecf0f1;
    transition: color 0.3s ease;
}

.footer-section a:hover {
    color: #1abc9c;
}

/* Responsive */
@media (max-width: 600px) {
    .order-actions {
        flex-direction: column;
    }

    nav ul {
        flex-direction: column;
        align-items: flex-start;
    }

    .footer-container {
        flex-direction: column;
        align-items: center;
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
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <div class="review-order-container">
        <h2>Order Summary</h2>
        <div id="orderDetails">
            <p><strong>Order Date:</strong> <span id="orderDate"></span></p>
            <p><strong>Start Date:</strong> <span id="startDate"></span></p>
            <p><strong>Return Date:</strong> <span id="returnDate"></span></p>
            <p><strong>Total Rental Days:</strong> <span id="totalDays"></span></p>
            <h3>Product Summary:</h3>
            <ul id="productSummary"></ul>
        </div>

        <div class="order-actions">
            <button id="deleteOrder" style="background-color: red; color: white;">Delete Order</button>
            <button id="confirmOrder" style="background-color: green; color: white;">Confirm Order</button>
        </div>

        <a href="her.php" style="display: inline-block; margin-top: 20px;">Return to Product Page</a>
    </div>

    <script>
        // Sample data for demonstration purposes
        const orderData = {
            orderDate: new Date().toLocaleDateString(),
            startDate: "2023-10-01",
            returnDate: "2023-10-05",
            totalDays: 4,
            products: [
                { title: "Classy Lehengas", size: "M" },
                { title: "Royal Pink Lehenga", size: "L" }
            ]
        };

        document.getElementById("orderDate").innerText = orderData.orderDate;
        document.getElementById("startDate").innerText = orderData.startDate;
        document.getElementById("returnDate").innerText = orderData.returnDate;
        document.getElementById("totalDays").innerText = orderData.totalDays;

        const productSummary = document.getElementById("productSummary");
        orderData.products.forEach(product => {
            const li = document.createElement("li");
            li.innerText = `${product.title} (Size: ${product.size})`;
            productSummary.appendChild(li);
        });

        document.getElementById("deleteOrder").onclick = function() {
            alert("Order has been deleted.");
            // Logic to delete the order
        };

        document.getElementById("confirmOrder").onclick = function() {
            alert("Order has been confirmed.");
            // Logic to confirm the order
        };
    </script>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <a href="Cancellation.php">
                    <h3>Cancellation Policy</h3>
                </a>
            </div>
            <div class="footer-section">
                <a href="ReturnPolicy.php">
                    <h3>Return Policy</h3>
                </a>
            </div>
            <div class="footer-section">
                <a href="T&C.php">
                    <h3>Terms & Conditions</h3>
                </a>
            </div>
            <div class="footer-section">
                <a href="PrivacyPolicy.php">
                    <h3>Privacy Policy</h3>
                </a>
            </div>
        </div>
    </footer>
</body>

</html>