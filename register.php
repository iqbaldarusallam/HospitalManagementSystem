<?php
$error = "";
$success_message = "";

include "config.php";

if(isset($_POST['register'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($username == '' or $email == '' or $password == '' or $confirm_password == ''){
        $error = "Please fill all fields";
    } elseif ($password != $confirm_password) {
        $error = "Password and Confirm Password do not match";
    } else {
        // Check username already exists
        $check_username_sql = "SELECT * FROM tblogin WHERE username = '$username'";
        $check_username_query = mysqli_query($connection, $check_username_sql);

        if(!$check_username_query){
            die("Query failed: " . mysqli_error($connection));
        }

        $existing_user = mysqli_fetch_array($check_username_query);

        if(!empty($existing_user['username'])){
            $error = "Username <b>$username</b> already exists.";
        }

        // Check email already exists
        $check_email_sql = "SELECT * FROM tblogin WHERE email = '$email'";
        $check_email_query = mysqli_query($connection, $check_email_sql);

        if(!$check_email_query){
            die("Query failed: " . mysqli_error($connection));
        }

        $existing_email = mysqli_fetch_array($check_email_query);

        if(!empty($existing_email['email'])){
            $error = "Email <b>$email</b> already exists.";
        }

        if(empty($error)){
            // insert to database
            $hashed_password = md5($password);
            $insert_user_sql = "INSERT INTO tblogin (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            $insert_user_query = mysqli_query($connection, $insert_user_sql);

            if(!$insert_user_query){
                die("Query failed: " . mysqli_error($connection));
            } else {
                $success_message = "The account has been successfully created";
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>HOSPITAL CIKARANG - Register</title>
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
                <h2 class="heading-section">Register</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="login-wrap p-4 p-md-5">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <img src="images/logoAja.png" width="120px">
                    </div>
                    <h3 class="text-center mb-5">Sign Up</h3>
                    <?php if(isset($success_message) && !empty($success_message)) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $success_message; ?>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($error) && !empty($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <form class="login-form" method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control rounded-left" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control rounded-left" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control rounded-left" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control rounded-left" placeholder="Confirm Password" name="confirm_password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3" name="register">Register</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <p>Already have an account? <a href="login.php">Login</a></p>
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
