<?php

//session_start();
//
//$host="localhost";
//$user="root";
//$password="";
//$db="demo";
//
//$conn=mysqli_connect($host,$user,$password,$db);
//
//
//if (isset($_POST['mail']) && isset($_POST['password']) ) {
//    $mail=$_POST['mail'];
//    $pass=$_POST['password'];
//
//
//    // echo $mail;
//
//    $query1="select * from users where email='$mail'";
//
//    $result1=mysqli_query($conn,$query1);
//
//    echo "1";
//
//
//    $num=mysqli_num_rows($result1);
//    if($num==1){
//
//        echo "Email Already Taken";
//
//    }else {
//
//
//            $insert="insert into users (email,password) values('{$mail}','{$pass}')";
//
//            mysqli_query($conn,$insert);
//            echo "Registration Successful";
//
//
//
//
//    }
//}




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-A-Ride Sign Up Page</title>
<!--    <link rel="stylesheet" href="http://localhost/GroupProject/view/css/register.css">-->
</head>
<body>
    <div class="navbar">
        Rent-A-Ride
    </div>
    <section>
        <div class="img-bx">
            <img src="/assests/img/a.jpg" alt="">
        </div>

        <div class="content-bx">
            <div class="form-bx">
                <h1>Registration</h1>
                <form method="post" action="">
                    <div class="input-bx" id="bx-1">
                        <span>First Name:</span><br>
                        <input type="text" name="f_name">
                    </div>
                    <div class="input-bx" id="bx-2">
                        <span>Last Name:</span><br>
                        <input type="text" name="l_name">
                    </div>
                    <div class="input-bx" id="bx-3">
                        <span>Email:</span><br>
                        <input type="email" name="email">
                    </div>
                    <div class="input-bx" id="bx-3">
                        <span>Password:</span><br>
                        <input type="password" name="password">
                    </div>
                    <div class="input-bx" id="bx-4">
                        <span>Phone No:</span><br>
                        <input type="text" name="contact_no">
                    </div>
                    <div id="accept">
                        <input type="checkbox" name="policy">
                        <div></div>
                        <p> I accept the Term of Service as well as Privacy Policy</p>
                    </div>
                    <div class="input-bx" >

                        <input type="submit" value="Next Page" name="next1">
                    </div>
                    <div class="signup">
                        <h5>Already have an account <a href="/login">Login</a></h5>
                    </div>
                </form>
            </div>
        </div>

    </section>

</body>
</html>