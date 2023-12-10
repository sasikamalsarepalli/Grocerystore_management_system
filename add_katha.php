<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $customer_name=$_POST['customer_name'];
    $ph_no=$_POST['ph_no'];
    $amount=$_POST['amount'];
    $c_id=$_POST['c_id'];
 

    $sql="INSERT INTO `kathabook` (`customer_name`, `ph_no`, `amount`,`c_id`,`date`) VALUES ('$customer_name', '$ph_no', '$amount',$c_id,sysdate())";
    $result=mysqli_query($mycon,$sql);
    if($result){
        echo "Data inserted successfully";
        header('location:kathabook.php');
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
    <h1>Add katha</h1>
    <form method="POST">
  <div class="form-group">
    <label  class="form-label">customer name</label>
    <input type="text" class="form-control" name="customer_name" >
  </div>
  <div class="form-group">
    <label  class="form-label">phone no</label>
    <input type="number" class="form-control"name="ph_no" >
  </div>
  
  <div class="form-group">
    <label  class="form-label">Amount</label>
    <input type="number" class="form-control" name="amount">
  </div>
  <div class="form-group">
    <label  class="form-label">customers id</label>
    <input type="number" class="form-control" name="c_id">
  </div>
  
<br>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
</body>
</html>