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
  <button class="btn btn-primary my-5"><a href="add_product.php" class="text-light">Add product</a></button>
</div>

<div class="container">
                        <div class="row">
                            <div class="col-md-7">

                                <form method="POST">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="container">
  <table class="table">
  <thead class="thead-dark">
      <tr>
        <th scope="col">category</th>
        <th scope="col">product code</th>
        <th scope="col">product name</th>
        <th scope="col">Available quantity</th>
        <th scope="col">cost</th>
        <th scope="col">operations</th>
</tr>
</thead>

<tbody>
<?php
require 'connect.php';
if(isset($_POST['search'])){
  $searchKey=$_POST['search'];
$query = "SELECT * FROM `products` where product_name LIKE '%$searchKey%' or product_code LIKE '%$searchKey%' or category LIKE '%$searchKey%' ;";
if($run = mysqli_query ($mycon, $query) ){
while ($row = mysqli_fetch_assoc($run)) {
  $category=$row['category'];
  $product_code=$row['product_code'];
  $product_name=$row['product_name'];
  $Available_Quantity=$row['Available_Quantity'];
  $cost=$row['cost'];
  echo '
   
      <tr>
        <td>'.$category.'</td>
        <td>'.$product_code.'</td>
        <td>'.$product_name.'</td>
        <td>'.$Available_Quantity.'</td>
        <td>'.$cost.'</td>
        <td>
    <button  class="btn btn-primary"><a href="update.php?updateid='.$product_code.'" class="text-light style="text-decoration: none;">update</a></button>
    <button class="btn btn-danger"><a href="delete.php?deleteid='.$product_code.'" class="text-light style="text-decoration: none;">Delete</a></button>
</td>
      </tr>'
      ;
 
   }

  }
}
else{
  $query = "SELECT * FROM `products`;";
if($run = mysqli_query ($mycon, $query) ){
while ($row = mysqli_fetch_assoc($run)) {
  $category=$row['category'];
  $product_code=$row['product_code'];
  $product_name=$row['product_name'];
  $Available_Quantity=$row['Available_Quantity'];
  $cost=$row['cost'];
  echo '
   
      <tr>
        <td>'.$category.'</td>
        <td>'.$product_code.'</td>
        <td>'.$product_name.'</td>
        <td>'.$Available_Quantity.'</td>
        <td>'.$cost.'</td>
        <td>
    <button  class="btn btn-primary"><a href="update.php?updateid='.$product_code.'" class="text-light style="text-decoration: none;">update</a></button>
    <button class="btn btn-danger"><a href="delete.php?deleteid='.$product_code.'" class="text-light style="text-decoration: none;">Delete</a></button>
</td>
      </tr>'
      ;
 
   }

  }

}
  ?>

  </tbody>
   </table>

    
</div>





</body>
</html>