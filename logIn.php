<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoutDown Lance Website</title>
    <?php include "css/style.css" ?>
    <?php include "link/links.php" ?>
</head>

<body>


<?php

include "dbcon.php";

if(isset($_POST['logIn'])){

    $email = mysqli_real_escape_string($dbcon, $_POST['email']);
    $password = mysqli_real_escape_string($dbcon, $_POST['password']);

    $emailSearch = "select * from websitetable where email='$email'";

    $emailQuery = mysqli_query($dbcon,$emailSearch);

    $checkCount = mysqli_num_rows($emailQuery);

                if($checkCount){

                $emailPass = mysqli_fetch_assoc($emailQuery);
                
                $dbPass = $emailPass['password'];
                $_SESSION['userName'] = $emailPass['name'];

                $passwordVerify = password_verify($password,$dbPass);

                                if($passwordVerify){
                                    ?>
                                    <script>alert("Login Successful")</script>
                                    <?php
                                    header('location:home.php');
                                }else{
                                    ?>
                                    <script>alert("Password Incorrect")</script>
                                    <?php
                                }

                }else{
                    ?>
                    <script>alert("Invalid Email")</script>
                    <?php
                }


}

?>





    <div class="container">
        <img src="images/logo.png" class="logo">
        <div class="regis">


          <div class="ankor">
          <h1>LogIn Your Account</h1>
            <p>Get start your free account</p>
          <a href="" class="fg"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="" class="fg"><i class="fab fa-google"></i>Google</a>
          </div>

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
               
                <input type="email" name="email" id="" placeholder="Email:">
                <input type="password" name="password" id="" placeholder="Password:">
                
                <button type="submit" name="logIn" class="regb">Login <img src="./images/triangle.png"></button>

            </form>
            <p class="down">Have a account? <a href="reg.php" class="downa">Register</a></p>
        </div>
        <img src="images/rocket.png" class="rocket">
    </div>

</body>

</html>