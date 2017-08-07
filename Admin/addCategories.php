<?php  session_start(); ?>

<?php
if(!isset($_SESSION['admin_role']) || $_SESSION['admin_role']!='admin'){
    ?>

    <script>window.location="login.php";</script>
<?php } else  {

?>

<?php include_once"../config/config.php"?>
<?php include_once "../libraries/Database.php"; ?>
<?php  include_once"includes/header.php" ?>
<?php
$database = new Database();
$getCategory   = $database->getData("select *from categories");
if(isset($_POST['addCategory'])){
    $addCatName = $_POST['addCat'];
    $str = "insert into categories(name) VALUE ('$addCatName');";
    $result = $database->insertData($str);
    if($result){?>
<script>
    window.localtion= "addCategories.php?catmessage= Category Added";
</script>
   <?php }
    else{?>
        <script>
            window.localtion= "addCategories.php?catmessage= Sorry  Category Not Added";
        </script>
<?php    }
}
//   Add Sub Category
if(isset($_POST['addSubCategory'])){
    $addCatName = $_POST['addCat'];
    $addSubName= $_POST['SubcatName'];
    $str = "insert into subcategories(sub_name,id) values('$addCatName','$addSubName')";
    $result = $database->insertData($str);
    if($result){?>
        <script>
        window.localtion= "addCategories.php?catmessage= Sub Category Added";
        </script>
   <?php }
    else{?>
        <script>
            window.localtion= "addCategories.php?catmessage= Sorry Sub Category Not Added";
        </script>
    <?php    }
}


?>
<div class="col-lg-12">
    <section class="panel">

        <header class="panel-heading">
            Categories Section
        </header>
        <div class="panel-body">
            <!-- Panel Body-->
            <div class="col-xs-7">
                <section class="panel">

                    <header class="panel-heading">
                        Add Categories
                    </header>
                    <
                    <div class="panel-body">
                        <?php
                        if(isset($_GET['catmessage'])){
                            ?>
                            <center><p><span class="label label-info"><?php echo $_GET['catmessage']; ?></span></p></center>
                     <?php   }
                        ?>
                        <div class="form-group">
                        <!-- Panel Body-->
                            <form action="" method="post">

                        <label> Add Category Name</label>
                        <input type="text" name="addCat" class="form-control" />
                        </div>
                        <input type="submit" name="addCategory" value="add" class="btn btn-info"/>
                        </form>
                        </div></section>
                </div>
                <!-- Panel Body-->
                <div class="col-xs-7">
                    <section class="panel">

                        <header class="panel-heading">
                            Add Categories
                        </header>
                        <div class="panel-body">
                            <form method="post">
                                <div class="form-group">
                                <!-- Panel Body-->
                                <label> Add Category Name</label>
                                <input type="text" name="addCat" class="form-control" />
                            </div>
                            <div class="form-group">
                                <!-- Panel Body-->
                                <label> Add  Sub Category Name</label>
                                <select class="form-control input-sm m-bot15" name="SubcatName">
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


                            <input type="submit" name="addSubCategory" value="add" class="btn btn-info"/>
                            </form>
                        </div></section>



</div>
    </section>
</div>
<?php include_once"includes/footer.php"?>
<?php } ?>