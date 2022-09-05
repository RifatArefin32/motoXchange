<?php

$conn = mysqli_connect('localhost', 'root', '', 'motoxchange');

session_start();

if (!isset($_SESSION['user_name'])) {
    //    header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | motoXchange</title>

    <!-- Add icon -->
    <link rel="icon" href="Images/alogo.png">
    <!-- Add Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Add CSS file -->
    <link rel="stylesheet" href="style.css">

    <!--link to box icons-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Style -->
    <style>
        .new-class-1 {
            border-bottom: 5px solid red;
            margin-left: 10%;
            margin-right: 10%;
            padding-top: 10px;
            padding-bottom: 10px;
            box-shadow: 5px 5px 20px black;
            margin-bottom: 5%;
        }

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

        .button {
            border: none;
            border-radius: 5px;
            color: white;
            padding: 8px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button:hover {
            transform: scale(1.1);
            transition: 0.5s;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#delete").click(function() {
                if (!confirm("Do you want to delete")) {
                    return false;
                }
            });
        });
    </script>

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


    <!-- Sign In form-->
    <section class="login py-5 mt-3">
        <div class="container mt-5 py-5 text-center">
            <div class="row1">

                <!-- Row-1 -->
                <!-- Logo and moto -->
                <div class="row g-0">
                    <div class="col-lg-12 text-center mt-5">
                        <a href="index.html" style="font-size: 35px; font-weight: 700; color: black; text-decoration: none;" title="motoXchange | Buy, sell or exchange second hand cars here">
                            <span style="font-size: 30px; color: red;">moto</span>X<span style="font-size: 30px;
                        color: rgb(131, 131, 131);">change</span></a>
                        <h6>Drive your <span style="color: red;">Dream</span> ... </h6>

                        <hr style="height: 5px; width: 50%; margin-left: 25%; background-color:rgb(3, 1, 1);
                        border-radius: 10px; color: red;">

                        <h4 style="color: #2C3E50 ; font-weight: 700;">View Profile</h4>
                    </div>
                </div>

                <!-- Row-2 -->
                <!-- user informations and Uploads -->
                <div class="row g-0 px-3 text-center">

                    <!-- Import files from database -->
                    <?php

                    if (isset($_GET['delete'])) {
                        $id = $_GET['delete'];
                        $sql = "DELETE FROM `uploads` WHERE id = $id;";

                        $img = "select image from uploads where id = $id";
                        $res = mysqli_query($conn, $img);
                        while($row = mysqli_fetch_assoc($res)){
                            unlink("uploads/" . $row['image']);
                        }
                        

                        mysqli_query($conn, $sql);
                    }

                    if (isset($_GET['user-page'])) {
                        $offset = $_GET['user-page'];
                        $x = $offset + 1;
                        $y = $offset - 1;
                    } else {
                        $offset = 0;
                        $x = $offset + 1;
                        $y = $offset - 1;
                    }

                    $username = $_SESSION['user_name'];
                    $sql1 = "SELECT * FROM `uploads` WHERE username = '$username';";
                    $query1 = mysqli_query($conn, $sql1);
                    $num_rows = mysqli_num_rows($query1);
                    $max_page = $num_rows / 1;

                    if (($num_rows % 1) != 0) {
                        $max_page++;
                    }

                    // Initially take no images to the array
                    // First fetch user information using username
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

                    // $sql = "select * from uploads limit 12 offset $offset";
                    $sql = "SELECT * FROM `uploads` WHERE username = '$username' LIMIT 1 OFFSET $offset;";
                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($query)) {
                        $id = $row['id'];
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
                    ?>

                    <!-- First column (User Information)-->
                    <div class="col-lg-6 text-center py-5 mx-0">
                        <h5 class="new-class-1" style="color: crimson;">Name: <span style="color: black;"> <?php echo $name ?></span></h5>
                        <h5 class="new-class-1" style="color: crimson;">Email: <span style="color: black;"> <?php echo $email ?></span></h5>
                        <h5 class="new-class-1" style="color: crimson;">Phone: <span style="color: black;"> <?php echo $phone ?> </span></h5>
                        <h5 class="new-class-1" style="color: crimson;">Facebook: <span style="color: black;">
                                <a class="facebook" target="blank" href="<?php echo $facebook ?>">Go to my Facebook</a></span></h5>
                        <h5 class="new-class-1" style="color: crimson;">Whatsapp No: <span style="color: black;"> <?php echo $whatsapp ?></span></h5>
                        <h5 class="new-class-1" style="color: crimson;">Address: <span style="color: black;"> <?php echo $address ?></span></h5>
                    </div>


                    <!-- Second column (Uploads)-->
                    <div class="col-lg-6 text-center py-5 mx-0">
                        <h5 class="new-class-1">My Uploads</span> ... </h5>

                        <div class="new-class-1 text-center">
                            <img src="uploads/<?php if (isset($image)) {
                                                    echo $image;
                                                } else {
                                                    echo "noimage.jpg";
                                                } ?>" style="height: 200px; width:100%; background-size: cover; background-position: center;
                            border-radius: 0px;" class="px-3 mt-1">
                            <hr style="height: 3px;">
                            <h5 style="color: crimson;">Brand: <span style="color: black;"> <?php if (isset($brand)) {
                                                                                                echo $brand;
                                                                                            } else {
                                                                                                echo "Noting to show";
                                                                                            }  ?></span></h5>
                            <h5 style="color: crimson;">Model: <span style="color: black;"> <?php if (isset($model)) {
                                                                                                echo $model;
                                                                                            } else {
                                                                                                echo "Noting to show";
                                                                                            } ?></span></h5>
                            <h5 style="color: crimson;"><?php if (isset($option)) {
                                                            echo $option;
                                                        } else {
                                                            echo "Noting to show";
                                                        } ?></h5>
                            <!-- view button -->
                            <a href='usercarview.php?car-id=<?php echo $id ?> ' style='text-decoration: none; color: white;'>

                                <?php if (isset($option)) {
                                    echo "<button name='view' class='button'>View</button>";
                                }
                                ?>
                            </a>
                            <!-- delete button -->
                            <a href='userpage.php<?php if (isset($id)) {
                                                        echo "?delete=" . $id;
                                                    } ?>' style='text-decoration: none; color: white;'>
                                <?php if (isset($option)) {
                                    echo "<button name='delete' id='delete' class='button'>Delete</button>";
                                }
                                ?>
                            </a>


                        </div>

                        <div class="text-center">
                            <?php
                            if ($y < 0) {
                                echo '<button disabled id="new1" style="background-color: grey; transform: scale(0.0); transition: 0s;">Back to previous</button>';
                            } else {
                                echo "<a href='userpage.php?user-page=$y'><button id='new1'> Previous  </button></a>";
                            }

                            if ($x >= $max_page) {
                                echo '<button disabled id="new2" style="background-color: grey; transform: scale(0.0); transition: 0s;">Go to next</button>';
                            } else {
                                echo "<a href='userpage.php?user-page=$x'><button id='new2'> Next </button></a>";
                            }
                            ?>
                        </div>

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



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>

</html>