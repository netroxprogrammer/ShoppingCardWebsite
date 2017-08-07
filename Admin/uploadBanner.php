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
   if(isset($_GET['logoId'])) {
       $logoId = $_GET['logoId'];


       if (isset($_POST['submit'])) {

           $file = $upload->uploadImage();
           $str = "update logo  set image='$file' WHERE  id=$logoId";

           $checkData = $database->insertData($str);
           if ($checkData) {
               ?>
               <script>
                   window.location = "ViewLogo.php";
               </script>
               <?php
           } else {
               ?>
               <script>
                   window.location = "ViewLogo.php";
               </script>
           <?php }

       }
   }
    ?>
    <div class="col-lg-12">

        <section class="panel">

            <header class="panel-heading">
                Add New Logo
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="form-validate form-horizontal "  method="post" action="" enctype="multipart/form-data">




                        <div class="form-group ">
                            <label for="username" class="control-label col-lg-2">Select Logo Image<span class="required"></span></label>
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
