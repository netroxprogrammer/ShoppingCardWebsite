<?php session_start(); ?>
<?php if(isset($_SESSION['role'])){
    ?>
<script>window.location="index.php"; </script>
<?php } else { ?>
<?php include_once "config/config.php"; ?>
<?php  include_once"libraries/Database.php"; ?>
<?php  include_once"includes/header.php";?>
<?php  include_once"includes/upper.php"?>
<?php  $database =  new Database(); ?>
<?php
if(isset($_POST['register'])){
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $str = "insert into users(userName,email,password,role) VALUE ('$userName','$email','$pass','user')";
    if($database->insertData($str)){
        ?>
        <script> alert("Your  SuccessFully  Register");</script>
<?php    }

}
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $str = "select *from users where email='$email' AND password='$pass'";
    $data = $database->getData($str);
    if ($data) {
        $data = $data->fetch_assoc();
        $_SESSION['role'] = $data['role'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['userName'] = $data['userName'];
        if ($data['role'] == "user") {
            ?>

            <script>
                alert("Welcome  : <?php echo $data['userName'];  ?>");
                window.location = "index.php"</script>
        <?php }
        else{
            ?>
        <script>alert('Sorry ');</script>
            <?php
        }
    }
}
?>

<section class="header_text sub">
<img class="pageBanner" src="includes/themes/images/carousel/banner-1.jpg" alt="" >
<h4><span>Login or Regsiter</span></h4>
</section>
<div class="container">
<section class="main-content">
    <div class="row">
        <div class="span5">
            <h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
            <form action="#" method="post">
                <input type="hidden" name="next" value="/">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input type="email" placeholder="Enter your Email" name="email" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" placeholder="Enter your password" name="pass" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <input tabindex="3" class="btn btn-inverse large" name="login" type="submit" value="Sign into your account">
                        <hr>
                        <p class="reset">Recover your <a tabindex="4" href="#" title="Recover your username or password">username or password</a></p>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="span7">
            <h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
            <form action="#" method="post" class="form-stacked">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input type="text" placeholder="Enter your username" name="userName" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email address:</label>
                        <div class="controls">
                            <input type="email" placeholder="Enter your email" name="email" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password:</label>
                        <div class="controls">
                            <input type="password" placeholder="Enter your password" name="pass" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">

                    </div>
                    <hr>
                    <div class="actions"><input tabindex="9" name="register" class="btn btn-inverse large" type="submit" value="Create your account"></div>
                </fieldset>
            </form>
        </div>
    </div>
</section>
</div>
<?php } ?>