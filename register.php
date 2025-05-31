<?php

$name = $email = $contact = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    if (empty($_POST["name"])) {
        echo "<script>alert('Username is required.');</script>";
    } else {
        $name = test_input($_POST["name"]);
        if (strlen($name) < 3 || strlen($name) > 20) {
            echo "<script>alert('Username must be between 3 and 20 characters.');</script>";
        }
    }

    if (empty($_POST["email"])) {
        echo "<script>alert('Email is required.');</script>";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format.');</script>";
        }
    }
      
    if (empty($_POST["contact"])) {
        echo "<script>alert('Contact Number is required.');</script>";
    } else {
        $contact = test_input($_POST["contact"]);
        if (!preg_match("/^[0-9]{10}$/",$contact)) {
            echo "<script>alert('Contact number must be 10 digits.');</script>";
        }
    }

    if (empty($_POST["password"])) {
        echo "<script>alert('Password is required.');</script>";
    } else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 8 || strlen($password) > 8) {
            echo "<script>alert('Password must be at least 8 characters.');</script>";
        }
    }

    if (!empty($name) && !empty($email) && !empty($contact) && !empty($password)) {
        $con = mysqli_connect('localhost', 'root', '', 'stylique');
        
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $registered_date = date("Y-m-d");
// Insert into users table
    $sql = "INSERT INTO users (UserName, Email, Password, UserType) VALUES ('$name', '$email', '$password', 'customer')";
    if (mysqli_query($con, $sql)) {
    // Get the last inserted UserID
    $userID = mysqli_insert_id($con);

    // Insert into customers table using the retrieved UserID
    $sql = "INSERT INTO customers (UserID, RegisterDate, CustomerName, Email, Contact) VALUES ('$userID', '$registered_date', '$name', '$email', '$contact')";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Customer Registered Successfully');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
    }
}
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
    <body>
<style>
        *{
            box-sizing:border-box;
        }
        body{
            display:flex;
            justify-content:center;
            align-items:center;
            height:90%;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F5F5F5;
            color: #333;
        }
        #cancel-icon {
    position: absolute;
    top: 10px; /* Adjust distance from the top */
    right: 10px; /* Adjust distance from the right */
    font-size: 15px; /* Adjust icon size */
    cursor: pointer; /* Shows a pointer cursor on hover */
    color:#333;
}
#cancel-icon:hover {
    color: red;
}
        form{
            position:relative;
            background-color:#fff;
            padding: 20px 40px 20px 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 70%;
            text-align: center;
            margin-top:50px;
            margin-bottom:auto;
        }
        .formcontent{
            display: flex;
            width: 100%;
            margin-bottom: 15px;
        }
        .icon {
        padding: 10px;
        color: #333;
        min-width: 50px;
        text-align: center;
        }
        .input-field {
        width: 100%;
        padding: 10px;
        outline: none;
        }
        .input-field:focus {
        border: 2px solid orangered;
        }
        .btn{
            background: #2563eb;
            color: white;
            padding: 10px 9px;
            border: none;
            cursor: pointer;
            width: 100%;
            font-size:18px;
            font-weight:600;
            border-radius:5px;
        }
        .btn:hover {
        opacity: 1;
        background-color:#1d4ed8;
        }
        .btn:after{
            background-color:red;
        }
</style>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
            <a href="javascript:history.back()" id="cancel-icon">
                <i class="fas fa-times"></i>
            </a>
            <script>
            document.getElementById('cancel-icon').addEventListener('click', function()
            {
            document.getElementById('registerForm').style.display = 'none';
            });
            </script>
            <h2>Create Account</h2>
            <hr>    
            <br>
            <div class="formcontent">
                    <i class="fa fa-user icon"></i>
                    <input class="input-field" type="text" name="name" placeholder="* Enter your name."
                     required minlength="3" maxlength="20" value="<?php echo $name;?>"/><br>
                </div>
                <div class="formcontent">
                    <i class="fa fa-envelope icon"></i>
                    <input class="input-field" type="email" name="email" placeholder="* Enter your email address." maxlength="50"
                     pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" 
                     required value="<?php echo $email;?>"/><br> 
                </div>
                <div class="formcontent">
                    <i class="fa fa-phone icon"></i>
                    <input class="input-field" type="tel" name="contact" placeholder="* Enter your mobile number." maxlength="10"
                     pattern="[0-9]{10}" required value="<?php echo $contact;?>"/><br>
                </div>
                <div class="formcontent">
                    <i class="fa fa-lock icon"></i>
                    <input class="input-field" type="password" name="password" placeholder="* Enter your password." 
                     required minlength="8" maxlength="8" value="<?php echo $password;?>"/><br>
                </div>
                    <span style="color:grey;">* Indicated Fields are Required.</span>
            <hr>
            <button type="submit" class="btn" name="btn">Register</button>
            <div class="container signin" style="font-size: 14px;">
                 <br>By registering, you agree to our
                <a href="T&C.php" style="color:#6366f1; text-decoration:underline;">Terms &amp; Conditions</a>
                and
                <a href="PrivacyPolicy.php" style="color:#6366f1; text-decoration:underline;">Privacy Policy</a>.
            
                <p>Already have an account? <a href="login.php">log in</a>.</p>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($con)) {
                    if (mysqli_errno($con) == 1062) { // Error code for duplicate entry
                        echo "<script>
                                alert('Warning: Duplicate account entry, try logging in');
                                window.location.href = 'login.php';
                              </script>";
                    }
                $con->close();
                } 
                ?>
            </div>
        </form>
</body>
</html>