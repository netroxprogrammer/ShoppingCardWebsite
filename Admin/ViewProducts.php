<?php  session_start(); ?>

<?php
if(!isset($_SESSION['admin_role']) || $_SESSION['admin_role']!='admin'){
    ?>

    <script>window.location="login.php";</script>
<?php } else  {

?>
<?php include_once"../config/config.php"?>
<?php include_once "../libraries/Database.php";?>
<?php  include_once"includes/header.php"?>
<?php
$database = new Database();
$getProducts = $database->getData("select *from products");

?>
<div class="col-lg-12">
    <section class="panel">

        <header class="panel-heading">
            Categories Section
        </header>
        <div class="panel-body">
<table class="table table-hover">

    <tr>

        <th>Product Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>SubCategory</th>
        <th>description</th>
       <th><center>Image</center></th>
        <th>Action</th>
    </tr>
    <?php
    if($getProducts){
    while($getProductsRows = $getProducts->fetch_assoc()){
    ?>
    <tr>

        <td> <?php  echo $getProductsRows['prod_name']; ?></td>
        <td> <?php  echo $getProductsRows['price']; ?></td>
        <?php
        $cat_id= $getProductsRows['cat_id'];
            $result = $database->getData("select *from categories where id='$cat_id'");
        if($result){
            $result = $result->fetch_assoc();
      ?>
        <td> <?php  echo $result['name']; ?></td>
       <?php
        }
        $sub_id = $getProductsRows['subCat_id'];
        $result = $database->getData("select *from subcategories where sub_id='$sub_id'");
        if($result){
            $result = $result->fetch_assoc();
            ?>
            <td> <?php  echo $result['sub_name']; ?></td>
            <?php
        }
        ?>

        <td> <?php  echo $getProductsRows['description']; ?></td>

        <td> <center><img src="<?php echo  "http://". $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/FinalYearProject/admin/".$getProductsRows['image']; ?> "
                  width=15% height=20% /></center></td>
        <td><a class="btn btn-danger" href="deletes.php?prodid=<?php echo $getProductsRows['prod_id'];  ?>"><i class="icon_close_alt2"></i></a>
        </td>
    </tr>
<?php
    }
    }?>
</table>
            </div></section>

<?php include_once"includes/footer.php";?>
    <?php } ?>
