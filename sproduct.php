<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'motoxchange');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Item | motoXchange</title>

    <!-- Add icon -->
    <link rel="icon" href="Images/alogo.png">
    <!-- Add Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Add CSS file -->
    <link rel="stylesheet" href="style.css">

    <!--link to box icons-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    <style>
        #whatsapp {
            height: 60px;
            width: 70px;
            border-radius: 15px;
            margin-left: 10px;
        }

        #whatsapp:hover {
            transition: 0.5s;
            transform: scale(1.3);
            border-radius: 15px;
            box-shadow: 0px 0px 5px black;
            padding: 4px;
        }

        #facebook {
            color: #1F618D;
            text-decoration: none;
            font-weight: 500;
        }

        #facebook:hover {
            transition: 0.5s;
            transform: scale(1.3);
            border-radius: 5px;
            box-shadow: 0px 0px 5px black;
            padding: 3px 20px;
        }
    </style>

</head>

<body>

    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background: black; border-bottom:3px solid  red;">
        <div class="container-fluid py-1 px-5">

            <!-- <i id="car-logo" class='bx bxs-car-garage'></i> -->
            <img src="Images/alogo.png" alt="" id="car-logo" title="motoXchange | DRIVE YOUR DREAM">

            <!-- logo -->
            <a style="text-decoration: none; color: white; font-size: 25px;" href="#" class="logo" title="motoXchange | DRIVE YOUR DREAM"><span id="logo1">moto</span>X<span id="logo2">change</span>
            </a>

            <button style="background-color: rgb(0, 0, 0);color: white; font-size: 25px;" id="accnBox" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class='bx bx-menu'></i>
            </button>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px;" class="nav-link" id="accnBox" href="user.php#home">Home</a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px;" class="nav-link" id="accnBox" href="user.php#market">Go to Market</a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px; color: #F39C12;" class="nav-link" id="accnBox" href="postitem.php">POST your AD</a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px;" class="nav-link" id="accnBox" href="user.php#about">About</a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px;" class="nav-link" id="accnBox" href="user.php#footer">Contact Us</a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px; color:white;" class="nav-link" id="accnBox" href="userpage.php">
                            <?php
                            echo $_SESSION['user_name'];
                            ?>
                        </a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px;" class="nav-link" id="accnBox" href="index.php">Sign OUT</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- View item -->
    <section id="about" class="py-5">
        <div class="container text-center mt-5 py-5">
            <h3 style="color: crimson;">View this car</h3>
            <hr>
        </div>
        <section class="login pb-3">
            <div class="container">
                <div class="row g-0 row1">

                    <!-- Import files from database -->
                    <?php

                    if (isset($_GET['car-id'])) {
                        $id = $_GET['car-id'];
                    }

                    $sql = "SELECT * FROM `uploads` WHERE id = $id;";
                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($query)) {
                        $username = $row['username'];
                        $image = $row['image'];
                        $brand = $row['brand'];
                        $carcondition = $row['carcondition'];
                        $model = $row['model'];
                        $run = $row['run'];
                        $year = $row['year'];
                        $fuel = $row['fuel'];
                        $option = $row['option'];
                        $transmission = $row['transmission'];
                        $description = $row['description'];
                    }

                    $sql = "SELECT * FROM `user_form` WHERE username = '$username';";
                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($query)) {
                        $name = $row['name'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                        $facebook = $row['facebook'];
                        $whatsapp = $row['whatsapp'];
                        $address = $row['address'];
                    }

                    ?>

                    <div class="col-lg-6">
                        <img src="uploads/<?php echo $image ?>" style="border-radius: 30px; box-shadow: 5px 5px 30px" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-6 text-center py-5">
                        <a href="index.html" style="font-size: 35px; font-weight: 700; color: black; text-decoration: none;" title="motoXchange | Buy, sell or exchange second hand cars here">
                            <span style="font-size: 30px; color: red;">moto</span>X<span style="font-size: 30px;
                        color: rgb(131, 131, 131);">change</span></a>
                        <h5>Drive your <span style="color: red;">Dream</span> ... </h5>

                        <hr style="height: 5px; width: 50%; margin-left: 25%; background-color:rgb(3, 1, 1);
                        border-radius: 10px; color: red;">


                        <div class="px-5 mx-3 text-start">
                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                                <span style="padding-left: 3px; color: #34495E;"><?php echo $brand; ?></span>.</span><br>

                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                                <span style="padding-left: 3px; color: #34495E;"><?php echo $model; ?></span>.</span><br>

                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Car Condition:
                                <span style="padding-left: 3px; color: #34495E;"><?php echo $carcondition; ?></span>.</span><br>

                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Total Run in (km):
                                <span style="padding-left: 3px; color: #34495E;"><?php echo $run; ?></span>.</span><br>

                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Year of Manufacture:
                                <span style="padding-left: 3px; color: #34495E;"><?php echo $year; ?></span>.</span><br>

                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Fuel Type:
                                <span style="padding-left: 3px; color: #34495E;"><?php echo $fuel; ?></span>.</span><br>

                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Transmission:
                                <span style="padding-left: 3px; color: #34495E;"><?php echo $transmission; ?></span>.</span><br>

                            <!-- Description -->
                            <hr style="height: 2px;">
                                <span style="padding-left: 3px; color: black"><?php echo $description; ?></span>

                            <hr style="height: 2px;">

                            <span style="color: black; font-size: 20px; font-weight: 500;"><i class='bx bxs-bookmarks'></i> This car is available for
                                <span style="padding-left: 3px; color: crimson;"><?php echo $option; ?></span>.</span><br>

                            <!-- Uploader Information -->
                            <span style="color: black; font-size: 20px; font-weight: 500;"><i class='bx bxs-user'></i> Uploaded By: <span style="color: crimson;"><?php echo $name; ?></span></span><br>
                            <span style="color: black; font-size: 20px; font-weight: 500;"><i class='bx bxs-map'></i> Address: <span style="color: #E67E22;"><?php echo $address; ?></span></span><br>
                            
                            <span style="color: black; font-size: 20px; font-weight: 500;"><i class='bx bxl-facebook-square'></i> <a href="<?php echo $facebook; ?>" target="_blank" rel="noopener noreferrer" id="facebook">find me in Facebook</a></span><br>

                            <span style="color: black; font-size: 20px; font-weight: 500; " id="facebook"><i class='bx bxs-phone'></i> <?php echo $phone; ?></span><br>


                            <span style="color: black; font-size: 20px; font-weight: 500;">Send Massage on <a title="Send Massage on whatsapp" 
                            href="https://api.whatsapp.com/send?phone=88<?php echo $whatsapp; ?>" target="blank"><img id="whatsapp" src="Images/whatsapp.png" alt=""></img></a></span><br>

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </section>

 <!-- Footer Section -->
 <footer class="mt-5 py-2" style="background-color: black;" id="footer">
        <div class="row container pt-5 mx-auto">
            <!-- logo column -->
            <div class="footer-one col-lg-3 col-md-12 col-12 footer-box">
                <!-- logo -->
                <a style="text-decoration: none; color: white; font-size: 30px;" href="#" class="logo" title="motoXchange | Buy, sell or exchange second hand cars here">
                    <span style="color: red; font-size:25px;">moto</span>X<span style="color: rgb(103, 100, 100); font-size: 25px;">change</span>
                </a>
                <div class="social">
                    <a href="https://www.facebook.com/" target="_blank" title="Facebook/motoXchange" style="font-size: 30px;"><i class='bx bxl-facebook'></i></a>
                    <a href="https://www.twitter.com/" target="_blank" title="Twitter/motoXchange" style="font-size: 30px;"><i class='bx bxl-twitter'></i></a>
                    <a href="https://www.instagram.com/" target="_blank" title="Instagram/motoXchange" style="font-size: 30px;"><i class='bx bxl-instagram'></i></a>
                    <a href="https://www.youtube.com/" target="_blank" title="Youtube/motoXchange" style="font-size: 30px;"><i class='bx bxl-youtube'></i></a>
                </div>
            </div>
            <!-- Download our app -->
            <div class="footer-one col-lg-3 col-md-12 col-12 footer-box mb-5">
                <h3>Download Our App</h3>
                <div class="google">
                    <a href="https://play.google.com/store/games" target="_blank"><img src="Images/googleplay.png" alt=""></a>
                </div>
                <div class="apple">
                    <a href="https://www.apple.com/store" target="_blank"><img src="Images/apple.png" alt=""></a>
                </div>
            </div>
            <!-- Legals -->
            <div class="footer-one col-lg-3 col-md-12 col-12 footer-box">
                <h3>Legal</h3>
                <a href="privacy.html" target="blank">Privacy</a>
                <a href="term.html" target="blank">Terms and Conditions</a>

            </div>
            <!-- Contact Us -->
            <div class="footer-one col-lg-3 col-md-12 col-12 footer-box">
                <h3>Contact US</h3>
                <div>
                    <h4 class="text-uppercase">Address</h4>
                    <p>Road-1, House-2, Block-F, Mirpur-2, Dhaka-1216.</p>
                    <br>
                </div>
                <div>
                    <h4 class="text-uppercase">Phone</h4>
                    <p>+880-1881445919, +880-1881445919</p>
                    <br>
                </div>
                <div>
                    <h4 class="text-uppercase">Email</h4>
                    <p>motoxchange117@gmail.com</p>
                    <br>
                </div>
            </div>
        </div>
        <div class="row container pt-0 mt-1 mx-auto copyright">
            <p>Copyright <i class='bx bx-copyright'></i> r@m Technologies | All Right Reserved</p>
        </div>
    </footer>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>

</html>