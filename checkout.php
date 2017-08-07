<?php session_start(); ?>
<?php if(!isset($_SESSION['role'])){
    ?>
    <script>
        alert("please first Login");
        window.location="login.php"; </script>
<?php } else { ?>
    <?php include_once "config/config.php"; ?>
    <?php  include_once"libraries/Database.php"; ?>
    <?php  include_once"includes/header.php";?>
    <?php  include_once"includes/upper.php"?>
    <?php  $database =  new Database(); ?>

    <script>
        $(document).ready(function(){
            $.ajax({

                type:"post",
                url: "addToCart.php",
                data:{
                    getTotal:"getTotal"
                },
                success:function(response){
                    document.getElementById("num").innerHTML = response;
                }
            });
        });

    </script>
    <?php

    if(isset($_POST['addCard'])){
        $email = $_POST['email'];
        $cardNo = $_POST['cardNo'];
        $code  = $_POST['code'];
        $year = date("Y");
        $month = date("M");
        $total = $_SESSION["total"];
        $str="insert into buy(email,cardNumber,postalCode,years,months,quantity) values('$email','$cardNo','$code','$year','$month','$total')";
        $data = $database->insertData($str);
        if($data){
        ?>
<script>alert('Buy Product Successfully');</script>
<script>window.location="index.php";</script>

            <?php
    }
    }
    ?>

    <section class="header_text sub">
        <img class="pageBanner" src="includes/themes/images/carousel/banner-1.jpg" alt="" >
        <h4><span>Buy Products</span></h4>
    </section>
    <div class="container">
        <section class="main-content">
            <div class="row">
                <center>
                <div class="span5">
                    <h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
                    <form action="#" method="post">
                        <input type="hidden" name="next" value="/">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="email" placeholder="Enter your Email" name="email"  value="<?php echo $_SESSION['email']; ?>" class="input-xlarge">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Card Number</label>
                                <div class="controls">
                                    <input type="text" placeholder="Enter your Card  No" name="cardNo" class="input-xlarge">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Postal Code</label>
                                <div class="controls">
                                    <input type="text" placeholder="Enter your Postal Code" name="code" class="input-xlarge">
                                </div>
                            </div>
                            <div class="control-group">
                                <input tabindex="3" class="btn btn-inverse large" name="addCard" type="submit" value="Buy">
                                <hr>

                            </div>
                        </fieldset>
                    </form>
                </div>
                </center>
            </div>
        </section>
    </div>
<?php } ?>