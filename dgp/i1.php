<?php
require "config.php";
SESSION_START();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
  table td {
  padding: 0.25rem 0.5rem;
  font-size: 0.9rem;
  line-height: 1.2;
}

  /* Add alternating row colors */
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
 header {
  background-color: #fff;
  color: #333;
  padding: 10px;
  display: flex;
  justify-content: flex-end;
}

.user-info {
  font-size: 14px;
  margin-right: 20px;
}

.bottom {
	
	margin: 0 auto;
	padding: 20px;
	padding-top: 20px; /* add 50px of padding on top */
}
   .vh-100 {
      height: 100vh;
    }
    .col-height {
      height: 100%;
    }
    .left-col {
      background-color: #343957;
    }
    .right-col {
      background-color: #FFFFFF;
    }
	
	.btn-secondary{
		background-color: #343957;
	}
	.image-container {
    width: 100%;
    height: 25%;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .image-container img {
    max-width: 100%;
    max-height: 100%;
  }
  .sidebar {
  width: 100%;
  float: left;
}

.sidebar ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.sidebar li a {
  display: block;
  padding: 10px;
  background-color: #343957;
  color: #FFF;
  text-decoration: #CCCCCC;
}

.sidebar li a:hover {
  background-color: #555;
  color: #fff;
}
ul ul {
  display: none;
}
ul li:hover > ul {
  display: block;
  float: right;
  margin-left: 15%;
}




.top {
  height: 5%;
  background-color: #fff;
}

.bottom {
  flex: 1;
  background-color: #fff;
}

input[readonly="readonly"] {
    background:none;            
    border:none;
    outline:none;
}

  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  
</head>
<body>
  <div class="container-fluid vh-100">
    <div class="row vh-100">
      <div class="col-md-2 col-height left-col">
        <!-- This column takes up 15% of the width -->
        <div class="image-container">
            <img src="logo.png" alt="IIITD&M">
        </div>
		<div class="sidebar">
  <ul>
    <li><a href="i1.php"><i class="fas fa-shopping-cart"></i>  Request a Purchase</a>
	<ul>
	<li><a href="#">Direct Purchase</a></li>
	<li><a href="i2.php">Local Purchase Committee</a></li>
	<li><a href="#">Purchase by Single origin</a></li>
	<li><a href="i4.php">Global Tender</a></li>
	</ul>
	</li>
    <li><a href="status.php"><i class="fas fa-check-square"></i>  Purchase Status</a></li>
    <li><a href="#"><i class="fas fa-clipboard-list"></i>  Inventory</a></li>
	<li><a href="login.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
  </ul>
</div>

      </div>
      <div class="col-md-10 col-height right-col">
        <!-- This column takes up 85% of the width -->
        <div class="top">
		<header>
  <div class="user-info">
    <span><b>Welcome <?php echo $_SESSION['login_user']; ?></b>
	<i class="fa fa-user-circle" aria-hidden="true"></i>
	</span>
  </div>
</header>

		</div>
		<div class="bottom">
		<h4><center>Direct Purchase Request</center></h4>
		<form action="i1.php" method="POST">
				  <div class="form-group row">
			<label for="department" class="col-sm-2 col-form-label">Department:</label>
			<div class="col-sm-4">
			  <select class="form-control form-control-sm" id="department" name="department">
				<option value="CSE">Computer Science and Engineering</option>
				<option value="ECE">Electronics and Communication Engineering</option>
				<option value="Mech">Mechanical Engineering</option>
				<option value="Others">Others</option>
			  </select>
			</div>
		  </div>

		  <div class="form-group row">
			<label class="col-sm-2 col-form-label">Purpose:</label>
			<div class="col-sm-4">
			  <div class="custom-control custom-radio custom-control-inline">
				<input type="radio" id="classroom" name="purpose" class="custom-control-input" value="classroom">
				<label class="custom-control-label" for="classroom">Classroom</label>
			  </div>
			  <div class="custom-control custom-radio custom-control-inline">
				<input type="radio" id="general" name="purpose" class="custom-control-input" value="general">
				<label class="custom-control-label" for="general">General</label>
			  </div>
			  <div class="custom-control custom-radio custom-control-inline">
				<input type="radio" id="research" name="purpose" class="custom-control-input" value="research">
				<label class="custom-control-label" for="research">Research</label>
			  </div>
			</div>
		  </div>
			<div class="form-group row">
			<label for="comments" class="col-sm-2 col-form-label"></label>
			<div class="col-sm-4">
			  <textarea class="form-control form-control-sm" id="comments" name="comments" placeholder="Brief purpose may be indicated." rows="3"></textarea>
			</div>
		  </div>
		  
			<div class="form-group row">
			<label for="origin" class="col-sm-2 col-form-label">origin:</label>
			<div class="col-sm-4">
			  <select class="form-control form-control-sm" id="origin" name="origin">
				<option value="Indigenous">Indigenous</option>
				<option value="Imported">Imported</option>
				<option value="Both">Both</option>
			  </select>
			</div>
		  </div>
			<div class="form-group row">
			<label for="delivery" class="col-sm-2 col-form-label">Preferred Delivery Date:</label>
			<div class="col-sm-4">
			  <input type="date" class="form-control form-control-sm" id="delivery" name="delivery">
			</div>
		  </div>
		  <table id="itemsTable" class="table">
		  <thead>
			<tr>
			  <th>Name</th>
			  <th>Description</th>
			  <th>Quantity</th>
			  <th>Unit Rate</th>
			  <th>Total Price</th>
			</tr>
		  </thead>
		  <tbody id="itemsTableBody">
		  </tbody>
		</table>

		<!-- Button to open popup form -->
		<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addItemModal">Add Item</button>
		<div class="text-center">
		<button type="submit" class="btn btn-success" name="submit">Submit</button>
		</div>
    
  </form>

<!-- Add Item Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addItemModalLabel">Add New Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="itemName">Item Name</label>
            <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Enter item name">
          </div>
          <div class="form-group">
            <label for="itemDesc">Description</label>
            <textarea class="form-control" id="itemDesc" name="itemDesc" placeholder="Enter item description" rows="3"></textarea>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="itemQty">Quantity</label>
              <input type="number" class="form-control" id="itemQty" name="itemQty" placeholder="Enter quantity">
            </div>
            <div class="form-group col-md-6">
              <label for="itemRate">Unit Rate</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">&#8377;</span>
                </div>
                <input type="number" class="form-control" id="itemRate" name="itemRate" placeholder="Enter unit rate">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addItem()">Add Item</button>
      </div>
    </div>
  </div>
</div>

        </div>
		
		

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-ZGrTpOaZ/tDzSveRsSNG1MvU15l6UJ7Gce8Wwy1+h7K1iCV5Yw7FbQoVo21D7+zP"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script>
  function addItem() {
  // Get form values
  var itemName = document.getElementById("itemName").value;
  var itemDesc = document.getElementById("itemDesc").value;
  var itemQty = document.getElementById("itemQty").value;
  var itemRate = document.getElementById("itemRate").value;
  var totalPrice = itemQty * itemRate;

  // Create new row in table
  var table = document.getElementById("itemsTable");
  var row = table.insertRow();
  var nameCell = row.insertCell(0);
  var descCell = row.insertCell(1);
  var qtyCell = row.insertCell(2);
  var rateCell = row.insertCell(3);
  var totalPriceCell = row.insertCell(4);
  
  
  nameCell.innerHTML = '<input type="text" name="itemNames[]" value="'+itemName+'" readonly="readonly" />';
  descCell.innerHTML = '<input type="text" name="itemDescs[]" value="'+itemDesc+'" readonly="readonly" />';
  qtyCell.innerHTML = '<input type="text" name="itemQtys[]" value="'+itemQty+'" readonly="readonly" />';
  rateCell.innerHTML = "&#8377;" + '<input type="text" name="itemRates[]" value="'+itemRate+'" readonly="readonly" />';
  totalPriceCell.innerHTML = "&#8377;" + '<input type="text" name="totalPrices[]" value="'+totalPrice.toFixed(2)+'" readonly="readonly" />'; 
  
  // Clear form fields
document.getElementById("itemName").value = "";
document.getElementById("itemDesc").value = "";
document.getElementById("itemQty").value = "";
document.getElementById("itemRate").value = "";

}
</script>
<?php
if (isset($_POST['submit'])) {
	$timestamp = date('YmdHis');
	//echo "Ji";


	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	// Escape user inputs to prevent SQL injection
	$indenter_name = mysqli_real_escape_string($conn, $_SESSION['login_user']);
	$department = mysqli_real_escape_string($conn, $_POST['department']);
	$purpose = mysqli_real_escape_string($conn, $_POST['purpose']);
	$comments = mysqli_real_escape_string($conn, $_POST['comments']);
	$origin = mysqli_real_escape_string($conn, $_POST['origin']);
	//$preferred_delivery_date = date("d-m-Y", strtotime($_POST['preferred_delivery_date']));
	$preferred_delivery_date = ($_POST['delivery']);

    //$indent_type = $_POST['indent_type'];
	$indent_type = "Direct Purchase";
	$status = 0;

	// Insert data into database
	$sql = "INSERT INTO indents (id, indenter_name, department, purpose, comments, origin, preferred_delivery_date, indent_type)
	VALUES ('$timestamp', '$indenter_name', '$department', '$purpose', '$comments', '$origin', '$preferred_delivery_date', '$indent_type')";
	
	
	$items_count =  count($_POST['itemNames']);
	
	$sql_1 = "INSERT INTO add_items (id,email,Name, Description, Quantity, Unit_rate, Total_Price,status) VALUES ";
	
	if (mysqli_query($conn, $sql)) {
		for ($x = 0; $x < $items_count; $x++) {
			if($x == ($items_count-1)){
				$sql_1 .= "('$timestamp','$indenter_name', '".$_POST['itemNames'][$x]."', '".$_POST['itemDescs'][$x]."', ".$_POST['itemQtys'][$x].", ".$_POST['itemRates'][$x].", ".$_POST['totalPrices'][$x].",'$status');";
			}
			else{
			    $sql_1 .= "('$timestamp','$indenter_name','".$_POST['itemNames'][$x]."', '".$_POST['itemDescs'][$x]."', ".$_POST['itemQtys'][$x].", ".$_POST['itemRates'][$x].", ".$_POST['totalPrices'][$x].",'$status'),";
			}
		}
		if (mysqli_query($conn, $sql_1)){
			echo "<script>alert('Purchase Request sent successfully');</script>";
		} else{
	       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	} 

	// Close connection
	mysqli_close($conn);
}
?>

</body>
</html>