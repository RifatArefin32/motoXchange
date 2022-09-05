<?php

session_start();

//post a promo (successfull)
if (isset($_POST['submit'])) {
    // The path to store the uploaded image
    $target = "promotion/" . basename($_FILES['image']['name']);

    // Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'motoxchange');

    // Get all the submitted data from the form
    $image = $_FILES['image']['name'];
    // $date = $_POST['date'];
    $date = date('d-m-y');
    echo $date;
    $description = $_POST['description'];

    $sql = "INSERT INTO `promotion`(`image`, `description`, `date`) VALUES ('$image','$description','$date')";
    mysqli_query($conn, $sql);


    // Now move the uploaded image into the folders
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Congratulation !! Your post is successfully uploaded.";
    } else {
        $msg = "OPPS!! There's a problem. Please try again carefully.";
    }
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn = mysqli_connect('localhost', 'root', '', 'motoxchange');
    $sql = "DELETE FROM `promotion` WHERE id = $id;";
    
    $img = "select image from promotion where id = $id";
    $res = mysqli_query($conn, $img);
    while($row = mysqli_fetch_assoc($res)){
        unlink("promotion/".$row['image']);
    }
  
    
    mysqli_query($conn, $sql);
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Add icon -->
    <link rel="icon" href="Images/alogo.png">
    <!-- Add Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Add CSS file -->
    <link rel="stylesheet" href="style.css">
    <!--link to box icons-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <title>Admin | motoXchange</title>

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

        .new-class-1 {
            border-bottom: 5px solid red;
            margin-left: 10%;
            margin-right: 10%;
            padding-top: 10px;
            padding-bottom: 10px;
            box-shadow: 5px 5px 20px black;
            margin-bottom: 5%;
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
                        <a style="font-size: 20px;" class="nav-link" id="accnBox" href="adminshop.php">Go to Market</a>
                    </li>
                    <li class="nav-item p-lg-1">
                        <a style="font-size: 20px; color:white;" class="nav-link" id="accnBox" href="admin.php">
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
    <section class="login py-5 mt-5">
        <div class="container  text-center">
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

                        <h4 style="color: #2C3E50 ; font-weight: 700;">Upload Promotional Post Here</h4>
                        <h5 class="error-msg">
                            <?php
                            if (isset($msg)) {
                                echo $msg;
                            }
                            ?>
                        </h5>
                    </div>
                </div>

                <!-- Row-2 -->
                <!-- Promotional information and Uploads -->
                <div class="row g-0 px-3 text-center">
                    <?php

                    // Connect to database
                    $conn = mysqli_connect('localhost', 'root', '', 'motoxchange');

                    if (isset($_GET['user-page'])) {
                        $offset = $_GET['user-page'];
                        $x = $offset + 1;
                        $y = $offset - 1;
                    } else {
                        $offset = 0;
                        $x = $offset + 1;
                        $y = $offset - 1;
                    }

                    $sql1 = "SELECT * FROM `promotion` limit 1 offset $offset;";
                    $query1 = mysqli_query($conn, $sql1);

                    while ($row = mysqli_fetch_assoc($query1)) {
                        $id = $row['id'];
                        $image = $row['image'];
                        $description = $row['description'];
                        $date = $row['date'];
                    }

                    $sql1 = "SELECT * FROM `promotion`;";
                    $query1 = mysqli_query($conn, $sql1);
                    $max_page = mysqli_num_rows($query1);



                    ?>

                    <!-- First column (Upload Promo)-->
                    <div class="col-lg-6 text-center py-5 mx-0">
                        <form method="POST" action="admin.php" enctype="multipart/form-data">

                            <!-- Upload image -->
                            <div class="form-row py-3">
                                <div class="offset-1 col-lg-10">
                                    <h5 style="color: crimson;">Choose an image</h5>
                                    <input required type="file" name="image" class="file px-3" id="inp" style="border: 2px solid black; padding: 8px; border-radius: 8px; 
                                        box-shadow: 10px 10px 30px rgb(48, 47, 47);">
                                </div>
                            </div>

                            <!-- Add some description -->
                            <div class="form-row py-3">
                                <div class="offset-1 col-lg-10">
                                    <textarea required style="width: 80%; border: 2px solid black; outline: none;
                                        border-radius: 10px; box-shadow: 10px 10px 20px rgb(48, 47, 47);" class="px-3 new-class-1" name="description" cols="30" rows="5" placeholder="Add Some description"></textarea>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-row py-4">
                                <div class="offset-1 col-lg-10">
                                    <button class="btn1" name="submit">Upload your post</button><br><br>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Second column (Uploads)-->
                    <div class="col-lg-6 text-center py-5 mx-0">
                        <h5 class="new-class-1">Current Promotions</span></h5>

                        <div class="new-class-1 text-center">
                            <img src="promotion/<?php if (isset($image)) {
                                                    echo $image;
                                                } else {
                                                    echo "noimage.jpg";
                                                } ?>" style="height: 200px; width:100%; background-size: cover; background-position: center;
                            border-radius: 0px;" class="px-3 mt-1">
                            <hr style="height: 3px;">
                            <h5 style="color: crimson;">Date of upload: <span style="color: black;"> <?php if (isset($date)) {
                                                                                                            echo $date;
                                                                                                        } else {
                                                                                                            echo "Noting to show";
                                                                                                        }  ?></span></h5>
                            <h5 style="color: crimson;">Description: <span style="color: black;"> <?php if (isset($description)) {
                                                                                                        echo $description;
                                                                                                    } else {
                                                                                                        echo "Noting to show";
                                                                                                    } ?></span></h5>
                            <!-- delete button -->
                            <br>
                            <a href='admin.php<?php if (isset($id)) {
                                                    echo "?delete=" . $id;
                                                } ?>' style='text-decoration: none; color: white;'>
                                <?php
                                if (isset($description)) {
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

                                echo "<a href='admin.php?user-page=$y'><button id='new1'> Previous  </button></a>";
                            }

                            if ($x >= $max_page) {
                                echo '<button disabled id="new2" style="background-color: grey; transform: scale(0.0); transition: 0s;">Go to next</button>';
                            } else {
                                echo "<a href='admin.php?user-page=$x'><button id='new2'> Next </button></a>";
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>


</body>

</html>