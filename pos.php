
<?php
include 'connect.php';
if(isset($_GET['hello'])){
  $x="SELECT max(i) from `bill`";
  $run = mysqli_query ($mycon, $x);
  $row = mysqli_fetch_assoc($run);
  $i=$row['max(i)'];
  $a="SELECT * from `bill` where i=$i";
  $run = mysqli_query ($mycon, $a);
  while($row= mysqli_fetch_assoc($run)){
    $qty=$row['qty'];
    $id=$row['product_code'];
    $query=$sql="update `products` set Available_Quantity=Available_Quantity-$qty where product_code=$id";
    $r=mysqli_query($mycon,$query);
  }
  $x="SELECT max(i) from `bill`";
  $run = mysqli_query ($mycon, $x);
  $row = mysqli_fetch_assoc($run);
  $i=$row['max(i)'];
  $x="INSERT into `bill`(`i`)VALUES($i+1)";
  $run = mysqli_query ($mycon, $x);
 
  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Grocerystore management system</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              <a class="nav-link" href="products.php">products</a>
              <a class="nav-link" href="pos.php">billing</a>
              <a class="nav-link" href="transactions.php">transactions</a>
              <a class="nav-link" href="kathabook.php">kaathabook</a>
            </div>
          </div>
        </div>
      </nav>
   <br>
<div class="row">
  
  <div class="table-responsive col-md-6">
  <h3 class="text-center">PRODUCTS</h3>
    <hr>
    
      <table class="table">
  <thead class="thead-dark">
      <tr>
        <th scope="col">category</th>
        <th scope="col">product code</th>
        <th scope="col">product name</th>
        <th scope="col">Available quantity</th>
        <th scope="col">operations</th>
</tr>
</thead>

<tbody>
<?php
require 'connect.php';
$query = "SELECT * FROM `products` where Available_Quantity>0;";
if($run = mysqli_query ($mycon, $query) ){
while ($row = mysqli_fetch_assoc($run)) {
  $category=$row['category'];
  $product_code=$row['product_code'];
  $product_name=$row['product_name'];
  $Available_Quantity=$row['Available_Quantity'];
  echo '
   
      <tr>
        <td>'.$category.'</td>
        <td>'.$product_code.'</td>
        <td>'.$product_name.'</td>
        <td>'.$Available_Quantity.'</td>
        <td>
    <button  class="btn btn-primary" ><a href="pos.php?updateid='.$product_code.'" class="text-light style="text-decoration: none;">add</a></button>
</td>
      </tr>'
      ;
 
   }

  }
 
  ?>

  </tbody></table>
  </div>
  <div class="table-responsive col-md-6">
    <h3 class="text-center">BILL</h3>
    <hr>
  <table class="table">
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
$id=$_GET['updateid'];
  $x="SELECT max(i) from `bill`";
  $run = mysqli_query ($mycon, $x);
  $row = mysqli_fetch_assoc($run);
  $i=$row['max(i)'];
  $a="SELECT * from `bill` where i=$i";
  $run = mysqli_query ($mycon, $a);
  $x=0;
  while($row = mysqli_fetch_assoc($run)){
    if($row['product_code']==$id){
      $x=1;
    }
  }

  if($x==0){
    $query = "SELECT * FROM `products`where product_code=$id";
$run = mysqli_query ($mycon, $query);
$row = mysqli_fetch_assoc($run);
  $cost=$row['cost'];
  $product_code=$row['product_code'];
  $product_name=$row['product_name'];
  $Available_Quantity=$row['Available_Quantity'];
  $sql="INSERT INTO `bill`(`product_name`, `cost`, `qty`,`product_code`,`i`,`date`) VALUES ('$product_name',$cost,1,$product_code,$i,sysdate())";
  }
  else{
    $sql="UPDATE `bill` SET `qty`=`qty`+1 where product_code=$id and i=$i";
  }
  $result= mysqli_query ($mycon, $sql);
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
  $x="SELECT max(i) from `bill`";
  $run = mysqli_query ($mycon, $x);
  $row = mysqli_fetch_assoc($run);
  $i=$row['max(i)'];
$a="SELECT sum(qty*cost) from `bill` where i=$i";
  $run = mysqli_query ($mycon, $a);
  $row = mysqli_fetch_assoc($run);
  $y=$row['sum(qty*cost)'];
  echo "<h2>total cost=".$y."<h2>";
}
else{
  echo "<h3>total cost=0<h3>";
}
?>
<form method="POST">
<button type="submit" class="btn btn-primary" name="submit"><a href="pos.php?hello=1" class="text-light" style="text-decoration: none;">save</a></button>
</form>
  </div>
</div>


</body>
</html>