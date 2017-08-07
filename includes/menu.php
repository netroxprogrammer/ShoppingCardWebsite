<section class="navbar main-menu">
    <div class="navbar-inner main-menu">
        <?php
        $result = $database->getData("select *from logo  Limit 1");
        if($result){
            $result = $result->fetch_assoc();
       ?>
        <a href="index.php" class="logo pull-left"><img src="<?php  echo "http://". $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/FinalYearProject/admin/".$result['image'];?>" class="site_logo" alt=""
                height="10%" width="35%"></a>
        <?php
        }
        ?>
        <nav id="menu" class="pull-right">
            <ul>

                <?php
                $str  = "select *from  categories";
                $getCate =  $database->getData($str);
                 if($getCate){
                     while($getCateRow = $getCate->fetch_assoc()) {
                         ?>
                         <li><a href=""><?php echo $getCateRow['name'];?></a>
                             <ul>
                                 <?php
                                 $catid = $getCateRow['id'];
                                 $getSubCate =  $database->getData("Select *from subcategories where id='$catid'");
                                 if($getSubCate){
                                     while($getSubCateRow = $getSubCate->fetch_assoc()){

                                 ?>
                                 <li><a href="findProducts.php?id=<?php echo  $getSubCateRow['sub_id']; ?>"><?php echo $getSubCateRow['sub_name']; ?></a></li>
                                    <?php
                                     }
                                 }
                                 ?>
                             </ul>
                         </li>

                         <?php
                     }
                 }
                ?>
            </ul>

        </nav>
    </div>
</section>