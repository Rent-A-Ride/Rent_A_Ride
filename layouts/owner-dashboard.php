<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assests/css/admin-dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Rent-A-Ride</title>
</head>
<body>

<section id="side-bar">
    <div class="logo">
        <img src="/assests/img/logo.png" alt="" class="logo-image">
    </div>


    <ul class="side-bar-menu top">
        <li class="active">
            <a href="/owner">
                <img src="/assests/img/dashboard.png" class="pic4">
                <span>Dashboard</span>
            </a>

        </li>
        <li >
            <a href="/ownerProfile">
                <img src="/assests/img/profile.png" class="pic">
                <span>Profile</span>
            </a>

        </li>
        <li >
            <a href="admin-vehicle">
                <img src="/assests/img/d.jpg" class="pic">
                <span>Vehicle</span>
            </a>

        </li>
        <li>
            <a href="admin_customer">

                <img src="/assests/img/customer.png" class="pic">
                <span>Customer</span>

            </a>

        </li>
        <li>
            <a href="viewVehicleowner">
                <img src="/assests/img/e.jpg" class="pic">
                <span>Vehicle Owner</span>
            </a>

        </li>
        <li>
            <a href="viewownerDriver">
                <img src="/assests/img/driver.png" class="pic">
                <span>Driver</span>
            </a>

        </li>
        <li>
            <a href="#">
                <img src="/assests/img/g.jpg" class="pic">
                <span>Payment</span>
            </a>

        </li>

    </ul>
    <ul class="side-bar-menu bottum">


        <li id="bottumadmin">
            <a href="#">
                <img src="/assests/img/settings.jpg" class="pic">
                <span>Settings</span>
            </a>

        </li>
        <li>
            <a href="/logout" class="logout">
                <img src="/assests/img/logout.png" class="pic">
                <span>Logout</span>
            </a>

        </li>

    </ul>
</section>

<section id="content">
    <div class="admin-nav">
        <nav>
            <img src="/assests/img/menu.png" alt="" class="pic1 bx">
            <a href="#" class="nav-link">Mobility without Hassle</a>
            <!-- <form action="">
                    <div class="form-input">
                        <input type="search">
                        <img src="./search.png" alt="" class="pic">
                    </div>
            </form> -->
            <a href="#" class="notification">
                <img src="/assests/img/notification.png" alt="" class="pic3">
                <span class="num">8</span>
            </a>
            
            <a href="#">
                 
                <img src="/assests/img/user_profile/<?php echo ($profile_img[0]['profile_img'])?>" alt="" class="profile">

            </a>
            <p class="name"><?php echo($profile_img[0]['first_Name']." ".$profile_img[0]['last_Name']) ?></p>


        </nav>
    </div>


    <div class="admin_dashboardrest">
        {{content}}
    </div>
</section>

<script src="/assests/javascript/admin-dashboard.js"></script>
</body>
</html>
