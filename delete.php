<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from `products` where product_code=$id";
    $result=mysqli_query($mycon, $sql);
    if($result){
        header('location:products.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>