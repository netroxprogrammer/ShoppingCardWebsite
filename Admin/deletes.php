<?php include_once"../config/config.php"?>
<?php include_once "../libraries/Database.php";?>
<?php
$database = new Database();
if(isset($_GET['subid'])){
    $cate_id = $_GET['subid'];
    $result = $database->deleteData("delete from subcategories where  sub_id='$cate_id'");
    if($result){
        header("Location: viewSubCategories.php");
    }
    else{
        header("Location: viewSubCategories.php");
    }
}
if(isset($_GET['catid'])){
    $cate_id = $_GET['catid'];
    $result = $database->deleteData("delete from categories where  id='$cate_id'");
    if($result){
        header("Location: viewCategories.php");
    }
    else{
        header("Location: viewCategories.php");
    }
}
if(isset($_GET['prodid'])){
    $prod_id = $_GET['prodid'];
    $result = $database->deleteData("delete from products where  prod_id='$prod_id'");
    if($result){
        header("Location: ViewProducts.php");
    }
    else{
        header("Location: ViewProducts.php");
    }
}
?>