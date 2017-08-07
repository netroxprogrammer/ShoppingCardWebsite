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
ob_start();
$database = new Database();
$getCategory = $database->getData("select *from categories");

?>
    <div class="col-lg-12">
        <section class="panel">

            <header class="panel-heading">
                Categories Section
            </header>
            <div class="panel-body">
                <table class="table table-hover">

                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    if($getCategory){
                        while($getCategoryRows = $getCategory->fetch_assoc()){
                            ?>
                            <tr>

                                <td> <?php  echo $getCategoryRows['id']; ?></td>
                                <td> <?php  echo $getCategoryRows['name']; ?></td>
                                <td><a class="btn btn-danger" href="deletes.php?catid=<?php echo $getCategoryRows['id'];  ?>"><i class="icon_close_alt2"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }?>
                </table>
            </div></section>

<?php include_once"includes/footer.php";?>
<?php  } ?>
