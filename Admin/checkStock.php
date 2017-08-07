<?php session_start(); ?>
<?php
if(!isset($_SESSION['admin_role']) || $_SESSION['admin_role']!='admin'){
?>

    <script>window.location="login.php";</script>
    <?php } else  {

?>
<?php include_once"../config/config.php"?>
<?php include_once "../libraries/Database.php"; ?>
<?php include_once "includes/header.php" ?>
<?php
$database = new Database();

?>
<div class="col-lg-12">
    <section class="panel">

        <header class="panel-heading">
            Categories Section
        </header>
        <div class="panel-body">
            <form method="post">
                <div class="col-xs-5">
              <div class="form-group">
              <label> Month</label>
                <select class="form-control" name="month">
                    <option>jan</option>
                    <option>feb</option>
                    <option>march</option>
                    <option>april</option>
                </select>
              </div>

          </div>

            <div class="col-xs-5">
                <div class="form-group">
                    <label> Year</label>
                    <select class="form-control" name="year">
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019/option>
                    </select>
                </div>

            </div>
            <div class="col-xs-10">
                <center><div class="form-group">
                   <input type="submit" value="Find" name="find" class="btn btn-primary btn-large">
                </div>
                </center>
            </div>
<div>
<hr>
<?php
if(isset($_POST['find'])){
$month = $_POST['month'];
$year = $_POST['year'];
$result= $database->getData("select sum(quantity) as sell from buy where  months='$month' AND years='$year'");
if($result){
$result = $result->fetch_assoc();

?>
    <div class="col-xs-10">
    <center><div class="form-group">
            Your Total Selling = <input type="submit" value="<?php echo $result['sell']; ?>" class="btn  btn-large"> Products
        </div>
    </center>
        </div>
    </form>

</div>



        </div></section></div>
<?php }
} ?>
<?php include_once"includes/footer.php";?>
<?php } ?>
