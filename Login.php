<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<style>
    body{
        background-color: #F4EEFF;
    }
    .colt:hover{
        color: #00091D;
    }
    .lo:hover{
        color: #00091D;
        background-color: #F4EEFF;
        transition: all .5s ease;
    }
    .lo{
        color: #F4EEFF;
        border: 2px solid #F4EEFF;
    }
    .colt{
        color: #F4EEFF;
    }
    .text{
        color: #F4EEFF;
    }
    .bg{
        background-color: #00091D;
    }
    .bgf{
        background-color: #0d405d;
    }
    .border{
        border: 2px solid #F4EEFF;
    }
</style>

<?php
session_start();

if (isset($_SESSION['login'])) {
    // Redirect to the login page if the user is already logged in
    header("Location: GStock.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "contentweb";

// Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check Connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM Customers WHERE email='$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];
        $customer_id = $row['customer_id'];
        
        if (password_verify($password, $hashedPassword)) {
            $_SESSION["login"] = true;
            $_SESSION["customer_id"] = $customer_id;

            header("Location: GStock.php");
            exit;
        } else {
            $error = "Incorrect password. Please try again.";
        }
    } else {
        $error = "Email not found. Please try again.";
    }
}
?>


<body class="bg-gray-100 text" style="font-family:Poppins">
    <div class="bg flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md">
            <div class="flex justify-center mb-10">
                <img src="logo.png" alt="Logo" class="w-16 h-16">
            </div>
            <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bgf" method="POST" action="login.php">
                <h2 class="text-2xl font-bold mb-6 text-center">Log In</h2>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="bgf appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="bgf appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline mb-5" id="password" name="password" type="password" placeholder="Enter your password" required>
                </div>
                <div class="flex items-center justify-between">
                    <button class="lo font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="login">
                        Log In
                    </button>
                    <a class="colt inline-block align-baseline font-bold text-sm" href="Signup.php">
                        Don't have an account? Sign up.
                    </a>
                </div>
            </form>
            
            <?php if (isset($error)): ?>
                <div class="shadow-md rounded px-3 pt-3 pb-3 mb-3">
                    <a href="login.php"><p class="text-xl text-red-500 font-bold text-center"><?php echo $error; ?></p></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
