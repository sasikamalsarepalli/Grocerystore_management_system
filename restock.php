<?php
include 'connect.php';
$id=$_GET['updateid'];
$query = "SELECT * FROM `products`where product_code=$id";
$run = mysqli_query ($mycon, $query);
$row= mysqli_fetch_assoc($run);
  $x=$row['Available_Quantity'];
if(isset($_POST['update'])){  
    $Available_Quantity=$_POST['Available_Quantity'];
    $sql="update `products` set Available_Quantity=$Available_Quantity+$x where product_code=$id";
    $result=mysqli_query($mycon,$sql);
    if($result){
        echo "Data inserted successfully";
        header('location:index.php');
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
    
    <h1 class="container my-3">restock</h1>
    <div class="container my-5">
    <form method="POST">
  <div class="form-group">
    <label  class="form-label">quantity</label>
    <input type="number" class="form-control" name="Available_Quantity" >
  </div>
  <br>
  <button type="submit" class="btn btn-primary" name="update">save</button>
</form>
</div>
</body>
</html>