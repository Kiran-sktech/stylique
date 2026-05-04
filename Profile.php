<?php
session_start();

// Database connection
$mysqli = new mysqli("localhost", "root", "", "stylique");
if ($mysqli->connect_errno) {
    die("Failed to connect: " . $mysqli->connect_error);
}

// Check if user is logged in
if(!isset($_SESSION['UserID'])) {
    echo "<script>alert('Please log in.'); window.location.href='login.php';</script>";
    exit;
}

$user_id = $_SESSION['UserID'];

// Fetch orders for the logged-in customer
$stmt = $mysqli->prepare("SELECT * FROM order_product WHERE CustomerID = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f7f7fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 32px 40px;
        }
        h1 {
            color: #3a3a4a;
            text-align: center;
            margin-bottom: 32px;
            letter-spacing: 1px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: #f0f4ff;
            margin-bottom: 18px;
            border-radius: 8px;
            padding: 18px 22px;
            box-shadow: 0 2px 8px rgba(60,80,180,0.04);
            transition: box-shadow 0.2s;
        }
        li:hover {
            box-shadow: 0 4px 16px rgba(60,80,180,0.10);
        }
        .order-label {
            font-weight: 600;
            color: #2d3a6a;
        }
        .order-status {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 6px;
            font-size: 0.95em;
            margin-left: 8px;
            background: #e0e7ff;
            color: #3a3a4a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>My Orders</h1>
        <?php if ($result->num_rows === 0): ?>
            <div style="text-align:center; margin-top:40px;">
                <p style="font-size:1.2em; color:#888;">No orders found.</p>
                <a href="her.php" style="display:inline-block; margin-top:18px; padding:12px 28px; 
                background:#4f6cff; color:#fff; border-radius:6px; text-decoration:none; font-weight:600; letter-spacing:0.5px; transition:background 0.2s;">Start Renting Now</a>
            </div>
        <?php else: ?>
            <table style="width:100%; border-collapse:collapse; margin-top:24px;">
                <thead>
                <tr style="background:#e0e7ff;">
                    <th style="padding:10px; border-radius:6px 0 0 6px;">Customer ID</th>
                    <th style="padding:10px;">Order ID</th>
                    <th style="padding:10px;">Products</th>
                    <th style="padding:10px;">Order Date</th>
                    <th style="padding:10px;">Total Amount</th>
                    <th style="padding:10px;">Order Status</th>
                    <th style="padding:10px; border-radius:0 6px 6px 0;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($order = $result->fetch_assoc()): ?>
                    <tr style="background:#f0f4ff;">
                        <td style="padding:12px;"><?= htmlspecialchars($order['CustomerID']) ?></td>
                        <td style="padding:12px;"><?= htmlspecialchars($order['id']) ?></td>
                        <td style="padding:12px;"><?= htmlspecialchars($order['product_name']) ?></td>
                        <td style="padding:12px;"><?= htmlspecialchars($order['order_date']) ?></td>
                        <td style="padding:12px;">$<?= htmlspecialchars($order['total_amount']) ?></td>
                        <td style="padding:12px;">
                            <span class="order-status"><?= htmlspecialchars($order['status']) ?></span>
                        </td>
                        <td style="padding:12px;">-</td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$stmt->close();
$mysqli->close();
?>