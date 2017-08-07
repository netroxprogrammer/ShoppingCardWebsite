<?php session_start(); ?>

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
$result= $database->getData("select *from users where role='user'");

?>
<div class="col-lg-12">
    <section class="panel">

        <header class="panel-heading">
            Categories Section
        </header>
        <div class="panel-body">
<div class="col-xs-5">
<label>Search User By Name</label>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."  class="form-control" title="Type in a name">

</div>
            <br><br><br><br>
<b>All Users</b>
            <br><br>
<table id="myTable" class="table">
    <tr>
        <th >id</th>
        <th>UserName</th>
        <th>Email</th>
        <th>Time</th>
    </tr>
    <?php if($result){
         while($results = $result->fetch_assoc()){
?>
    <tr>
        <td><?php echo $results["id"]; ?></td>
        <td><?php echo $results["userName"]; ?></td>
        <td><?php echo $results["email"]; ?></td>
        <td><?php echo $results["time"]; ?></td>

    </tr>
    <?php }  } ?>
</table>
            <script>
    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</div></section></div>

    <?php include_once"includes/footer.php";?>
<?php  } ?>