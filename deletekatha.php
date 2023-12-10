<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from `kathabook` where c_id=$id";
    $result=mysqli_query($mycon, $sql);
    if($result){
        header('location:kathabook.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>