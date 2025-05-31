<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'stylique');

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']) ? $_POST['remember'] : '';

        $sql = "SELECT customers.CustomerID, users.UserID FROM customers 
            INNER JOIN users ON users.UserID = customers.UserID 
            WHERE users.Email='$email' AND users.Password='$password'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['loggedin'] = true;
            $_SESSION['UserID'] = $row['UserID'];
            $_SESSION['customerID'] = $row['CustomerID'];
            $_SESSION['UserType'] = 'customer';
            if($remember){
                setcookie('email', $email, time() + (86400 * 30), "/");
                setcookie('password', $password, time() + (86400 * 30), "/");
            }
            echo "<script>alert('Login Successful'); window.location.href='MyAcc.php';</script>";
        }
    }

    // If the user is already logged in, redirect them to the profile page
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        echo "<script>alert('You are already logged in.'); window.location.href='MyAcc.php';</script>";
        exit();
    }


// define variables and set to empty values
 $email = $password ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    if (empty($_POST["email"])) {
      echo "<script>alert('Email is required');</script>";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format');</script>";
      }
    }
      
    if (empty($_POST["password"])) {
      echo "<script>alert('Password is required');</script>";
    } else {
      $password = test_input($_POST["password"]);
      if (!preg_match("/^[A-Za-z\d@$!%*?&]{8,}$/",$password)) {
        echo "<script>alert('Password must be at least 8 characters long.');</script>";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>   
<style>

*{
    box-sizing:border-box;
}
body {
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
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

.login-container {
    position:relative;
    background-color: #fff;
    padding: 20px 40px 20px 20px;;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width:40%;
    text-align: center;
}

h2 {
    margin-bottom: 20px;
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
.input-field:focus{
    border:2px solid orangered;
}
.btn{
    background-color: #2563eb;
    color: white;
    padding: 10px 9px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    font-size:18px;
    font-weight:600;
    border-radius:5px;
    margin-top:10px;
    margin-left:7px;
}
.btn:hover {
    background-color: #1d4ed8;
}
.btn:after{
    background-color:red;
}
.checkbox{
    padding:10px;
    color:#555;
}
.options {
    margin-top: 20px;
}

.options a {
    display: block;
    margin-bottom: 10px;
    color: #007BFF;
    text-decoration: none;
}

.options a:hover {
    text-decoration: underline;
}

/* Responsive layout - when the screen is less than 650px wide, make the two columns 
stack on top of each other instead of next to each other */
@media screen and (max-width: 650px) {
.login-container{
    width:100%
}
  .col {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<body>
    <div class="login-container">
    <a href="javascript:history.back()" id="cancel-icon">
        <i class="fas fa-times"></i>
    </a>
    <script>
        document.getElementById('cancel-icon').addEventListener('click', function()
        {
        document.getElementById('loginForm').style.display = 'none';
        });
    </script>
        <h2>Log In</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="formcontent">
            <i class="fa fa-envelope icon"></i>
            <input class="input-field" type="email" name="email" 
            placeholder="Your Email Address" required maxlength="50" value="<?php echo $email;?>">
            </div>
            <div class="formcontent">
            <i class="fa fa-key icon"></i>
            <input class="input-field" type="password" name="password" 
            placeholder="Your Password" required minlength="8" maxlength="8" value="<?php echo $password;?>"> 
            </div>
            <button class="btn" name="login" type="submit"><a href="MyAcc.php">Login</a></button>
        </form>
        <div class="options">
            <p>Not Registered?
            <a href="register.php">Create a New Account.</a></p>
        </div>
    </div>
</body>
</html>