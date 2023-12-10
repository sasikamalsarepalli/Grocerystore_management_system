<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $category=$_POST['category'];
    $product_code=$_POST['product_code'];
    $product_name=$_POST['product_name'];
    $available_quantity=$_POST['available_quantity'];
    $cost=$_POST['cost'];
    $min_stock=$_POST['min_stock'];

    $sql="INSERT INTO `products` (`category`, `product_code`, `product_name`, `Available_Quantity`,`cost`,`min_stock`) VALUES ('$category', '$product_code', '$product_name', '$available_quantity','$cost','$min_stock')";
    $result=mysqli_query($mycon,$sql);
    if($result){
        echo "Data inserted successfully";
        header('location:products.php');
    }
    else{
        die(mysql_error($mycon));
    }
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

</head>
<body>
    
    <div class="container my-5">
    <h1>Add product</h1>
    <form method="POST">
  <div class="form-group">
    <label  class="form-label">category</label>
    <input type="text" class="form-control" name="category" >
  </div>
  <div class="form-group">
    <label  class="form-label">product code</label>
    <input type="number" class="form-control"name="product_code" >
  </div>
  <div class="form-group">
    <label class="form-label">product name</label>
    <input type="text" class="form-control"name="product_name">
  </div>

  <div class="form-group">
    <label  class="form-label">Available Quantity</label>
    <input type="number" class="form-control" name="available_quantity">
  </div>
  <div class="form-group">
    <label  class="form-label">cost</label>
    <input type="number" class="form-control" name="cost">
  </div>
  <div class="form-group">
    <label  class="form-label">min stock</label>
    <input type="number" class="form-control" name="min_stock">
  </div>
<br>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
</body>
</html>