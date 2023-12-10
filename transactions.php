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
      <div class="container">
      <img src="img/x.jpg"  alt="hi"  style="width:100px; height:100px; ">
      <h3 class="text-center">BILLS</h3>
      </div>
  
    


    <hr class="container">

<div class="container">
  <table class="table">
  <thead class="thead-dark">
      <tr>
        <th scope="col">date</th>
        <th scope="col">show</th>
        
</tr>
</thead>

<tbody>
<?php
require 'connect.php';
$query = "SELECT * FROM `bill` where cost!=0 group BY i order by i DESC;";
if($run = mysqli_query ($mycon, $query) ){
while ($row = mysqli_fetch_assoc($run)) {
  $date=$row['date'];
  $i=$row['i'];
  echo '
   
      <tr>
        <td>'.$date.'</td>
        <td>
    <button  class="btn btn-primary"><a href="show.php?updateid='.$i.'" class="text-light style="text-decoration: none;">show</a></button>
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
