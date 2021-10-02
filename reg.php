<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration From</title>
    <?php include "css/style.css" ?>
    <?php include "link/links.php" ?>
</head>

<body>



<!-- ---------------------php start----------------------- -->

    <?php
    include "dbcon.php";

    if (isset($_POST['reg'])) {

        $name = mysqli_real_escape_string($dbcon, $_POST['name']);
        $email = mysqli_real_escape_string($dbcon, $_POST['email']);
        $phone = mysqli_real_escape_string($dbcon, $_POST['phone']);
        $password = mysqli_real_escape_string($dbcon, $_POST['password']);
        $cpassword = mysqli_real_escape_string($dbcon, $_POST['cpassword']);
        $rafer = mysqli_real_escape_string($dbcon, $_POST['rafer']);

        // ------------hashing----------------
        $pass = password_hash($password, PASSWORD_BCRYPT);

        // ------------hashing end----------------
        
        $token = bin2hex(random_bytes('10'));
        
        $selectD = "select * from websitetable where email='$email'";
        
        $emailCheck = mysqli_query($dbcon,$selectD);
        
        $emailCount = mysqli_num_rows($emailCheck);

        if ($emailCount>0) {
            ?>
            <script>alert("Email Exist")</script>
            <?php
        }else{

                    if ($password === $cpassword){

                        $insertQuery = "insert into websitetable(name,email,phone,rafer,password,token,status) values('$name','$email','$phone','$rafer','$pass','$token','inactive')";

                        $query = mysqli_query($dbcon, $insertQuery);


                                if ($query) {
                                ?>
                                    <script>
                                        alert("Data Insert Proparly");
                                        location.replace('logIn.php');
                                    </script>
                                <?php
                               
                                }else{
                                ?>
                                    <script>alert("Data Not Insert")</script>
                                <?php
                                }


                    }else {
                        ?>
                        <script>alert("Password Not Matching....")</script>
                    <?php
                    }
        }

    }

    ?>



<!-- ---------------------php end----------------------- -->




    <div class="container">
        <img src="images/logo.png" class="logo">
        <div class="regis">


            <div class="ankor">
                <h1>Create Account</h1>
                <p>Get start your free account</p>
                <a href="" class="fg"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="" class="fg"><i class="fab fa-google"></i>Google</a>
            </div>

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

                <input type="text" name="name" id="" placeholder="Name:">
                <input type="email" name="email" id="" placeholder="Email:">
                <input type="number" name="phone" id="" placeholder="Phone Number:">
                <input type="text" name="rafer" id="" placeholder="Rafer:">
                <input type="password" name="password" id="" placeholder="Password:">
                <input type="password" name="cpassword" id="" placeholder="Conform Password:">


                <button type="submit" name="reg" class="regb">Registration <img src="./images/triangle.png"></button>

            </form>
            <p class="down">Have a account? <a href="logIn.php" class="downa">Login</a></p>
        </div>
        <img src="images/rocket.png" class="rocket">
    </div>

</body>

</html>