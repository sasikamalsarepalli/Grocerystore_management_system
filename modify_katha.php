<?php
include 'connect.php';
$id=$_GET['updateid'];
$query = "SELECT * FROM `kathabook`where c_id=$id";
$run = mysqli_query ($mycon, $query);
$row= mysqli_fetch_assoc($run);
$customer_name=$row['customer_name'];
  $ph_no=$row['ph_no'];
  $amount=$row['amount'];
  $date=$row['date'];
  $c_id=$row['c_id'];
  


if(isset($_POST['update'])){  
    $customer_name=$_POST['customer_name'];
    $ph_no=$_POST['ph_no'];
    $date=$_POST['date'];
    $c_id=$_POST['c_id'];
    $amount=$_POST['amount'];

    $sql="update `kathabook` set customer_name='$customer_name',ph_no= $ph_no,c_id='$c_id',amount='$amount' where ph_no=$id";
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
    
    <h1 class="container my-3">update katha</h1>
    <div class="container my-5">
    <form method="POST">
  <div class="form-group">
    <label  class="form-label">customer name</label>
    <input type="text" class="form-control" name="customer_name" value=<?php echo $customer_name;?>>
  </div>
  <div class="form-group">
    <label  class="form-label">phone number</label>
    <input type="number" class="form-control"name="ph_no"  value=<?php echo $ph_no;?>>
  </div>

  <div class="form-group">
    <label  class="form-label">customer id</label>
    <input type="number" class="form-control" name="c_id"  value=<?php echo $c_id;?>>
</div>
  <div class="form-group">
    <label  class="form-label">amount</label>
    <input type="number" class="form-control" name="amount"  value=<?php echo $amount;?>>
</div>
<br>
  <button type="submit" class="btn btn-primary" name="update">update</button>
</form>
</div>
</body>
</html>