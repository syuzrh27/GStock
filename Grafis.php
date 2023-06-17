<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphic</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<style>
    body{
        background-color: #FDE9FF;
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
    button {
        transition: all .5s ease;
        color: #E89AFF;
        border: 3px solid #E89AFF;
        font-family: Poppins;
        text-align: center;
        font-size: 1rem;
        line-height: 1rem;
    }
    button:hover {
        color: #111827;
        background-color: #E89AFF;
    }
    .title{
        color: #E89AFF;
    }
    .desc{
        color: #FDE9FF;
    }
</style>
<body>
<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "contentweb";

    // Connection
    $conn = mysqli_connect($servername,$username, $password,$database);

    // Check Connection
    if (!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }

    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit;
    }
?>
    <?php
            include'conn.php';
            $logo = mysqli_query($conn, "select * from product where kategory_id = 2");
            ?>
    <nav class="py-5 px-7 flex items-center justify-between sticky top-0 z-10" style="background-color: #FDE9FF;">
        <a href="GStock.php" class="flex items-center">
            <img src="logo.png" alt="Logo" class="h-10 mr-2">
            <span class="text-3xl font-bold" style="color:#0d405d; font-family: Poppins">Stock</span>
        </a>
        <div class="flex gap-10 text-2xl" style="font-family: Poppins">
            <a href="Logo.php" class="font-bold colt lo mt-1">Logos</a>
            <a href="Grafis.php" class="font-bold colt g mt-1" style="color: #E89AFF">Graphic</a>
            <a href="Profile.php" class="flex items-center"><img src="user.png" alt="Akun" class="h-10"></a>
        </div>
    </nav>

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8" style="color:#E89AFF; font-family:Poppins;">Discover Your Template!</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 justify-center">
            <!-- Product 1 -->
            <?php foreach($logo as $l) :?>
            <div class="bg-gray-900 rounded-lg shadow p-4 flex justify-center">
            <div class="flex flex-col items-center">
                    <img src="<?php echo $l['file_path']?>" alt="Product 1" class="w-52 mb-4 rounded-lg">
                    <h2 class="title text-xl mb-2" style="font-family:Poppins-semibold;"><?php echo $l['name_pro']?></h2>
                    <p class="desc mb-4" style="font-family:Poppins;"><?php echo $l['description']?></p>
                    <p class="text-green-500 font-semibold" style="font-family:Poppins-semibold;">$<?php echo $l['unit_price']?></p>
                    <a href="Invoice.php?product_id=<?php echo $l['product_id']?>"><button class="font-bold py-2 px-4 rounded mt-4">Buy Now</button></a>
                </div>
            </div>
            <?php endforeach;?>
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