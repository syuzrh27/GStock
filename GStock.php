<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GStock</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
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
    .logo1{
        animation: gerak ease-in-out 5s infinite;
    }
    .logo2 {
        animation: puter linear 25s infinite;
    }
    @keyframes puter {
        0% {
            transform: rotate(0deg) scale(1.3,1.3);
        }
        50%{
            transform: rotate(180deg) scale(1.4,1.4);
        }
        100% {
            transform: rotate(360deg) scale(1.3,1.3);
        }
    }
    @keyframes gerak {
        0% {
            transform: scale(1.3,1.3);
        }
        50% {
            transform: scale(1.4,1.4);
        }
        100%{
            transform: scale(1.3,1.3);
        }
    }
    .lala{
        position:relative;
        margin-top:10px;
    }
    .min1{
        font-family: Montserrat; 
        color: #F2CFF7;
        font-size:15em;
        margin-top:-130px;
        padding:23px;
    }
    .min2{
        font-family: Montserrat;
        color: #E0D4FC;
        font-size:15em;
        margin-top:-200px;
        padding:65px;
    }
    .moreg{
        font-family: Poppins;
        color: #6B0084;
        margin-top:-30px;
        z-index:2;
        font-size: 1.5rem;
        line-height: 2rem;
    }
    .morel{
        font-family: Poppins; 
        color: #22007A; 
        margin-bottom:150px; 
        margin-top:-70px; 
        z-index:2;
        font-size: 1.5rem;
        line-height: 2rem;
    }
    @media all and (max-width: 1280px){
        .min1{
            font-family: Montserrat; 
            color: #F2CFF7;
            font-size:10em;
            margin-top:-100px;
            padding:23px;
        }
        .moreg{
            font-family: Poppins;
            color: #6B0084;
            margin-top:-25px;
            z-index:2;
            font-size: 1.3rem;
            line-height: 1.8rem;
        }
        .morel{
            font-family: Poppins; 
            color: #22007A; 
            margin-bottom:150px; 
            margin-top:-45px; 
            z-index:2;
            font-size: 1.3rem;
            line-height: 1.8rem;
        }
        .min2{
            font-family: Montserrat;
            color: #E0D4FC;
            font-size:11em;
            margin-top:-140px;
            padding:40px;
        }
    }
    @media all and (max-width: 1024px){
        .min1{
            font-family: Montserrat; 
            color: #F2CFF7;
            font-size:8em;
            margin-top:-80px;
            padding:18px;
        }
        .moreg{
            font-family: Poppins;
            color: #6B0084;
            margin-top:-20px;
            z-index:2;
            font-size: 1.3rem;
            line-height: 1.5rem;
        }   
        .morel{
            font-family: Poppins; 
            color: #22007A; 
            margin-bottom:150px; 
            margin-top:-45px; 
            z-index:2;
            font-size: 1.3rem;
            line-height: 1.5rem;
        }
        .min2{
            font-family: Montserrat;
            color: #E0D4FC;
            font-size:9em;
            margin-top:-110px;
            padding:35px;
        }
    }
    @media all and (max-width: 768px){
        .min1{
            font-family: Montserrat; 
            color: #F2CFF7;
            font-size:5em;
            margin-top:-50px;
            padding:15px;
        }
        .moreg{
            font-family: Poppins;
            color: #6B0084;
            margin-top:-25px;
            z-index:2;
            font-size: 1rem;
            line-height: 1.2rem;
        }
        .morel{
            font-family: Poppins; 
            color: #22007A; 
            margin-bottom:150px; 
            margin-top:-25px; 
            z-index:2;
            font-size: 1rem;
            line-height: 1.2rem;
        }
        .min2{
            font-family: Montserrat;
            color: #E0D4FC;
            font-size:6em;
            margin-top:-75px;
            padding:25px;
        }
    }
</style>

<body class="overflow-x-hidden">
    <nav class="py-5 px-7 flex items-center justify-between sticky top-0 z-10" style="background-color: #F4EEFF;">
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

    <div class="place-content-center" style="margin-top:50px">
        <div class="place-content-center grid grid-cols-3 lala">
            <img src="l1.png" alt="logo1" class="max-w-full logo1">
            <img src="l2.png" alt="logo2" class="max-w-full logo2">
            <img src="l3.png" alt="logo3" class="max-w-full logo1">
        </div>
        
        <div class="flex justify-center">
            <p class="font-bold min2">L</p>
            <p class="font-bold min2">O</p>
            <p class="font-bold min2">G</p>
            <p class="font-bold min2">O</p>
            <p class="font-bold min2">S</p>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center">
        <a href="Logo.php" class="hover:underline font-light mt-2 morel">M O R E</a>
    </div>

    <div class="place-content-center">
        <div class="place-content-center grid grid-cols-3" style="position:relative;">
            <img src="p1.png" alt="logo1" class="max-w-full logo1">
            <img src="p2.png" alt="logo2" class="max-w-full logo1">
            <img src="p3.png" alt="logo3" class="max-w-full logo1">
        </div>
        
        <div class="flex justify-center">
            <p class="font-bold min1">G</p>
            <p class="font-bold min1">R</p>
            <p class="font-bold min1">A</p>
            <p class="font-bold min1">P</p>
            <p class="font-bold min1">H</p>
            <p class="font-bold min1">I</p>
            <p class="font-bold min1">C</p>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center">
        <a href="Grafis.php" class="hover:underline font-light moreg" style="font-family: Poppins; color: #6B0084; margin-top:; z-index:2">M O R E</a>
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