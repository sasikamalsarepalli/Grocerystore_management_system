<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <title>Document</title>
</head>
<body>
  <br>
  <br>
  
<div class="container">
<?php
  require 'connect.php';
if(isset($_GET['updateid'])){
$i=$_GET['updateid'];
$query = "SELECT * FROM `bill` where i=$i and cost!=0";
  $result= mysqli_query ($mycon, $query);
  $row = mysqli_fetch_assoc($result);
  $date=$row['date'];
   echo "<h5>billing date and time:       ". $date ."</h5>";
}
   ?>
   <br>
   <br>
  <table class="table"  class="table text-center">
  <thead class="thead-dark">
      <tr>
        <th scope="col">product name</th>
        <th scope="col">cost</th>
        <th scope="col">qty</th>
</tr>
</thead>

<tbody>
<?php

require 'connect.php';
if(isset($_GET['updateid'])){
$i=$_GET['updateid'];
$query = "SELECT * FROM `bill` where i=$i and cost!=0";
  $result= mysqli_query ($mycon, $query);
  while($row = mysqli_fetch_assoc($result)){
    $cost=$row['cost'];
    $product_name=$row['product_name'];
    $qty=$row['qty'];



  echo '
   
      <tr>
        <td>'.$product_name.'</td>
        <td>'.$cost.'</td>
        <td>'.$qty.'</td>
      </tr>'
      ;
 
   }
  }
 
  ?>

  </tbody>
</table>
<?php  
require 'connect.php';
if(isset($_GET['updateid'])){
  $i=$_GET['updateid'];
$a="SELECT sum(qty*cost) from `bill` where i=$i";
  $run = mysqli_query ($mycon, $a);
  $row = mysqli_fetch_assoc($run);
  $y=$row['sum(qty*cost)'];
  echo "<br><h2>total cost=".$y."<h2>";
}
else{
  echo "<br><h2>total cost=0<h2>";
}
?>