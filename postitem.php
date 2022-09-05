<?php


session_start();

if (isset($_POST['submit'])) {
    // The path to store the uploaded image
    $target = "uploads/" . basename($_FILES['image']['name']);

    // Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'motoxchange');

    // Get all the submitted data from the form
    $username = $_SESSION['user_name'];
    $image = $_FILES['image']['name'];
    $brand = $_POST['brand'];
    $carcondition = $_POST['carcondition'];
    $model = $_POST['model'];
    $run = $_POST['run'];
    $year = $_POST['year'];
    $fuel = $_POST['fuel'];
    $option = $_POST['option'];
    $transmission = $_POST['transmission'];
    $description = $_POST['description'];


    $sql = " INSERT INTO `uploads`(`username`, `image`, `brand`, `carcondition`, `model`, `run`, `year`, `fuel`, `option`, `transmission`, `description`) 
    VALUES ('$username', '$image', '$brand', '$carcondition', '$model', '$run', '$year', '$fuel', '$option', '$transmission', '$description'); ";
    mysqli_query($conn, $sql);


    // Now move the uploaded image into the folders
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        header('location:user.php');
    } else {
        $msg = "OPPS!! There's a problem. Please try again carefully.";
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Post Item | motoXchange</title>
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
        select {
            padding: 8px;
            border-radius: 10px;
            width: 39%;
            border: 2px solid black;
            box-shadow: 10px 10px 30px rgb(48, 47, 47);
        }

        .error-msg {
            text-align: center;
            text-shadow: 8px 8px 15px black;
            font-weight: 500;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#delete").click(function() {
                if (!confirm("Are you sure to post before check it again?")) {
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

    <!-- upload form -->
    <section class="login py-5 mt-5 ">
        <div class="container text-center mt-4">
            <h3 id="car-add1" style="color: crimson;">Post your ad here</h3>
            <hr>
            <h5 class="error-msg">
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
            </h5>

        </div>
        <div class="container mt-5 ">
            <div class="row g-0 row1">
                <div class="col-lg-7" >
                    <img style="border-radius: 30px; box-shadow: 5px 5px 30px; border:none;" src="Images/car16.jpg" alt="" class="img-fluid" style=" object-fit: fill;">
                </div>
                <div class="col-lg-5 text-center mt-5 py-5">
                    <a class="mt-5" href="index.php" style="font-size: 35px; font-weight: 700; color: black; text-decoration: none;" title="motoXchange | Buy, sell or exchange second hand cars here">
                        <span style="font-size: 30px; color: red;">moto</span>X<span style="font-size: 30px;
                        color: rgb(131, 131, 131);">change</span></a>
                    <h6>Drive your <span style="color: red;">Dream</span> ... </h6>

                    <hr style="height: 5px; width: 50%; margin-left: 25%; background-color:rgb(3, 1, 1);
                        border-radius: 10px; color: red;">

                    <!-- Upload Form -->
                    <form method="POST" action="" enctype="multipart/form-data">

                        <!-- Upload car image -->
                        <div class="form-row py-4">
                            <div class="col-lg-12">
                                <h4 style="color: crimson;">Choose an image</h4>
                                <input required type="file" name="image" class="file px-3" id="inp" style="border: 2px solid black; padding: 8px; border-radius: 8px; 
                                box-shadow: 10px 10px 30px rgb(48, 47, 47);">
                            </div>
                        </div>

                        <!-- Car band and condition -->
                        <div class="form-row py-4">
                            <div class="col-lg-12">
                                <!-- Car brand -->
                                <select required id="" name="brand" style="margin-right: 8px;">
                                    <option disable selected hidden>Brand</option>
                                    <option value="Audi ">AUDI</option>
                                    <option value="Bajaj">BAJAJ</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Foton">FOTON</option>
                                    <option value="Haval">HAVAL</option>
                                    <option value="Honda">HONDA</option>
                                    <option value="Hyundai">HYUNDAI</option>
                                    <option value="Kia">KIA</option>
                                    <option value="Land-rover">LAND ROVER</option>
                                    <option value="Lexus">LEXUS</option>
                                    <option value="Mahindra">MAHINDRA</option>
                                    <option value="Mazda">MAZDA</option>
                                    <option value="Marcedes-benz">MARCEDES BENZ</option>
                                    <option value="MG">MG</option>
                                    <option value="Mitsubishi">MITSUBISHI</option>
                                    <option value="Nissan">NISSAN</option>
                                    <option value="Peugeot">PEUGEOT</option>
                                    <option value="Proton">PROTON</option>
                                    <option value="Renault">RENAULT</option>
                                    <option value="Suzuki">SUZUKI</option>
                                    <option value="Tata">TATA</option>
                                    <option value="Toyota">TOYOTA</option>
                                    <option value="Others">OTHERS</option>
                                </select>

                                <!-- Car condition -->
                                <select required id="" name="carcondition">
                                    <option disable selected hidden>Car Condition</option>
                                    <option value="new">New</option>
                                    <option value="used">Used</option>
                                    <option value="reconditioned">Reconditioned</option>
                                </select>
                            </div>
                        </div>

                        <!-- Car model -->
                        <div class="form-row py-3 pt-4">
                            <div class="col-lg-12">
                                <input required type="text" name="model" id="inp" class="px-3" placeholder="Model">
                            </div>
                        </div>

                        <!-- Run and yearof manufacture -->
                        <div class="form-row py-3 pt-4">
                            <div class="col-lg-12">
                                <input required type="text" name="run" style="height: 50px; width: 41%;border: 2px solid black;
                                outline: none; border-radius: 10px; box-shadow: 10px 10px 20px rgb(48, 47, 47); margin-right:10px;" class="px-3" placeholder="Total run (km)">
                                <input required style="height: 50px; width: 35%;border: 2px solid black;
                                outline: none; border-radius: 10px; box-shadow: 10px 10px 20px rgb(48, 47, 47);" type="text" name="year" class="px-3" placeholder="Year">
                            </div>
                        </div>

                        <!-- Fuel Type -->
                        <div class="form-row py-3 pt-4">
                            <div class="col-lg-12">
                                <select required id="" name="fuel" style="height: 50px; width: 80%;
                                    border: 2px solid black; outline: none; border-radius: 10px;
                                    box-shadow: 10px 10px 20px rgb(48, 47, 47);">
                                    <option disable selected hidden>Fuel Type</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Petrol">Petrol</option>
                                    <option value="Octane">Octane</option>
                                    <option value="CNG">CNG</option>
                                    <option value="LPG">LPG</option>
                                    <option value="Hybrid">Hybrid</option>
                                    <option value="Electric">Electric</option>
                                    <option value="Others">Others (Must add to Description)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Choose option sell or exchange -->
                        <div class="form-row py-4">
                            <div class="col-lg-12">
                                <select required id="" name="option" style="margin-right: 10px;">
                                    <option value="Sell Only">Sell Only</option>
                                    <option value="Exchange Only">Exchange Only</option>
                                    <option value="Sell and Exchange ">Sell and Exchange</option>
                                </select>
                                <!-- Transmission Type -->
                                <select required id="" name="transmission">
                                    <option disable selected hidden>Transmission</option>
                                    <option value="Automatic">Automatic</option>
                                    <option value="Manual">Manual</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>

                        <!-- Add some description -->
                        <div class="form-row py-3 pt-4">
                            <div class="col-lg-12">
                                <textarea required style="width: 80%; border: 2px solid black; outline: none;
                                border-radius: 10px; box-shadow: 10px 10px 20px rgb(48, 47, 47);" class="px-3" name="description" cols="30" rows="5" placeholder="Describe detail features of your car"></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-row py-4">
                            <div class="col-lg-12">
                                <button onclick="alertFunction()" id="delete" class="btn1" name="submit">Upload your post</button><br><br>
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