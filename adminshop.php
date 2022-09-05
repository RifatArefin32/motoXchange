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
  <title>Market | motoXchange</title>

  <!-- Add icon -->
  <link rel="icon" href="Images/alogo.png">
  <!-- Add Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Add CSS file -->
  <link rel="stylesheet" href="style.css">

  <!--link to box icons-->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#delete0").click(function() {
        if (!confirm("Are you sure to delete?")) {
          return false;
        }
      });
      $("#delete1").click(function() {
        if (!confirm("Are you sure to delete?")) {
          return false;
        }
      });
      $("#delete2").click(function() {
        if (!confirm("Are you sure to delete?")) {
          return false;
        }
      });
      $("#delete3").click(function() {
        if (!confirm("Are you sure to delete?")) {
          return false;
        }
      });
      $("#delete4").click(function() {
        if (!confirm("Are you sure to delete?")) {
          return false;
        }
      });
      $("#delete5").click(function() {
        if (!confirm("Are you sure to delete?")) {
          return false;
        }
      });
      $("#delete6").click(function() {
        if (!confirm("Are you sure to delete?")) {
          return false;
        }
      });
      $("#delete7").click(function() {
        if (!confirm("Are you sure to delete?")) {
          return false;
        }
      });
      $("#delete8").click(function() {
        if (!confirm("Are you sure to delete?")) {
          return false;
        }
      });
      $("#delete9").click(function() {
        if (!confirm("Are you sure to delete?")) {
          return false;
        }
      });
      $("#delete10").click(function() {
        if (!confirm("Are you sure to delete?")) {
          return false;
        }
      });
      $("#delete11").click(function() {
        if (!confirm("Are you sure to delete?")) {
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
            <a style="font-size: 20px;" class="nav-link" id="accnBox" href="admin.php">Home</a>
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

  <!-- Car Section -->
  <section id="market" class="mt-1 py-5">
    <div class="container text-center mt-5">
      <h3 style="color: crimson;">Welcome to market</h3>
      <hr>
      <p>
        Monitor the market.
      </p>
    </div>

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


    if (isset($_GET['pageno'])) {
      $getpageno = $_GET['pageno'];
      // $offset = ($getpageno - 1) * 12;
      $offset = ($getpageno) * 12;
      $x = $getpageno + 1;
      $y = $getpageno - 1;
    }
    else{
      $offset = 0;
      $x = $offset +1;
      $y = $offset -1;
      
    }

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



    for ($i = 0; $i < 12; $i++) {
      $image[$i] = 'noimage.jpg';
    }


    $sql = "select * from uploads limit 12 offset $offset";
    $query = mysqli_query($conn, $sql);

    $i = 0;

    $sql1 = "select * from uploads";
    $query1 = mysqli_query($conn, $sql1);
    $num_rows = mysqli_num_rows($query1);
    $max_page = $num_rows / 12;

    // if (($num_rows % 12) != 0 && ($max_page >= 1)) {
    //   $max_page++;
    // }

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
                                                                    echo 'NO BRAND';
                                                                  }  ?></span>.</span><br>
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[0])) {
                                                                    echo $model[0];
                                                                  } else {
                                                                    echo 'NO MODEL';
                                                                  } ?></span>.</span>
              <br>
              <br>
            </div>
            <?php
            if (!isset($id[0])) {
              echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
            } else {
              echo "<a href='sproduct.php?car-id=$id[0]' style='text-decoration: none; color: white;'>
                <button name='view' class='buy-btn'>View</button>
              </a>";
              echo "<a href='adminshop.php?delete=$id[0]' style='text-decoration: none; color: white;'>
                <button name='delete' id='delete0' class='buy-btn'>Delete</button>
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
                                          echo $option[01];
                                        } else {
                                          echo 'NOT AVAILABLE';
                                        } ?></h5>
            <hr style="height:3px;">
            <div class="text-start px-4">
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($brand[1])) {
                                                                    echo $brand[1];
                                                                  } else {
                                                                    echo 'NO BRAND';
                                                                  }  ?></span>.</span><br>
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[1])) {
                                                                    echo $model[1];
                                                                  } else {
                                                                    echo 'NO MODEL';
                                                                  } ?></span>.</span>
              <br>
              <br>
            </div>
            <?php
            if (!isset($id[1])) {
              echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
            } else {
              echo "<a href='sproduct.php?car-id=$id[1]' style='text-decoration: none; color: white;'>
                <button name='view' class='buy-btn'>View</button>
              </a>";
              echo "<a href='adminshop.php?delete=$id[1]' style='text-decoration: none; color: white;'>
                <button name='delete' id='delete1' class='buy-btn'>Delete</button>
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
                                                                    echo 'NO BRAND';
                                                                  }  ?></span>.</span><br>
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[2])) {
                                                                    echo $model[2];
                                                                  } else {
                                                                    echo 'NO MODEL';
                                                                  } ?></span>.</span>
              <br>
              <br>
            </div>
            <?php
            if (!isset($id[2])) {
              echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
            } else {
              echo "<a href='sproduct.php?car-id=$id[2]' style='text-decoration: none; color: white;'>
                <button name='view' class='buy-btn'>View</button>
              </a>";
              echo "<a href='adminshop.php?delete=$id[2]' style='text-decoration: none; color: white;'>
                <button name='delete' id='delete2' class='buy-btn'>Delete</button>
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
                                                                    echo 'NO BRAND';
                                                                  }  ?></span>.</span><br>
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[3])) {
                                                                    echo $model[3];
                                                                  } else {
                                                                    echo 'NO MODEL';
                                                                  } ?></span>.</span>
              <br>
              <br>
            </div>
            <?php
            if (!isset($id[3])) {
              echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
            } else {
              echo "<a href='sproduct.php?car-id=$id[3]' style='text-decoration: none; color: white;'>
                <button name='view' class='buy-btn'>View</button>
              </a>";
              echo "<a href='adminshop.php?delete=$id[3]' style='text-decoration: none; color: white;'>
                <button name='delete' id='delete3' class='buy-btn'>Delete</button>
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
                                                                    echo 'NO BRAND';
                                                                  }  ?></span>.</span><br>
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[4])) {
                                                                    echo $model[4];
                                                                  } else {
                                                                    echo 'NO MODEL';
                                                                  } ?></span>.</span>
              <br>
              <br>
            </div>
            <?php
            if (!isset($id[4])) {
              echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
            } else {
              echo "<a href='sproduct.php?car-id=$id[4]' style='text-decoration: none; color: white;'>
                <button name='view' class='buy-btn'>View</button>
              </a>";
              echo "<a href='adminshop.php?delete=$id[4]' style='text-decoration: none; color: white;'>
                <button name='delete' id='delete4' class='buy-btn'>Delete</button>
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
                                                                    echo 'NO BRAND';
                                                                  }  ?></span>.</span><br>
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[5])) {
                                                                    echo $model[5];
                                                                  } else {
                                                                    echo 'NO MODEL';
                                                                  } ?></span>.</span>
              <br>
              <br>
            </div>
            <?php
            if (!isset($id[5])) {
              echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
            } else {
              echo "<a href='sproduct.php?car-id=$id[5]' style='text-decoration: none; color: white;'>
                <button name='view' class='buy-btn'>View</button>
              </a>";
              echo "<a href='adminshop.php?delete=$id[5]' style='text-decoration: none; color: white;'>
                <button name='delete' id='delete5' class='buy-btn'>Delete</button>
              </a>";
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="uploads/<?php echo $image[6] ?>" class="card-img-top" alt="..." id="car-card" style="background:url('Images/noimage.jpg'); background-size: cover; background-position: center;">
          <div class="card-body">
            <h5 class="card-title mx-5"><?php if (isset($option[6])) {
                                          echo $option[6];
                                        } else {
                                          echo 'NOT AVAILABLE';
                                        } ?></h5>
            <hr style="height:3px;">
            <div class="text-start px-4">
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($brand[6])) {
                                                                    echo $brand[6];
                                                                  } else {
                                                                    echo 'NO BRAND';
                                                                  } ?></span>.</span><br>
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[6])) {
                                                                    echo $model[6];
                                                                  } else {
                                                                    echo 'NO MODEL';
                                                                  } ?></span>.</span>
              <br>
              <br>
            </div>
            <?php
            if (!isset($id[6])) {
              echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
            } else {
              echo "<a href='sproduct.php?car-id=$id[6]' style='text-decoration: none; color: white;'>
                <button name='view' class='buy-btn'>View</button>
              </a>";
              echo "<a href='adminshop.php?delete=$id[6]' style='text-decoration: none; color: white;'>
                <button name='delete' id='delete6' class='buy-btn'>Delete</button>
              </a>";
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="uploads/<?php echo $image[7] ?>" class="card-img-top" alt="..." id="car-card" style="background:url('Images/noimage.jpg'); background-size: cover; background-position: center;">
          <div class="card-body">
            <h5 class="card-title mx-5"><?php if (isset($option[7])) {
                                          echo $option[7];
                                        } else {
                                          echo 'NOT AVAILABLE';
                                        } ?></h5>
            <hr style="height:3px;">
            <div class="text-start px-4">
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($brand[7])) {
                                                                    echo $brand[7];
                                                                  } else {
                                                                    echo 'NO BRAND';
                                                                  }  ?></span>.</span><br>
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[7])) {
                                                                    echo $model[7];
                                                                  } else {
                                                                    echo 'NO MODEL';
                                                                  } ?></span>.</span>
              <br>
              <br>
            </div>
            <?php
            if (!isset($id[7])) {
              echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
            } else {
              echo "<a href='sproduct.php?car-id=$id[7]' style='text-decoration: none; color: white;'>
                <button name='view' class='buy-btn'>View</button>
              </a>";
              echo "<a href='adminshop.php?delete=$id[7]' style='text-decoration: none; color: white;'>
                <button name='delete' id='delete7' class='buy-btn'>Delete</button>
              </a>";
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="uploads/<?php echo $image[8] ?>" class="card-img-top" alt="..." id="car-card" style="background:url('Images/noimage.jpg'); background-size: cover; background-position: center;">
          <div class="card-body">
            <h5 class="card-title mx-5"><?php if (isset($option[8])) {
                                          echo $option[8];
                                        } else {
                                          echo 'NOT AVAILABLE';
                                        } ?></h5>
            <hr style="height:3px;">
            <div class="text-start px-4">
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($brand[8])) {
                                                                    echo $brand[8];
                                                                  } else {
                                                                    echo 'NO BRAND';
                                                                  }  ?></span>.</span><br>
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[8])) {
                                                                    echo $model[8];
                                                                  } else {
                                                                    echo 'NO MODEL';
                                                                  } ?></span>.</span>
              <br>
              <br>
            </div>
            <?php
            if (!isset($id[8])) {
              echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
            } else {
              echo "<a href='sproduct.php?car-id=$id[8]' style='text-decoration: none; color: white;'>
                <button name='view' class='buy-btn'>View</button>
              </a>";
              echo "<a href='adminshop.php?delete=$id[8]' style='text-decoration: none; color: white;'>
                <button name='delete' id='delete8' class='buy-btn'>Delete</button>
              </a>";
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="uploads/<?php echo $image[9] ?>" class="card-img-top" alt="..." id="car-card" style="background:url('Images/noimage.jpg'); background-size: cover; background-position: center;">
          <div class="card-body">
            <h5 class="card-title mx-5"><?php if (isset($option[9])) {
                                          echo $option[9];
                                        } else {
                                          echo 'NOT AVAILABLE';
                                        } ?></h5>
            <hr style="height:3px;">
            <div class="text-start px-4">
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($brand[9])) {
                                                                    echo $brand[9];
                                                                  } else {
                                                                    echo 'NO BRAND';
                                                                  }  ?></span>.</span><br>
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[9])) {
                                                                    echo $model[9];
                                                                  } else {
                                                                    echo 'NO MODEL';
                                                                  } ?></span>.</span>
              <br>
              <br>
            </div>
            <?php
            if (!isset($id[9])) {
              echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
            } else {
              echo "<a href='sproduct.php?car-id=$id[9]' style='text-decoration: none; color: white;'>
                <button name='view' class='buy-btn'>View</button>
              </a>";
              echo "<a href='adminshop.php?delete=$id[9]' style='text-decoration: none; color: white;'>
                <button name='delete' id='delete9' class='buy-btn'>Delete</button>
              </a>";
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="uploads/<?php echo $image[10] ?>" class="card-img-top" alt="..." id="car-card" style="background:url('Images/noimage.jpg'); background-size: cover; background-position: center;">
          <div class="card-body">
            <h5 class="card-title mx-5"><?php if (isset($option[10])) {
                                          echo $option[10];
                                        } else {
                                          echo 'NOT AVAILABLE';
                                        } ?></h5>
            <hr style="height:3px;">
            <div class="text-start px-4">
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($brand[10])) {
                                                                    echo $brand[10];
                                                                  } else {
                                                                    echo 'NO BRAND';
                                                                  }  ?></span>.</span><br>
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[10])) {
                                                                    echo $model[10];
                                                                  } else {
                                                                    echo 'NO MODEL';
                                                                  } ?></span>.</span>
              <br>
              <br>
            </div>
            <?php
            if (!isset($id[10])) {
              echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
            } else {
              echo "<a href='sproduct.php?car-id=$id[10]' style='text-decoration: none; color: white;'>
                <button name='view' class='buy-btn'>View</button>
              </a>";
              echo "<a href='adminshop.php?delete=$id[10]' style='text-decoration: none; color: white;'>
                <button name='delete' id='delete10' class='buy-btn'>Delete</button>
              </a>";
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="uploads/<?php echo $image[11] ?>" class="card-img-top" alt="" id="car-card" style="background:url('Images/noimage.jpg'); background-size: cover; background-position: center;">
          <div class="card-body">
            <h5 class="card-title mx-5"><?php if (isset($option[11])) {
                                          echo $option[11];
                                        } else {
                                          echo 'NOT AVAILABLE';
                                        } ?></h5>
            <hr style="height:3px;">
            <div class="text-start px-4">
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Brand:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($brand[11])) {
                                                                    echo $brand[11];
                                                                  } else {
                                                                    echo 'NO BRAND';
                                                                  }  ?></span>.</span><br>
              <span style="color: crimson; font-size: 20px; font-weight: 500;">Model:
                <span style="padding-left: 3px; color: #34495E;"><?php if (isset($model[11])) {
                                                                    echo $model[11];
                                                                  } else {
                                                                    echo 'NO MODEL';
                                                                  } ?></span>.</span>
              <br>
              <br>
            </div>
            <?php
            if (!isset($id[11])) {
              echo '<button disabled id="new1" style="transform: scale(0.0); transition: 0s;">View</button>';
            } else {
              echo "<a href='sproduct.php?car-id=$id[11]' style='text-decoration: none; color: white;'>
                <button name='view' class='buy-btn'>View</button>
              </a>";
              echo "<a href='adminshop.php?delete=$id[11]' style='text-decoration: none; color: white;'>
                <button name='delete' id='delete11' class='buy-btn'>Delete</button>
              </a>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>







    <div class="container text-center pt-5">
      <?php
      if ($y < 0) {
        echo '<button disabled id="new1" style="background-color: grey; transform: scale(0.0); transition: 0s;">Back to previous</button>';
      } else {
        echo "<a href='adminshop.php?pageno=$y'><button id='new1'>Back to previous</button></a>";
      }


      if ($x >= $max_page) {
        echo '<button disabled id="new2" style="background-color: grey; transform: scale(0.0); transition: 0s;">Go to next</button>';
      } else {
        echo "<a href='adminshop.php?pageno=$x'><button id='new2'>Go to next</button></a>";
      }
      ?>
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