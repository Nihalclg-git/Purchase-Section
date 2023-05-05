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
<title>Direct Purchase-Request a Purchase</title>
</head>
<body style="height: 100vh; width: 100vw;">
<div class="row no-gutters h-100">
<div class="col-2">
<h2 class="row justify-content-center pt-5 bg-dark text-light h-25 my-0"><img src="logo.png" alt="IIITDM"></h2>
<div class="row justify-content-center bg-dark h-75 px-3">
<div class="list-group">
<a href="./dprp.php" class="list-group-item list-group-item-action list-group-item-light active" aria-current="true">Request a Purchase</a>
<a href="./dppa.php" class="list-group-item list-group-item-action list-group-item-light">Purchase Status</a>
<a href="./dpi.php" class="list-group-item list-group-item-action  list-group-item-light">Inventory</a>
</div>
</div>
</div>
<div class="col-10 px-0">
<div class="row my-3 mx-0">
<h2 class="d-flex justify-content-center">Request a Purchase</h2>
</div>

<form class="px-5" action="dprp.php" method="post" enctype="multipart/form-data">

<div class="form-group row my-2">
<label for="id" class="col-2 col-form-label">Purchase ID:</label>
<div class="col-2">
<input name="id" type="text" placeholder="Enter Unique ID" required/><br><br>
</div>
</div>

<div class="form-group row my-2">
<label for="tenderMode" class="col-2 col-form-label">Tender Mode:</label>
<div class="col-2">
<select class="form-select" name="Tendertype">
<option value="1">Direct Purchase</option>
<option value="2">Local Purchase Committee</option>
<option value="3">Single Source Purchase</option>
<option value="4">Government e-Marketplace</option>
<option value="5">Open/Global Tender</option>
</select>
</div>
</div>
<div class="form-group row my-2">
<label for="itemType" class="col-2 col-form-label">Item Type:</label>
<div class="col-2">
<select class="form-select" name="itemType">
<option>Consumable</option>
<option>Non-Consumable</option>
</select>
</div>
</div>
<div class="form-group row my-2 align-items-center">
<label for="itemPurpose" class="col-2 col-form-label">Item Origin:</label>
<div class="col-4">
<div class="form-check form-check-inline col-3">
<input class="form-check-input" type="radio"  id="importedOrigin" value="1" name="itemOrigin">
<label class="form-check-label" for="importedOrigin">Imported</label>
</div>
<div class="form-check form-check-inline col-3">
<input class="form-check-input" type="radio" id="indigeneousOrigin" value="2" name="itemOrigin">
<label class="form-check-label" for="indigeneousOrigin">Indigeneous</label>
</div>
<div class="form-check form-check-inline col-3">
<input class="form-check-input" type="radio" id="bothOrigin" value="3" name="itemOrigin">
<label class="form-check-label" for="bothOrigin">Both</label>
</div>
</div>
</div>
<div class="form-group row my-2 align-items-center">
<label for="deliveryDate" class="col-2 col-form-label">Preferred Delivery Date:</label>
<div class="col-2">
<input type="date" class="form-date" id="deliveryDate" name="deliveryDate">
</div>
</div>
<div class="form-group row my-2 align-items-center">
<label for="itemCondition" class="col-2 col-form-label">Required Condition:</label>
<div class="col-4">
<div class="form-check form-check-inline col-3">
<input class="form-check-input" type="radio" id="freshCondition" value="1" name="itemCondition">
<label class="form-check-label" for="freshCondition">Fresh</label>
</div>
<div class="form-check form-check-inline col-3">
<input class="form-check-input" type="radio" id="additionalCondition" value="2" name="itemCondition">
<label class="form-check-label" for="additionalCondition">Additional</label>
</div>
<div class="form-check form-check-inline col-3">
<input class="form-check-input" type="radio" id="replacementCondition" value="3" name="itemCondition">
<label class="form-check-label" for="replacementCondition">Replacement</label>
</div>
</div>
</div>
<div class="form-group row my-2 align-items-center">
<label for="itemPurpose" class="col-2 col-form-label">Purpose:</label>
<div class="col-4">
<div class="form-check form-check-inline col-3">
<input class="form-check-input" type="radio"  id="classroomPurpose" value="1" name="itemPurpose">
<label class="form-check-label" for="classroomPurpose">Classroom</label>
</div>
<div class="form-check form-check-inline col-3">
<input class="form-check-input" type="radio"  id="researchPurpose" value="2" name="itemPurpose">
<label class="form-check-label" for="researchPurpose">Research</label>
</div>
<div class="form-check form-check-inline col-3">
<input class="form-check-input" type="radio" id="General" value="3" name="itemPurpose">
<label class="form-check-label" for="generalPurpose">General</label>
</div>
</div>
</div>
<div class="form-group row my-2 align-items-center">
<label for="itemPurposeDesc" class="col-2 col-form-label"></label>
<div class="col-4">
<textarea class="form-control" id="itemPurposeDesc" placeholder="Write a brief purpose" name="itemPurposeDesc"></textarea>
</div>
</div>
<div class="row mx-auto">
<div class="col-3 mx-auto text-center">
<input class="btn btn-dark" type="submit" name="sub" value="Submit">
</div>
</div>
</form>
</div>
</div>

<?php
if(isset($_POST['sub'])){
	$var1=mysqli_real_escape_string($conn,$_POST['Tendertype']);
	$var2=mysqli_real_escape_string($conn,$_POST['itemType']);
	$var3=mysqli_real_escape_string($conn,$_POST['itemOrigin']);
	$var4=mysqli_real_escape_string($conn,$_POST['deliveryDate']);
	$var5=mysqli_real_escape_string($conn,$_POST['itemCondition']);
	$var6=mysqli_real_escape_string($conn,$_POST['itemPurpose']);
	$var7=mysqli_real_escape_string($conn,$_POST['itemPurposeDesc']);
    $var8=mysqli_real_escape_string($conn,$_POST['id']);
	
	$query="select * from purchases where id='$name8'";  
	$query_run=mysqli_query($conn,$query);
	
	if(mysqli_num_rows($query_run)>0){
		echo "TRY SOMEOTHER ID:</br>";
		echo '<script type="text/javascript"> alert("try someother matchid..")</script>';
	}
	
	else{
	$query="insert into purchases(id,tender_id,type,origin,delivery_date,cond,purpose,purpose_desc) values ('$var8','$var1','$var2','$var3','$var4','$var5','$var6','$var7')";
    $query_run=mysqli_query($conn,$query);
	
	$_SESSION['Tendertype']=$_POST['Tendertype'];
	$_SESSION['itemType']=$_POST['itemType'];
	$_SESSION['itemOrigin']=$_POST['itemOrigin'];
	$_SESSION['deliveryDate']=$_POST['deliveryDate'];
	$_SESSION['itemCondition']=$_POST['itemCondition'];
	$_SESSION['itemPurpose']=$_POST['itemPurpose'];
	$_SESSION['itemPurposeDesc']=$_POST['itemPurposeDesc'];
	$_SESSION['id']=$_POST['id'];
	echo "<script>window.location.href='items.php';</script>";
    exit;
	}
}

?>

</body>
</html>