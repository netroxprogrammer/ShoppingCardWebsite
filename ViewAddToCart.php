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
<?php
  if(isset($_GET['id'])){
      $id = $_GET['id'];
      unset($_SESSION['pName'][$id]);
      unset($_SESSION['pPrice'][$id]);
      unset($_SESSION['pImage'][$id]);
      unset($_SESSION['pDesc'][$id]);

  }
?>
<div id="wrapper" class="container">
    <?php  include_once"includes/menu.php" ?>
    <?php  include_once"includes/sliders.php" ?>
    <div class="col-xs-10">
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th><center>Image</center></th>
                <th>Action</th>
            </tr>
            <?php
            if(isset($_SESSION['pName'])){
            $total = 0;
                $count = count($_SESSION['pName']);
                for($i=0; $i<$count;$i++){
                    ?>
            <tr>
                <td><?php echo $_SESSION['pName'][$i]; ?></td>
                <td><?php  echo $_SESSION['pPrice'][$i]; ?></td>
                <?php $total = $total+$_SESSION['pCounting'][$i];
                ?>
                <td><center><img src="<?php  echo $_SESSION['pImage'][$i]; ?>" height="10%" width="10%"></center></td>
                <td><a href="ViewAddToCart.php?id=<?php echo $i; ?>" class="btn btn-xs btn-danger">delete</a> </td>
            </tr>
<?php
            }
                echo $total;
                $_SESSION['total'] = $total;
            }
            ?>
        </table>
    </div>
    </div>
<?php include_once"includes/footer.php" ?>
