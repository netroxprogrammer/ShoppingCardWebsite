<?php session_start(); ?>

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
function AddtoCart(){
var  name = document.getElementById("name").value;
var  price = document.getElementById("price").value;
var  counting = document.getElementById("counting").value;
var  description = document.getElementById("description").value;
var  image = document.getElementById("image").value;
$.ajax({

type:"post",
url: "addToCart.php",
data:{
pName:name,
pPrice: price,
pCounting: counting,
pDesc:description,
pImage:image
},

success:function(response){
document.getElementById("num").innerHTML = response;

}
});
}

</script>
<div id="wrapper" class="container">
    <?php  include_once"includes/menu.php" ?>
    <?php  include_once"includes/sliders.php" ?>

<section class="header_text sub">

    <h4><span>Product Detail</span></h4>
</section>
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <div class="row">
                <?php  if(isset($_GET['id'])){
                  $id = $_GET['id'];
                 $result = $database->getData("select *from products where prod_id='$id'");
                 if($result){
                 $result = $result->fetch_assoc(); ?>

                    <div class="span4">
                        <a href="#" class="thumbnail" data-fancybox-group="group1" title=""><img alt="" src="<?php echo "http://". $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/FinalYearProject/admin/".$result['image'];  ?>"></a>

                    </div>
                    <div class="span5">
                        <address>
                            <strong>Product Name:</strong> <span><?php echo $result['prod_name']; ?></span><br>
                            <strong>Product Description:</strong> <span><?php echo $result['description']; ?></span><br>

                        </address>

                        <h4><strong>Price: $<?php echo $result['price']; ?></strong></h4>
                    </div>
                    <div class="span5">


                            <p>&nbsp;</p>
                            <label>Qty:</label>
                            <input type="hidden" id="price" value="<?php echo $result['price']; ?>">
                            <input type="hidden" id="name" value="<?php echo $result['prod_name']; ?>">
                            <input type="hidden" id="description" value="<?php  echo $result['description']; ?>">
                            <input type="hidden" id="image" value="<?php echo "http://". $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/FinalYearProject/admin/".$result['image']; ?>" >
                            <input type="text" class="span1"  value="1" id="counting">
                            <button class="btn btn-inverse" onclick="AddtoCart()" type="submit">Add to cart</button>

                    </div>
                </div>

                </div>
            </div>

        </div>
        <?php
 }
                } ?>
 ?>
    </section>
</div>
<?php include_once"includes/footer.php" ?>

