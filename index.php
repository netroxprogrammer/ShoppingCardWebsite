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


</script>
<!--
 Start  Main Body
 -->
 <div id="wrapper" class="container">
     <?php  include_once"includes/menu.php" ?>
     <?php  include_once"includes/sliders.php" ?>
     <form action="searchProductByPrice.php">

             <div class="span8">
                From:  <input type="number"  name="from" placeholder="from">To:
                 <input type="number"  name="to" placeholder="to">
                 <input type="submit" class="btn btn-warning" name="searchByNumber">
             </div>

  </form>
     <h4 class="title">
         <span class="pull-left"><span class="text"><span class="line">All <strong>Categories</strong></span></span></span>

     </h4>
     <div class="row feature_box">
         <!-- 3 Panals  -->
         <div class="span4">
             <div class="service">
                 <div class="responsive">
                     <a href=""><img src="includes/themes/images/feature_img_2.png" alt="" />
                     <h4>Surigal <small>Instrument</small></h4>

                     </a>
                 </div>
             </div>
         </div>
         <div class="span4">
             <div class="service">
                <a href=""><div class="customize">
                     <img src="includes/themes/images/feature_img_2.png" alt="" />
                     <h4>Dental  <small>Instrument</small></h4>
                     </a>
                 </div>
             </div>
         </div>
         <div class="span4">
             <div class="service">
                 <div class="support">
                    <a href=""> <img src="includes/themes/images/feature_img_3.png" alt="" />
                     <h4>Manicure <small>Instrument</small></h4>
                    </a>
                 </div>
             </div>
         </div>
     </div>

<!-- End Three Panels -->
<!-- Product Body  -->
<section class="main-content">
    <h4 class="title">
        <span class="pull-left"><span class="text"><span class="line">All <strong>Products</strong></span></span></span>

    </h4>
<div class="row">
    <div class="span12">
        <ul class="thumbnails listing-products">
            <?php
           $products = $database->getData("select *from products");
            if($products){
                while($productsRow = $products->fetch_assoc()){ ?>
            <li class="span3">
                <div class="product-box">
                    <span class="sale_tag"></span>
                    <a href="productDetails.php?id=<?php echo $productsRow['prod_id']; ?>"><img alt="" src="<?php echo "http://". $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/FinalYearProject/admin/".$productsRow['image'];  ?>"
                                                                                                height="30%" width="20%"   ></a><br/>
                    <a href="productDetails.php?id=<?php echo $productsRow['prod_id']; ?>" class="title"><?php echo $productsRow['prod_name']; ?></a><br/>
                    <?php
                    $sub_id= $productsRow['subCat_id'];
                    $result = $database->getData("select *from subcategories where sub_id='$sub_id'");
                    if($result){
                        $result = $result->fetch_assoc();
                        ?>
                        <a href="#" class="category"><?php echo  $result['sub_name']; ?></a>

                        <?php
                    }

                    ?>

                    <p class="price">$<?php echo $productsRow['price']; ?></p>
                </div>
            </li>
            <?php
                }
            }
            ?>


            </ul>
<?php
        $result= $database->getData("select count(prod_name) as total from products");
        if($result){
            $result = $result->fetch_assoc();
            $count  = intval($result["total"]/3);

   ?>     <div class="col-xs-offset-4"><ul class="pagination">
                <li><a  href="" class="btn btn-xs btn-primary">
                        <i class="glyphicon glyphicon-forward"></i></a></li>

                <?php  for($i=1; $i<=$count; $i++){
?>
                    <li><a  href="Pagination.php?page=<?php echo $i; ?>" class="btn btn-xs btn-primary"><?php echo $i; ?></a></li>
                <?php                }
                }

                ?>
                <li><a  href="" class="btn btn-xs btn-primary"> <i class="glyphicon glyphicon-backward"></i></a></li>



            </ul></div></div>
    </div>
<!--  End Body -->
     <?php include_once"includes/footer.php" ?>
