<?php
// Connect to database
$con = mysqli_connect('localhost', 'root', '', 'stylique');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch joined data from users and customers tables
$sql = "SELECT 
            u.UserID,
            u.UserName,
            u.Email,
            c.Contact,
            c.RegisterDate,
            c.CustomerName,
            c.Email AS CustomerEmail
        FROM users u
        JOIN customers c ON u.UserID = c.UserID
        ORDER BY c.RegisterDate DESC";

$result = mysqli_query($con, $sql);
// Calculate total price for each customer (example: sum of their orders/rentals)
// For demonstration, let's assume you have an 'orders' table with UserID and TotalPrice columns

$customers = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // If you do not have an 'orders' table, set TotalPrice to 0 or fetch from another relevant table
        $row['TotalPrice'] = 0;

        // If Place and Pincode are not set, allow input (for demo, add empty)
        $row['Place'] = '';
        $row['Pincode'] = '';
        $customers[] = $row;
    }
}
?>
<?php if (!empty($customers)): ?>
    <h3 style="text-align:center;">Checkout Receipt / Form</h3>
    <form method="post" action="">
        <table>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Total Price</th>
                <th>Place</th>
                <th>Pincode</th>
                <th>Action</th>
            </tr>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?php echo $customer['UserID']; ?></td>
                <td><?php echo htmlspecialchars($customer['CustomerName']); ?></td>
                <td><?php echo htmlspecialchars($customer['Email']); ?></td>
                <td><?php echo '₹' . number_format($customer['TotalPrice']); ?></td>
                <td>
                    <input type="text" name="place[<?php echo $customer['UserID']; ?>]" required placeholder="Enter place">
                </td>
                <td>
                    <input type="text" name="pincode[<?php echo $customer['UserID']; ?>]" required pattern="\d{6}" maxlength="6" placeholder="Pincode">
                </td>
                <td>
                    <button type="submit" name="checkout" value="<?php echo $customer['UserID']; ?>">Checkout</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </form>
<?php endif; ?>

<?php
// Handle checkout form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    $userId = intval($_POST['checkout']);
    $place = mysqli_real_escape_string($con, $_POST['place'][$userId] ?? '');
    $pincode = mysqli_real_escape_string($con, $_POST['pincode'][$userId] ?? '');

    // Here you would typically save the place and pincode to the database
    // For example:
    // $updateSql = "UPDATE customers SET Place='$place', Pincode='$pincode' WHERE UserID=$userId";
    // mysqli_query($con, $updateSql);

    echo "<p style='color:green;text-align:center;'>Checkout successful for User ID $userId. Place: $place, Pincode: $pincode</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Reviews / Summary</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
        }
        h2 {
            color: #800020;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            margin: 30px auto;
            width: 90%;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 20px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #800020;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .no-data {
            text-align: center;
            color: grey;
        }
    </style>
</head>
<body>

<h2>Registered Customer Summary</h2>


<!DOCTYPE html>
<html>
<head>
    <title>Customer Reviews / Summary</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
        }
        h2 {
            color: #800020;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            margin: 30px auto;
            width: 90%;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 20px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #800020;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .no-data {
            text-align: center;
            color: grey;
        }
    </style>
</head>
<body>

<h2>Registered Customer Summary</h2>

<?php if (mysqli_num_rows($result) > 0): ?>
<table>
    <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Register Date</th>
        <th>Place</th>
        <th>Pincode</th>
        <th>Total Price</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['UserID']; ?></td>
        <td><?php echo htmlspecialchars($row['CustomerName']); ?></td>
        <td><?php echo htmlspecialchars($row['Email']); ?></td>
        <td><?php echo htmlspecialchars($row['Contact']); ?></td>
        <td><?php echo $row['RegisterDate']; ?></td>
        <td><?php echo isset($row['Place']) ? htmlspecialchars($row['Place']) : '—'; ?></td>
        <td><?php echo isset($row['Pincode']) ? htmlspecialchars($row['Pincode']) : '—'; ?></td>
        <td><?php echo isset($row['TotalPrice']) ? '₹' . number_format($row['TotalPrice']) : '—'; ?></td>
    </tr>
    <?php endwhile; ?>
</table>
<?php else: ?>
    <p class="no-data">No customer data found.</p>
<?php endif;

mysqli_close($con);
?>

</body>
</html>
