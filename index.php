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
  

<img src="./img/d.jpeg" alt="hello" width="100%"> 
  <div class="container ">
    <br>
    <div class="container">
  <h1 class="container">Alerts</h1>
</div>
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


<?php 
require 'connect.php';
$query = "SELECT * FROM `products` where Available_Quantity<min_stock";
if($run = mysqli_query ($mycon, $query) ){
while ($row = mysqli_fetch_assoc($run)) {
   ?><tbody>
      <tr>
        <td><?php echo $row['category'];?></td>
        <td><?php echo $row['product_code'];?></td>
        <td><?php echo $row['product_name'];?></td>
        <td><?php echo $row['Available_Quantity'];?></td>
        <td><button  class="btn btn-primary"><a href="restock.php?updateid=<?php echo $row['product_code'];?>" class="text-light" >restock</a></button>
</td>
      </tr>

 <?php
   }
   ?>
   
  
  <?php
  }
  ?>
  </tbody>
   </table>

    
</div>

</body>
</html>