<?php
require "config.php";
SESSION_START();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Direct Purchase-Request Items</title>
</head>


<body style="height: 100vh; width: 100vw;">
<div class="row no-gutters h-100">
<div class="col-2 ">
<h2 class="row justify-content-center pt-5 bg-dark text-light h-25 my-0"><img src="logo.png" alt="IIITDM"></h2>
<div class="row justify-content-center bg-dark h-75 px-3">
<div class="list-group">
<a href="./items.php" class="list-group-item list-group-item-action list-group-item-light active" aria-current="true">Request a Purchase</a>
<a href="./dppa.php" class="list-group-item list-group-item-action list-group-item-light">Purchase Status</a>
<a href="./dpi.php" class="list-group-item list-group-item-action  list-group-item-light">Inventory</a>
</div>
</div>
</div>

<div class="col-10 px-0">
<div class="row my-3">
<h2 class="d-flex justify-content-center">Request Items</h2>
</div>

<form class="px-5" action="items.php" method="post" enctype="multipart/form-data">
<div class="form-group row my-2">
<label for="itemName" class="col-2 col-form-label">Item Name:</label>
<div class="col-2">
<input name="itemName" type="text" placeholder="Enter Item Name" required/><br><br>
</div>
</div>

<div class="form-group row my-2">
<label for="quantity" class="col-2 col-form-label">Quantity:</label>
<div class="col-2">
<input name="quantity" type="number" required/><br><br>
</div>
</div>

<div class="form-group row my-2">
<label for="UnitRate" class="col-2 col-form-label">Unit Rate:</label>
<div class="col-2">
<input name="unitRate" type="number" required/><br><br>
</div>
</div>


<div class="form-group row my-2 align-items-center">
<label for="itemdesc" class="col-2 col-form-label"></label>
<div class="col-4">
<textarea class="form-control" id="itemdesc" placeholder="Write a brief about what is actually needed" name="itemdesc"></textarea>
</div>
</div>
<div class="col-3 mx-auto text-center">
<input class="btn btn-dark" type="submit" name="add" value="Add Item">
</div>
</form>
<div class="row px-5">
<table class="table table-bordered text-center my-4 px-5">
<thead class="thead-light">
<tr>
<th scope="col">Name</th>
<th scope="col">Quantity</th>
<th scope="col">Unit_Rate</th>
<th scope="col">Description</th>
</tr>
</thead>
<tbody>
<tr>
<?php 

if(isset($_POST['add'])){
	$var1=mysqli_real_escape_string($conn,$_POST['itemName']);
	$var2=mysqli_real_escape_string($conn,$_POST['quantity']);
	$var3=mysqli_real_escape_string($conn,$_POST['unitRate']);
	$var4=mysqli_real_escape_string($conn,$_POST['itemdesc']);
    $var5=mysqli_real_escape_string($conn,$_SESSION['id']);
	
	$query="insert into items(purchase_id,name,quantity,unit_rate,description) values ('$var5','$var1','$var2','$var3','$var4')";
    $query_run=mysqli_query($conn,$query);
	
	$sql = "SELECT * FROM items where purchase_id='$var5'";
	$result = $conn->query($sql);
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo '<tr><th scope="row">' . $row["name"]. "</th><td>" . $row["quantity"] .  "</th><td>" . $row["unit_rate"] ."</th><td>" . $row["description"] . "</th></tr>";
	}}
	else{
		echo "0 results";
	}
			
}
?>
</tr>
</tbody>
</table>

<div class="col-3 mx-auto text-center">
<input class="btn btn-dark" type="submit" name="sub" value="Submit">
</div>

<?php
if(isset($_POST['sub'])){
	echo "<script>window.location.href='dprp.php';</script>";
    exit;
}
?>
</div>
</div>
</div>
</body>
</html>