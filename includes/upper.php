<div id="top-bar" class="container">
    <div class="row">
        <div class="span4">
            <form method="get" class="">

            </form>
        </div>
        <div class="span8">

            <div class="account pull-right">
                <ul class="user-menu">

                    <li>  <form action="searchProduct.php">
                    <input type="text" class="form-control" name="search" placeholder="Enter Category Name">
                    </form></li>
                        <li><a href="ViewAddToCart.php">Cart&nbsp;<i class="icon-shopping-cart blue"></i> &nbsp; <i id="num">0</i></a></li>
                    <li><a href="checkout.php">Checkout</a></li>
                   <?php if(isset($_SESSION['role']) && $_SESSION['role']=="user"){
                       ?>
                       <li><a href="logout.php">Logout</a></li>
                       <li> <img src="includes/themes/images/profile.png" class="img-circle" alt="Cinque Terre" width="50" height="50">&nbsp; <?php echo  $_SESSION['userName']; ?></li>
                  <?php  } else{
                       ?>
                       <li><a href="login.php">Login</a></li>
                  <?php  } ?>

                </ul>
            </div>
        </div>
    </div>
</div>