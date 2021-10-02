<?php

session_start();

if(!isset($_SESSION['userName'])){

    header('location:logIn.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoutDown Lance Website</title>
    <?php include "css/style.css" ?>
</head>

<body>
    <div class="container">
        <img src="images/logo.png" class="logo">
        <div class="content">
            <p class="para">Welcome! My Website </p>
            <h1>Hello! <span><?php echo  $_SESSION['userName'] ?></span> <br> Good Morning....</h1>

            <div class="lauching">
                <div>
                    <p id="days">00</p>
                    <span>Days</span>
                </div>
                <div>
                    <p id="hours">00</p>
                    <span>Hours</span>
                </div>
                <div>
                    <p id="minutes">00</p>
                    <span>Minutes</span>
                </div>
                <div>
                    <p id="seconds">00</p>
                    <span>Seconds</span>
                </div>
            </div>
       
            <button type="button">Learn More <img src="./images/triangle.png"></button>
        </div>
        <img src="images/rocket.png" class="rocket">
        <a href="logOut.php" type="submit" class="logOut" name="logOut">LogOut <img src="./images/triangle.png"></a>
    </div>


<!-- --------------javasCript--------------- -->

    <script>
        let countDownDate = new Date("Oct 16, 2021 00:00:00").getTime();
        // console.log(countDownDate);
        let x = setInterval(function () {

            let now = new Date().getTime();
            // console.log(now);
            let distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('days').innerHTML = days;
            document.getElementById('hours').innerHTML = hours;
            document.getElementById('minutes').innerHTML = minutes;
            document.getElementById('seconds').innerHTML = seconds;


            if (distance < 0) {
                clearInterval(x);
                document.getElementById('days').innerHTML = "00";
                document.getElementById('hours').innerHTML = "00";
                document.getElementById('minutes').innerHTML = "00";
                document.getElementById('seconds').innerHTML = "00";
            }

        }, 1000);
    </script>
</body>

</html>