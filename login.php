<?php
$conn = mysqli_connect('localhost', 'root', '', 'motoxchange');

session_start();

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $pass =  $_POST['password'];

    $select = " SELECT * FROM user_form WHERE username = '$username' && password = '$pass'; ";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        if ($row['username'] == 'admin') {
            $_SESSION['user_name'] = $row['name'];

            header('location:admin.php');
        } else {
            $_SESSION['user_name'] = $row['username'];
            if (isset($_POST['remember'])) {
                setcookie('user_name', $username, time() + 86400);
                setcookie('password', $pass, time() + 86400);
            }
            header('location:user.php');
        }
    } else {
        $error[] = 'Incorrect Username or Password !!';
    }
};
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | motoXchange</title>

    <!-- Add icon -->
    <link rel="icon" href="Images/alogo.png">
    <!-- Add Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Add CSS file -->
    <link rel="stylesheet" href="style.css">


    <!--link to box icons-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <style>
        .error-msg {
            text-align: center;
            color: crimson;
            text-shadow: 8px 8px 15px black;
            font-weight: 500;
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
                        <a style="font-size: 20px;" class="nav-link" id="accnBox" href="index.php#home">Home</a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px;" class="nav-link" id="accnBox" href="index.php#market">Go to Market</a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px; color: #F39C12;" class="nav-link" id="accnBox" href="login.php">POST your AD</a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px;" class="nav-link" id="accnBox" href="index.php#about">About</a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px;" class="nav-link" id="accnBox" href="index.php#footer">Contact Us</a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px;" class="nav-link" id="accnBox" href="login.php">Sign In</a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px;" class="nav-link" id="accnBox" href="signup.php">Sign UP</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Sign In form-->
    <section class="login py-5 mt-5">
        <div class="container text-center mt-3">
            <h3 style="color: crimson;">Sign in here</h3>
            <hr>
            <p> You can sign in only when you have an <strong style="font-size: 20px;"><span style="color: red;">moto</span>X<span style="color: rgb(104, 101, 101);">change</span></strong> account </p>
        </div>
        <div class="container mt-5 text-center">
            <div class="row g-0 row1">
                <div class="col-lg-7">
                    <img style="border-radius: 30px; box-shadow: 5px 5px 30px" src="Images/car17.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-5 text-center py-5">
                    <a href="index.html" style="font-size: 35px; font-weight: 700; color: black; text-decoration: none;" title="motoXchange | Buy, sell or exchange second hand cars here">
                        <span style="font-size: 30px; color: red;">moto</span>X<span style="font-size: 30px;
                        color: rgb(131, 131, 131);">change</span></a>
                    <h6>Drive your <span style="color: red;">Dream</span> ... </h6>

                    <hr style="height: 5px; width: 50%; margin-left: 25%; background-color:rgb(3, 1, 1);
                        border-radius: 10px; color: red;">
                    <br>
                    <!-- Show Errors -->
                    <?php
                    if (isset($error)) {
                        foreach ($error as $error) {
                            echo '<h5 class="error-msg">' .  $error  . '</h5>';
                        };
                    };
                    ?>

                    <!-- Sign IN form-->
                    <form action="" method="POST">
                        <div class="form-row py-3 pt-4">
                            <div class="col-lg-12">
                                <input required type="text" name="username" class="px-3" id="inp" placeholder="Enter your UserName" value="<?php if (isset($_COOKIE['user_name'])) {
                                                                                                                                                echo $_COOKIE['user_name'];
                                                                                                                                            } ?>">
                            </div>
                        </div>
                        <div class="form-row py-3 pt-4">
                            <div class="col-lg-12">
                                <input required type="password" name="password" id="inp" class="px-3" placeholder="Enter your Password" value="<?php if (isset($_COOKIE['password'])) {
                                                                                                                                                    echo $_COOKIE['password'];
                                                                                                                                                } ?>">
                            </div>
                        </div>
                        <input type="checkbox" id="remember" name="remember" value="1"> <label for="remember">Remember me?</label> <br>

                        <div class="form-row py-4">
                            <div class="col-lg-12">

                                <button class="btn1" name="submit"> Sign IN</button><br><br>
                                Don't have an account? <a href="signup.php" id="signup">Sign UP</a>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
        </div>
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



    <!--Add Javascrip -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>

</html>