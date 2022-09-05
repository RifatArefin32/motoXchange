<?php

$conn = mysqli_connect('localhost', 'root', '', 'motoxchange');

session_start();

if (!isset($_SESSION['user_name'])) {
    //    header('location:login.php');
}

$sql = "SELECT * FROM `promotion`;";
$query = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>motoXchange</title>

    <!-- Add icon -->
    <link rel="icon" href="Images/alogo.png">
    <!-- Add Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Add CSS file -->
    <link rel="stylesheet" href="style.css">

    <!--link to box icons-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    


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

            <button style="background-color: rgb(0, 0, 0);color: white; font-size: 25px;" id="accnBox1" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

    <!-- Home Section -->
    <section id="home">
        <div class="container">
            <div class="fuc">
                <h4>Here you get everything</h4>
                <h1>Just Drive your <span>Dream !!! </span></h1>
                <h5>A complete platform to make your dream true</h5>
                <br>
            </div>
            <a href="shop.php" id="exp" style="text-decoration: none; color: white;"><button style="font-size: 25px;">Explore Now</a></button></a>
        </div>
    </section>

    <!-- Ad Section -->
    <section id="ad">
        <div class="container text-center mt-5 py-4">
            <h3 style="color: crimson;">Promotional Ads</h3>
            <hr>
            <p>For your Promotional ads, contact us through our Phone number or other social media.
                <a href="#footer" id="signup">contact now</a>
            </p>
        </div>

        <div id="carouselExampleCaptions" class="carousel container slide my-0 mb-5" data-bs-ride="carousel">


            <div class="carousel-inner row g-0 row2" style="box-shadow: 10px 10px 30px black;">
                <?php
                for ($i = 1; $i <= $rowcount; $i++) {
                    $row = mysqli_fetch_array($query);
                ?>
                    <?php
                    if ($i == 1) {
                    ?>
                        <div class="carousel-item active">
                            <img src="promotion/<?php echo $row['image'] ?>" class="d-block d-md-block d-sm-flex w-100" alt="...">
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="carousel-item">
                            <img src="promotion/<?php echo $row['image'] ?>" class="d-block d-md-block d-sm-flex w-100" alt="...">
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </section>


    <!-- Car Section -->
    <section id="market">
        <div class="container text-center mt-5">
            <br><br>
            <h3 style="color: crimson;">Recently Added Cars</h3>
            <hr>
            <p>These cars are recently posted. Simply choose on which you are interested. To explore more cars, Scroll Down and Press 'Explore More' .
            </p>
        </div>

        <!-- Import files from database -->
        <?php

        // Initially take no images to the array
        $id = array();
        $username = array();
        $image = array();
        $brand = array();
        $carcondition = array();
        $model = array();
        $run = array();
        $year = array();
        $fuel = array();
        $option = array();
        $transmission = array();
        $description = array();



        for ($i = 0; $i < 6; $i++) {
            $image[$i] = 'noimage.jpg';
        }

        $sql = "select * from uploads";
        $query = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($query);
        $offset = $num_rows - 6;
        if ($offset < 0) {
            $offset = 0;
        }


        $sql = "select * from uploads limit 6 offset $offset";
        $query = mysqli_query($conn, $sql);

        $i = 0;

        while ($row = mysqli_fetch_assoc($query)) {
            $id[$i] = $row['id'];
            $username[$i] = $row['username'];
            $image[$i] = $row['image'];
            $brand[$i] = $row['brand'];
            $carcondition[$i] = $row['carcondition'];
            $model[$i] = $row['model'];
            $run[$i] = $row['run'];
            $year[$i] = $row['year'];
            $fuel[$i] = $row['fuel'];
            $option[$i] = $row['option'];
            $transmission[$i] = $row['transmission'];
            $description[$i] = $row['description'];
            $i++;
        }
        ?>

        <div class="container-fluid text-center row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5 m-sm-auto m-md-auto m-lg-auto px-5">
            <div class="col">
                <div class="card">
                    <img src="uploads/<?php echo $image[0] ?>" class="card-img-top" alt="..." id="car-card" style="background:url('Images/noimage.jpg'); background-size: cover; background-position: center;">
                    <div class="card-body">
                        <h5 class="card-title mx-5"><?php if (isset($option[0])) {
                                                        echo $option[0];
                                                    } else {
                                                        echo 'NOT AVAILABLE';
                                                    } ?></h5>
                        <hr style="height:3px;">
                        <div class="text-start px-4">
                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($brand[0])) {
                                                                                        echo $brand[0];
                                                                                    } else {
                                                                                        echo 'NOT AVAILABLE';
                                                                                    }
                                                                                    ?></span></span><br>
                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[0])) {
                                                                                        echo $model[0];
                                                                                    } else {
                                                                                        echo 'NOT AVAILABLE';
                                                                                    }
                                                                                    ?></span></span>
                            <br>
                            <br>
                        </div>
                        <?php
                        if (!isset($id[0])) {
                            echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
                        } else {
                            echo "<a href='sproduct.php?car-id=$id[0]' style='text-decoration: none; color: white;'>
                <button name='view class='buy-btn'>View</button>
              </a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="uploads/<?php echo $image[1] ?>" class="card-img-top" alt="..." id="car-card" style="background:url('Images/noimage.jpg'); background-size: cover; background-position: center;">
                    <div class="card-body">
                        <h5 class="card-title mx-5"><?php if (isset($option[1])) {
                                                        echo $option[1];
                                                    } else {
                                                        echo 'NOT AVAILABLE';
                                                    } ?></h5>
                        <hr style="height:3px;">
                        <div class="text-start px-4">
                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($brand[1])) {
                                                                                        echo $brand[1];
                                                                                    } else {
                                                                                        echo 'NOT AVAILABLE';
                                                                                    }
                                                                                    ?></span></span><br>
                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[1])) {
                                                                                        echo $model[1];
                                                                                    } else {
                                                                                        echo 'NOT AVAILABLE';
                                                                                    }
                                                                                    ?></span></span>
                            <br>
                            <br>
                        </div>
                        <?php
                        if (!isset($id[1])) {
                            echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
                        } else {
                            echo "<a href='sproduct.php?car-id=$id[1]' style='text-decoration: none; color: white;'>
                <button name='view class='buy-btn'>View</button>
              </a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="uploads/<?php echo $image[2] ?>" class="card-img-top" alt="..." id="car-card" style="background:url('Images/noimage.jpg'); background-size: cover; background-position: center;">
                    <div class="card-body">
                        <h5 class="card-title mx-5"><?php if (isset($option[2])) {
                                                        echo $option[2];
                                                    } else {
                                                        echo 'NOT AVAILABLE';
                                                    } ?></h5>
                        <hr style="height:3px;">
                        <div class="text-start px-4">
                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($brand[2])) {
                                                                                        echo $brand[2];
                                                                                    } else {
                                                                                        echo 'NOT AVAILABLE';
                                                                                    }
                                                                                    ?></span></span><br>
                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[2])) {
                                                                                        echo $model[2];
                                                                                    } else {
                                                                                        echo 'NOT AVAILABLE';
                                                                                    }
                                                                                    ?></span></span>
                            <br>
                            <br>
                        </div>
                        <?php
                        if (!isset($id[2])) {
                            echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
                        } else {
                            echo "<a href='sproduct.php?car-id=$id[2]' style='text-decoration: none; color: white;'>
                <button name='view class='buy-btn'>View</button>
              </a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="uploads/<?php echo $image[3] ?>" class="card-img-top" alt="..." id="car-card" style="background:url('Images/noimage.jpg'); background-size: cover; background-position: center;">
                    <div class="card-body">
                        <h5 class="card-title mx-5"><?php if (isset($option[3])) {
                                                        echo $option[3];
                                                    } else {
                                                        echo 'NOT AVAILABLE';
                                                    } ?></h5>
                        <hr style="height:3px;">
                        <div class="text-start px-4">
                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($brand[3])) {
                                                                                        echo $brand[3];
                                                                                    } else {
                                                                                        echo 'NOT AVAILABLE';
                                                                                    }
                                                                                    ?></span></span><br>
                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[3])) {
                                                                                        echo $model[3];
                                                                                    } else {
                                                                                        echo 'NOT AVAILABLE';
                                                                                    }
                                                                                    ?></span></span>
                            <br>
                            <br>
                        </div>
                        <?php
                        if (!isset($id[3])) {
                            echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
                        } else {
                            echo "<a href='sproduct.php?car-id=$id[3]' style='text-decoration: none; color: white;'>
                <button name='view class='buy-btn'>View</button>
              </a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="uploads/<?php echo $image[4] ?>" class="card-img-top" alt="..." id="car-card" style="background:url('Images/noimage.jpg'); background-size: cover; background-position: center;">
                    <div class="card-body">
                        <h5 class="card-title mx-5"><?php if (isset($option[4])) {
                                                        echo $option[4];
                                                    } else {
                                                        echo 'NOT AVAILABLE';
                                                    } ?></h5>
                        <hr style="height:3px;">
                        <div class="text-start px-4">
                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($brand[4])) {
                                                                                        echo $brand[4];
                                                                                    } else {
                                                                                        echo 'NOT AVAILABLE';
                                                                                    }
                                                                                    ?></span></span><br>
                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[4])) {
                                                                                        echo $model[4];
                                                                                    } else {
                                                                                        echo 'NOT AVAILABLE';
                                                                                    }
                                                                                    ?></span></span>
                            <br>
                            <br>
                        </div>
                        <?php
                        if (!isset($id[4])) {
                            echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
                        } else {
                            echo "<a href='sproduct.php?car-id=$id[4]' style='text-decoration: none; color: white;'>
                <button name='view class='buy-btn'>View</button>
              </a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="uploads/<?php echo $image[5] ?>" class="card-img-top" alt="" id="car-card" style="background:url('Images/noimage.jpg'); background-size: cover; background-position: center;">
                    <div class="card-body">
                        <h5 class="card-title mx-5"><?php if (isset($option[5])) {
                                                        echo $option[5];
                                                    } else {
                                                        echo 'NOT AVAILABLE';
                                                    } ?></h5>
                        <hr style="height:3px;">
                        <div class="text-start px-4">
                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($brand[5])) {
                                                                                        echo $brand[5];
                                                                                    } else {
                                                                                        echo 'NOT AVAILABLE';
                                                                                    }
                                                                                    ?></span></span><br>
                            <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[5])) {
                                                                                        echo $model[5];
                                                                                    } else {
                                                                                        echo 'NOT AVAILABLE';
                                                                                    }
                                                                                    ?></span></span>
                            <br>
                            <br>
                        </div>
                        <?php
                        if (!isset($id[5])) {
                            echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
                        } else {
                            echo "<a href='sproduct.php?car-id=$id[5]' style='text-decoration: none; color: white;'>
                <button name='view class='buy-btn'>View</button>
              </a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center pt-5">
            <a href="shop.php" style="text-decoration: none; color: white;"><button style="font-size: 20px;">Explore
                    More</button></a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container text-center mt-0 py-5">
            <h3 style="color: crimson;">About Us</h3>
            <hr>
            <p><strong style="font-size: 20px;"><span style="color: red;">moto</span>X<span style="color: rgb(104, 101, 101);">change</span></strong> is a platform on which you can buy and
                sell or exchange
                new, used or reconditioned car.
                Upload your car details as AD or
                check out ads to have your desired car with 100% buyer protection..</p>
        </div>
        <section class="login pb-5">
            <div class="container">
                <div class="row g-0 row1">
                    <div class="col-lg-7">
                        <img style="border-radius: 30px; box-shadow: 5px 5px 30px" src="Images/car12.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-5 text-center py-5">
                        <a href="index.html" style="font-size: 35px; font-weight: 700; color: black; text-decoration: none;" title="motoXchange | Buy, sell or exchange second hand cars here">
                            <span style="font-size: 30px; color: red;">moto</span>X<span style="font-size: 30px;
                        color: rgb(131, 131, 131);">change</span></a>
                        <h5>Drive your <span style="color: red;">Dream</span> ... </h5>

                        <hr style="height: 5px; width: 50%; margin-left: 25%; background-color:rgb(3, 1, 1);
                        border-radius: 10px; color: red;">
                        <br>

                        <h4><span style="color: rgb(179, 18, 18);">Have items to sell?</span></h4>
                        <p id="para">Sign up for a free account to start selling your items!
                            It takes less than 2 minutes to post an ad.
                            Create great ads that generate a lot of buyer interest.
                            We also have some great tools that help make your ad stand out from the rest.
                        </p>
                        <br>
                        <h4><span style="color: rgb(179, 18, 18);">Looking to buy something?</span></h4>
                        <p id="para"><strong style="font-size: 16px;"><span style="color: red;">moto</span>X<span style="color: rgb(104, 101, 101);">change</span></strong> has the widest selection
                            of car items all over Bangladesh.
                            Whether you're looking for a car, you will find the best deal on
                            <strong style="font-size: 16px;"><span style="color: red;">moto</span>X<span style="color: rgb(104, 101, 101);">change</span></strong> .
                            It is super easy to find exactly what you're looking for!
                        </p>
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