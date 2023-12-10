<?php
include 'connect.php';
$id=$_GET['updateid'];
$query = "SELECT * FROM `products`where product_code=$id";
$run = mysqli_query ($mycon, $query);
$row= mysqli_fetch_assoc($run);
$category=$row['category'];
  $product_code=$row['product_code'];
  $product_name=$row['product_name'];
  $Available_Quantity=$row['Available_Quantity'];
  $cost=$row['cost'];
  $min_stock=$row['min_stock'];


if(isset($_POST['update'])){  
    $category=$_POST['category'];
    $product_code=$_POST['product_code'];
    $product_name=$_POST['product_name'];
    $Available_Quantity=$_POST['Available_Quantity'];
    $cost=$_POST['cost'];
    $min_stock=$_POST['min_stock'];

    $sql="update `products` set category='$category',product_code= $product_code,product_name='$product_name',Available_Quantity='$Available_Quantity',cost='$cost',min_stock='$min_stock' where product_code=$id";
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
    
    <h1 class="container my-3">update product</h1>
    <div class="container my-5">
    <form method="POST">
  <div class="form-group">
    <label  class="form-label">category</label>
    <input type="text" class="form-control" name="category" value=<?php echo $category;?>>
  </div>
  <div class="form-group">
    <label  class="form-label">product code</label>
    <input type="number" class="form-control"name="product_code"  value=<?php echo $product_code;?>>
  </div>
  <div class="form-group">
    <label class="form-label">product name</label>
    <input type="text" class="form-control"name="product_name"  value=<?php echo $product_name;?>>
  </div>

  <div class="form-group">
    <label  class="form-label">Available Quantity</label>
    <input type="number" class="form-control" name="Available_Quantity"  value=<?php echo $Available_Quantity;?>>
  </div>
  <div class="form-group">
    <label  class="form-label">cost</label>
    <input type="number" class="form-control" name="cost"  value=<?php echo $cost;?>>
</div>
  <div class="form-group">
    <label  class="form-label">min stock</label>
    <input type="number" class="form-control" name="min_stock"  value=<?php echo $min_stock;?>>
</div>
<br>
  <button type="submit" class="btn btn-primary" name="update">update</button>
</form>
</div>
</body>
</html>