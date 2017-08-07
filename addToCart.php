<?php
session_start();
if(isset($_POST['pName'])){
    $check =false;
    if(isset($_SESSION['pName'])) {
        $count = count($_SESSION['pName']);

        for ($i = 0; $i < $count; $i++) {
            if ($_SESSION['pName'][$i] == $_POST['pName']) {
                $_SESSION['pPrice'][$i] = $_SESSION['pPrice'][$i] + ($_POST['pPrice'] * $_POST['pCounting']);
                $_SESSION['pCounting'][$i] = $_SESSION['pCounting'][$i]+ $_POST['pCounting'];
                $check = true;
            } else {
                $check = false;

        }
    }
    }
    if($check==false)
    {  $_SESSION['pName'][] = $_POST['pName'];
        $_SESSION['pPrice'][] = $_POST['pPrice'];
        $_SESSION['pCounting'][] = $_POST['pCounting'];
        $_SESSION['pImage'][] = $_POST['pImage'];
        $_SESSION['pDesc'][] = $_POST['pDesc'];}
echo count($_SESSION['pName']);

}
if(isset($_POST['getTotal'])){
    if(isset($_SESSION['pName'])){
    echo count($_SESSION['pName']);}
}
?>