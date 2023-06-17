<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.tailwindcss.com/2.2.19" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <title>Invoice Page</title>
  <style>
    body{
        background-color:#0d405d;
    }
    .but {
        transition: all .5s ease;
        color: #0d405d;
        border: 3px solid #0d405d;
        font-family: Poppins-bold;
        text-align: center;
        font-size: 1rem;
        line-height: 1rem;
        border-radius: 4px;
    }
    .but:hover {
        color: rgb(17 24 39);
        background-color: #0d405d;
    }
    .desc{
        color:#AFA5C3;
    }
    .t{
        border-color:#AFA5C3;
    }
</style>
<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

$tang = date("Y-m-d");

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['customer_id'])) {
    die("Customer ID is not set in the session.");
}

$user_id = intval($_SESSION['customer_id']);
$use = mysqli_query($conn, "SELECT * FROM Customers WHERE customer_id = $user_id");
$row = mysqli_fetch_assoc($use);

$data = intval($_POST['order']);
$query = "SELECT * FROM Product WHERE product_id = $data";
$product = mysqli_query($conn, $query);
$pro = mysqli_fetch_assoc($product);

if (!$product) {
    die("Error: " . mysqli_error($conn));
}

$query = "INSERT INTO Orders (customer_id, order_date, product_id, status) VALUES ($user_id, '$tang', $data, 0)";
$profile = mysqli_query($conn, $query);

$query1 = "SELECT * FROM Orders ORDER BY orders_id DESC LIMIT 1;";
$profile1 = mysqli_query($conn, $query1);
$invo = mysqli_fetch_assoc($profile1);



if (!$profile) {
    die("Error: " . mysqli_error($conn));
}
?>

</head>
<body style="font-family:Poppins; color:#F4EEFF;">
<form action="Progress.php" method="post">
    <input name="order" type="hidden" value="<?php echo $data; ?>">

    <header class="py-4">
        <div class="container flex flex-col justify-center mx-auto px-4 text-center">
            <h1 class="text-2xl font-semibold">Invoice #<?php echo $invo['orders_id']; ?></h1>
            <p class="desc">Issued on <?php echo $invo['order_date']; ?></p>
        </div>
    </header>

    <main class="container mx-auto py-8">
    <div class="bg-gray-900 rounded-lg shadow-md p-8">
        <div class="flex flex-col text-center justify-center mb-8">
            <h2 class="text-lg font-semibold">Billing Details</h2>
            <p class="desc"><?php echo $row['name_cus']; ?></p>
            <p class="desc"><?php echo $row['email']; ?></p>
        </div>

        <table class="w-full border-collapse">
            <thead>
            <tr>
                <th class="border-b-2 t py-2">Item</th>
                <th class="border-b-2 t py-2">Description</th>
                <th class="border-b-2 t py-2">Price</th>
                <th class="border-b-2 t py-2">Total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="desc border-b-2 t py-2 text-center"><?php echo $pro['name_pro']; ?></td>
                <td class="desc border-b-2 t py-2 text-center"><?php echo $pro['description']; ?></td>
                <td class="desc border-b-2 t py-2 text-center">$<?php echo $pro['unit_price']; ?></td>
                <td class="desc border-b-2 t py-2 text-center">$<?php echo $pro['unit_price']; ?></td>
            </tr>
            </tbody>
        </table>
        <div class="flex flex-col mt-5 justify-center text-center">
            <a href=""><p class="text-center mb-5">File Path : <?php echo $pro['file_path'] ?> </p></a>
            <img src="<?php echo $pro['file_path'] ?>" alt="">
        </div>

        <div class="flex justify-center mt-8">
            <a href="gstock.php" class="but text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Back to Home
            </a>
        </div>
    </div>
    </main>
    </form>

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

