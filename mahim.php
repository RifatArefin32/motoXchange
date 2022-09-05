<?php

$conn = mysqli_connect('localhost', 'root', '', 'lab_test');

if (isset($_POST['submit'])) {
    $s_id = $_POST['s_id'];
    $name = $_POST['name'];
    
    $dept = $_POST['dept'];
    $sal_id = $_POST['sal_id'];
    $amount = $_POST['facebook'];
    $whatsapp = $_POST['whatsapp'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    $select1 = " SELECT * FROM user_form WHERE email = '$email'; ";
    $result1 = mysqli_query($conn, $select1);

    $select2 = " SELECT * FROM user_form WHERE username = '$username'; ";
    $result2 = mysqli_query($conn, $select2);


    if (mysqli_num_rows($result1) > 0) {

        $error1[] = 'This email is already used';
    } elseif (mysqli_num_rows($result2) > 0) {
        $error2[] = 'This username exists. Try another';
    } else {

        if ($pass != $cpass) {
            $error3[] = 'Password does not matched!';
        } else {
            $insert = " INSERT INTO user_form(name, email, phone, facebook, whatsapp, address, username, PASSWORD) 
         VALUES('$name','$email', '$phone', '$facebook', '$whatsapp', '$address', '$username', '$pass'); ";
            mysqli_query($conn, $insert);
            header("location:login.php");
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 70%;
            
        }
        table, td, th{
            border:2px solid black;
        }
        td, th{
            text-align: center;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <!-- create table -->
    <table>
        <tr>
            <th colspan="2">Telephone</th>
            <th>Grade</th>
            <th>Student</th>
        </tr>
        <tr>
            <td>1234</td>
            <td>2587</td>
            <td>A+</td>
            <td>Alex</td>
        </tr>
        <tr>
            <td rowspan="2">MSE</td>
            <td rowspan="2" style="background-color: blue;">ME</td>
            <td>Edge</td>
            <td rowspan="3">EEE</td>
        </tr>
        <tr>
            <td>Flag</td>
        </tr>
        <tr>
            <td>A</td>
            <td>C</td>
            <td>G</td>
        </tr>
        <tr>
            <td>B</td>
            <td colspan="2" style="background-color: green;">CSE</td>
            <td>KUET</td>
        </tr>
    </table>

    <!-- Creating Form -->
    <div style="text-align: center; margin-top: 1in;">
        <form action="" method="post">
            <label>Student Id: </label>
            <input type="text" name="s_id"><br><br>
    
            <label>Name: </label>
            <input type="text" name="name"><br><br>
            
            <label>Department: </label>
            <input type="text" name="dept"><br><br>
    
            <label>Salary Id: </label>
            <input type="text" name="sal_id"><br><br>
    
            <label>Amount: </label>
            <input type="text" name="amount"><br><br>
    
            <input type="submit" value="Submit">
        </form>
    </div>

    
    
</body>
</html>