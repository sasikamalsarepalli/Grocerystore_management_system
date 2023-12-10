<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


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
<div class="container">
  <button class="btn btn-primary my-5"><a href="add_katha.php" class="text-light">Add katha</a></button>
</div>


<div class="container">
  <table class="table">
  <thead class="thead-dark">
      <tr>
        <th scope="col">customer name</th>
        <th scope="col">ph no</th>
        <th scope="col">date</th>
        <th scope="col">amount</th>
        <th scope="col">operations</th>
        
</tr>
</thead>

<tbody>
<?php
require 'connect.php';

  $query = "SELECT * FROM `kathabook`;";
if($run = mysqli_query ($mycon, $query) ){
while ($row = mysqli_fetch_assoc($run)) {
  $customer_name=$row['customer_name'];
  $ph_no=$row['ph_no'];
  $date=$row['date'];
  $amount=$row['amount'];
  $c_id=$row['c_id'];
  
  echo '
   
      <tr>
        <td>'.$customer_name.'</td>
        <td>'.$ph_no.'</td>
        <td>'.$date.'</td>
        <td>'.$amount.'</td>
        <td>
    <button  class="btn btn-primary"><a href="modify_katha.php?updateid='.$c_id.'" class="text-light style="text-decoration: none;">update</a></button>
    <button class="btn btn-danger"><a href="deletekatha.php?deleteid='.$c_id.'" class="text-light style="text-decoration: none;">Delete</a></button>
</td>
      </tr>'
      ;
 
   }

  }

  ?>

  </tbody>
   </table>

    
</div>





</body>
</html>