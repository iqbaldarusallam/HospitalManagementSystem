<?php
session_start();

// checkuser
if (isset($_SESSION['session_username']) && !empty($_SESSION['session_username'])) {
    // redirect
    header("location: auth/home.php");
    exit();
}

$error = "";
$username = "";

include "config.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == '' or $password == ''){
        $error = "Please insert username and password";
    } else {
        $sql1 = "SELECT * FROM tblogin WHERE username = '$username'";
        $q1 = mysqli_query($connection, $sql1);

        if(!$q1){ 
            die("Query failed: " . mysqli_error($connection));
        }

        $r1 = mysqli_fetch_array($q1);

        if(empty($r1['username'])){
            $error = "Username <b>$username</b> not available.";
        } else if($r1['password'] != md5($password)){
            $error = "The password entered is incorrect.";
        }

        if(empty($error)){
            $_SESSION['session_username'] = $username;
            $_SESSION['session_password'] = md5($password);
            header("location: auth/home.php");
            exit();
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>HOSPITAL CIKARANG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" size="16x16" href="images/logoAja.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Login</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="login-wrap p-4 p-md-5">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <img src="images/logoAja.png" width="120px">
                    </div>
                    <h3 class="text-center mb-5">Sign In</h3>
                    <form class="login-form" method="POST">
                        <?php if(isset($error) && !empty($error)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    <?php echo $error; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <input type="text" class="form-control rounded-left" placeholder="Username" name="username">
                        </div>
                        <div class="form-group d-flex">
                            <input type="password" class="form-control rounded-left" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3" name="login">Login</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <p>don't have an account yet? <a href="register.php">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
