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

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function signup($data)
{
    global $conn;

    $name = (stripslashes($data['name']));
    $email = strtolower(stripslashes($data['email']));
    $phone = $data['phone'];
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    if ($password !== $password2) {
        $error = "Password confirmation incorrect!";
        return $error;
    }

    $emailExistsQuery = "SELECT * FROM Customers WHERE email = '$email'";
    $result = mysqli_query($conn, $emailExistsQuery);
    if (mysqli_num_rows($result) > 0) {
        $error = "Email already exists. Please use a different email.";
        return $error;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO Customers (name_cus, email, phone, password) VALUES ('$name', '$email', '$phone', '$hashedPassword')";
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        $error = "Error: " . mysqli_error($conn);
        return $error;
    }
}

$error = "";

if (isset($_POST['signup'])) {
    $result = signup($_POST);
    if ($result === true) {
        echo "<script> alert('User successfully added!')</script>";
    } else {
        $error = $result;
    }
}
?>

<body class="bg-gray-100 text" style="font-family: Poppins">
    <div class="bg flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 bgf" method="POST" action="">
                <h2 class="text-2xl font-bold mb-6 text-center">Sign Up</h2>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input class="bgf appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Enter your name" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="bgf appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="phone">
                        Phone
                    </label>
                    <input class="bgf appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="phone" name="phone" type="text" placeholder="Enter your phone number" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="bgf appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Enter your password" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="password2">
                        Confirm Password
                    </label>
                    <input class="bgf appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline mb-5" id="password2" name="password2" type="password" placeholder="Enter your confirm password" required>
                </div>
                <div class="flex items-center justify-between">
                    <button onClick="alert('Is the data you entered correct?')" class="lo hover:bg-blue-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="signup">
                        Sign Up
                    </button>
                    <a class="colt inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="login.php">
                        Already have an account? Log in.
                    </a>
                </div>
            </form>
            
            <?php if (isset($error)): ?>
                <div class="shadow-md rounded px-3 pt-3 pb-3 mb-3">
                    <a href="signup.php"><p class="text-base text-red-500 font-bold text-center"><?php echo $error; ?></p></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
