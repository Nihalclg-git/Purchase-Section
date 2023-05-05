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
<title>Direct Purchase-Inventory</title>
</head>

<body style="height: 100vh; width: 100vw;">
<div class="row no-gutters h-100">
<div class="col-2 ">
<h2 class="row justify-content-center pt-5 bg-dark text-light h-25 my-0"><img src="logo.png" alt="IIITDM"></h2>
<div class="row justify-content-center bg-dark h-75 px-3">
<div class="list-group">
<a href="./dprp.php" class="list-group-item list-group-item-action list-group-item-light" aria-current="true">Request a Purchase</a>
<a href="./dppa.php" class="list-group-item list-group-item-action list-group-item-light">Purchase Status</a>
<a href="./dpi.php" class="list-group-item list-group-item-action  list-group-item-light active">Inventory</a>
</div>
</div>
</div>
<div class="col-10 px-0">
<div class="row my-3">
<h2 class="d-flex justify-content-center">Inventory</h2>
</div>
<div class="row px-5">
<table class="table table-bordered text-center my-4 px-5">
<thead class="thead-light">
<tr>
<th scope="col">S.No</th>
<th scope="col">Name</th>
<th scope="col">Description</th>
<th scope="col">Quantity</th>
<th scope="col">Date</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>
<tr>
<?php 
$sql = "SELECT * FROM purchases inner join items on purchases.id=items.purchase_id where purchases.statuss is NULL";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	  echo '<tr><th scope="row">' . $row["id"]. "</th><td>" . $row["name"]. "</th><td>" . $row["description"] ."</th><td>" . $row["quantity"] .  "</th><td>" . $row["delivery_date"] ."</th>";
	  echo '<td><i class="fas fa-undo" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Return</i></td></tr>';
	}
  } else {
	echo "0 results";
  }
?>
</tbody>
</table>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="staticBackdropLabel">Return Item</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="container-fluid">
<?php //echo "<strong>Are you sure you want to return this item?</strong><br/>"; ?>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Yes, return this item</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>