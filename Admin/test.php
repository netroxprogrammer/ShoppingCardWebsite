<?php include_once"../config/config.php"?>
<?php include_once "../libraries/Database.php";?>

<?php
$database = new Database();
$pics = $database->getData("select *from products");
if($pics){
    while($picsrow = $pics->fetch_assoc()){
        header("Content-Type: image/jpg");
        echo '<img src="data:image/jpg;base64,' . $picsrow['image'] . '" />';

    }
}
?>
dsdsdsd
d
s
