<?php  session_start(); ?>
<?php
if(isset($_SESSION['admin_role'])){
?>

<script>window.location="index.php";</script>
<?php } else {

?>
<?php include_once"../config/config.php"?>
<?php include_once "../libraries/Database.php";?>
<?php
$database = new Database();
if(isset($_POST['login']) &&  isset($_POST['email']) && isset($_POST['pass'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $result = $database->getData("select *from users where email='$email' AND password='$pass'");
    if ($result) {
    $result = $result->fetch_assoc();
        $_SESSION["admin_role"] = $result['role'];
        $_SESSION["admin_Email"] = $email;
       if( $result['role']=="admin"){
        header("location: index.php");
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="includes/img/favicon.png">

    <title>Admin Panel Login</title>

    <!-- Bootstrap CSS -->
    <link href="includes/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="includes/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="includes/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="includes/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="includes/css/style.css" rel="stylesheet">
    <link href="includes/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="includes/js/html5shiv.js"></script>
    <script src="includes/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-img3-body">

<div class="container">

    <form class="login-form" action="" method="post">
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" class="form-control" name="email" placeholder="Email" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>

            <input class="btn btn-primary btn-lg btn-block" type="submit" name="login" value="Login">

        </div>
    </form>

</div>


</body>
</html>
<?php } ?>