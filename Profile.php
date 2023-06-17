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
        color: #A6B1E1;
    }
    .lo:hover{
        color: #B497FF;
    }
    .g:hover{
        color: #E89AFF;
    }
    .colt{
        color: #0d405d;
    }
    .text{
        color: #F4EEFF;
    }
    button {
        transition: all .5s ease;
        color: #E53E3E;
        border: 3px solid #E53E3E;
        font-family: Poppins-bold;
        text-align: center;
        font-size: 1rem;
        line-height: 1rem;
        border-radius: 4px;
    }
    button:hover {
        color: #0d405d;
        background-color: #E53E3E;
    }

</style>

<?php
session_start();

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

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['customer_id'])) {
    die("Customer ID is not set in the session.");
}

$user_id = $_SESSION['customer_id'];
$profile = mysqli_query($conn, "SELECT * FROM Customers WHERE customer_id = $user_id");

if (!$profile) {
    die("Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($profile);
?>


<body style="font-family: Poppins">
    <nav class="py-5 px-7 flex items-center justify-between top-0 z-10" style="background-color: #F4EEFF;">
        <a href="GStock.php" class="flex items-center">
            <img src="logo.png" alt="Logo" class="h-10 mr-2">
            <span class="text-3xl font-bold" style="color:#0d405d; font-family: Poppins">Stock</span>
        </a>
        <div class="flex gap-10 text-2xl" style="font-family: Poppins">
            <a href="Logo.php" class="font-bold colt lo mt-1">Logos</a>
            <a href="Grafis.php" class="font-bold colt g mt-1">Graphic</a>
            <a href="Profile.php" class="flex items-center"><img src="user.png" alt="Akun" class="h-10"></a>
        </div>
    </nav>

    <div class="container mx-auto py-8 text">
        <div class="bg-gray-900 rounded-lg shadow-lg">
            <div class="p-8">
                <div class="flex items-center justify-center">
                    <img src="user1.png" alt="Profile Picture" class="w-32 h-32 rounded-full">
                </div>
                <h1 class="text text-3xl font-bold text-center mt-4"><?php echo $row['name_cus']; ?></h1>
                <p class=" text-center mt-2">Customer <?php echo $row['customer_id']; ?></p>
                <div class="flex justify-center mt-4 mb-4">
                    <a href="#" class="mx-2"><?php echo $row['email']; ?></a>
                    <a href="#" class="mx-2"><?php echo $row['phone']; ?></a>
                </div>
                <div class="flex justify-center mt-4 mb-4">
                    <a href="logout.php"><button class="font-bold py-2 px-4 rounded mt-4">Logout</button></a>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900 text-gray-300 py-8 mt-52" style="font-family:Poppins;">
    <div class="container mx-auto flex flex-wrap justify-between items-center">
            <div class="w-full md:w-1/3 mb-6 md:mb-0">
                <a href="GStock.php" class="flex items-center mb-4">
                    <img src="logo.png" alt="Logo" class="h-8">
                    <span class="text-3xl font-bold ml-1" style="color:#0d405d; font-family: Poppins;">Stock</span>
                </a>
                <p class="text-sm">A growing archive of 1000+ design resources, weekly updated for the community.</p>
            </div>
            <div class="w-full md:w-1/3 mb-6 md:mb-0">
                <h4 class="text-lg font-bold mb-4">Explore GStock</h4>
                <ul class="list-none">
                    <li><a href="#" class="text-gray-300 hover:text-white">About Us</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Careers</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Press/Media</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Partnerships</a></li>
                </ul>
            </div>
            <div class="w-full md:w-1/3">
                <h4 class="text-lg font-bold mb-4">Legal</h4>
                <ul class="list-none">
                    <li><a href="#" class="text-gray-300 hover:text-white">Terms of Service</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Privacy Policy</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Licensing</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Contributor Terms</a></li>
                </ul>
            </div>
        </div>
    <hr class="border-gray-600 my-8">
    <div class="container mx-auto flex items-center justify-center space-x-4">
        <a href="#" class="text-gray-300 hover:text-white"><img src="fb.png" alt="Facebook" class="h-7"></a>
        <a href="#" class="text-gray-300 hover:text-white"><img src="twit.png" alt="Twitter" class="h-7"></a>
        <a href="#" class="text-gray-300 hover:text-white"><img src="ig.png" alt="Instagram" class="h-8"></a>
        <a href="#" class="text-gray-300 hover:text-white"><img src="lin.png" alt="LinkedIn" class="h-7"></a>
    </div>
    <div class="container mx-auto mt-8">
        <p class="text-sm text-center">&copy; 2023 GStock. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>