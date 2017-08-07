<?php  session_start(); ?>

<?php
if(!isset($_SESSION['admin_role']) || $_SESSION['admin_role']!='admin'){
    ?>

    <script>window.location="login.php";</script>
<?php } else  {

    ?>
<?php include_once"../config/config.php"?>
<?php include_once "../libraries/Database.php"; ?>
<?php include_once "../libraries/Upload.php"; ?>
<?php  include_once"includes/header.php" ?>
<?php
$database = new Database();
$upload = new Upload();
$getCategory   = $database->getData("select *from categories");
$getSubCategory =$database->getData("select *from subcategories");
if(isset($_POST['submit'])){
    $Pname = $_POST['pName'];
    $price = $_POST['price'];
    $catName = $_POST['catName'];
    $subCName = $_POST['subCName'];
    $description  = $_POST['disc'];
    $file = $upload->uploadImage();
    $str = "insert  into products(prod_name,price,cat_id,subCat_id,description,image)
            value('$Pname','$price','$catName','$subCName','$description','$file')";
    $checkData = $database->insertData($str);
    if($checkData){
        ?>
       <script>
       window.location="index.php?message=Product Successfully  Enter";
       </script>
    <?
    }
    else{?>
        <script>
            window.location="index.php?message= Sorry Product Not Enter";
        </script>
  <?php  }

}
?>
    <div class="col-lg-12">
        <?php  if(isset($_GET['message'])){
            $getmessage = $_GET['message'];
            ?>
            <center><p><span class="label label-info"><?php echo $getmessage; ?></span></p></center>
       <?php } ?>
<section class="panel">

    <header class="panel-heading">
        Add New Products
    </header>
    <div class="panel-body">
        <div class="form">
            <form class="form-validate form-horizontal "  method="post" action="" enctype="multipart/form-data">
                <div class="form-group ">
                    <label for="fullname" class="control-label col-lg-2">Product name <span class="required">*</span></label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="pName" type="text" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="address" class="control-label col-lg-2">Price <span class="required">*</span></label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="address" name="price" type="text" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="username" class="control-label col-lg-2">Category<span class="required"></span></label>
                    <div class="col-lg-10">
                        <select class="form-control input-sm m-bot15" name="catName">
                            <option></option>
                            <?php
                            if($getCategory){
                                while($getCategoryRow = $getCategory->fetch_assoc()){
                                    ?>
                                    <option value="<?php echo $getCategoryRow['id']; ?>"><?php  echo $getCategoryRow["name"];?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="username" class="control-label col-lg-2">Sub Category<span class="required"></span></label>
                    <div class="col-lg-10">
                        <select class="form-control input-sm m-bot15" name="subCName">
                            <option></option>
                            <?php
                            if($getSubCategory){
                                while($getSubCategoryRow = $getSubCategory->fetch_assoc()){
                                    ?>
                                    <option value="<?php echo $getSubCategoryRow['sub_id']; ?>"><?php  echo $getSubCategoryRow["sub_name"];?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="username" class="control-label col-lg-2">Description<span class="required"></span></label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="" name="disc" type="text" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="username" class="control-label col-lg-2">Select Image<span class="required"></span></label>
                    <div class="col-lg-10">
                        <input type="file" name="file" id="file" >
                    </div>
                </div>

                <div col-xs-5 col-xs-offset-3>
                    <input type="submit" name="submit" value="submit" class="btn  btn-danger"/>
                </div>
            </form>
        </div>
    </div>
</section>
</div>
<?php  include_once"includes/footer.php" ?>
<?php  } ?>
