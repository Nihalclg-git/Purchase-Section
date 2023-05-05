<?php
require "config.php";
SESSION_START();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 50px;
}

td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #343957;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

.approved {
  font-size: 20px;
  color: green;
}

.rejected {
  font-size: 20px;
  color: red;
}

.pending {
  font-size: 20px;
  color: blue;
}

.button-container {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 10px;
}

.approve-button, .decline-button {
  border-radius: 4px;
  border: none;
  padding: 8px;
  margin: 5px;
  cursor: pointer;
  font-weight: bold;
  color: white;
  transition: all 0.3s ease;
}

.approve-button {
  background-color: green;
}

.decline-button {
  background-color: red;
}

.approve-button:hover, .decline-button:hover {
  opacity: 0.8;
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

<script>
function updateStatus(ele,person,decision,timestamp,email,itemname){
		console.log(decision);
		ele.parentElement.parentElement.remove();
		$.ajax({
			 type: "POST",
			 url: 'status_post.php',
			 data: {person : person,timestamp : timestamp, email : email,itemname : itemname,decision : decision},
			 success: function(data){
				alert('You have '+decision+' ed the request');
			 },
			 error: function(xhr, status, error){
			 console.error(xhr);
			 }
			}); 
			//console.log($);
}

</script>
  
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
	<li><a href="#">Global Tender</a></li>
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
		<h4><center>Purchase Status</center></h4>
		<?php
			$hod_emails  = array('csehod@iiitdm.ac.in','ecehod@iiitdm.ac.in','mechhod@iiitdm.ac.in','purchase@iiitdm.ac.in');
			if($_SESSION['login_user'] != 'director@iiitdm.ac.in' && !(in_array($_SESSION['login_user'],$hod_emails)) && $_SESSION['login_user'] != 'purchase@iiitdm.ac.in'){ ?>
				<div>
					<?php
					$sql = 'SELECT * FROM indents INNER JOIN add_items ON add_items.id = indents.id and add_items.email = indents.indenter_name WHERE indents.indenter_name = "'.$_SESSION['login_user'].'" ORDER BY indents.preferred_delivery_date ASC;';
					//echo $sql;
					$result = mysqli_query($conn, $sql);
					
					if (mysqli_num_rows($result) > 0) {
					?>
					<table>
					  <tr>
						<th class="text-center">Delivery Date</th>
						<th class="text-center">Item Name</th>
						<th class="text-center">Description</th>
						<th class="text-center">Total Price</th>
						<th class="text-center">Approved By HOD</th>
						<th class="text-center">Approved By Director</th>
						<th class="text-center">Approved By Purchase</th>

					  </tr>
					<?php
					  // output data of each row
					  while($row = mysqli_fetch_assoc($result)) {  ?>
						<tr>
							<td class="text-center"><?php echo $row["preferred_delivery_date"] ?></td>
							<td class="text-center"><?php echo $row["Name"] ?></td>
							<td class="text-center"><?php echo $row["Description"] ?></td>
							<td class="text-center"><?php echo $row["Total_Price"] ?></td>

							<td class="text-center"><?php 
								if($row['status'] == 1 || $row['status'] == 2 || $row['status']==10 || $row['status']==8 || $row['status'] == 3){
									echo '<i class="fa fa-check" style="color:green"></i>';
								}
								else if($row['status'] == 0){
									echo "Waiting for response";
								}
								else{
									echo '<i class="fa fa-close" style="color:red"></i>';
								}
							?></td>
							<td class="text-center"><?php 
								if($row['status'] == 1){	
									echo 'Waiting for response';
								}								
								else if($row['status'] == 0){
									echo "Waiting for HOD response";
								}
								else if ($row['status'] == 9){
									echo "<i class='fa fa-close' style='color:red'></i> (Rejected from HOD)";
								}
								else if($row['status'] == 8){
									echo '<i class="fa fa-close" style="color:red"></i>';
								}
								else{
									echo '<i class="fa fa-check" style="color:green"></i>';
								}
								?></td>
							<td class='text-center'>
							   <?php 
								if($row['status'] == 9){	
									echo "<i class='fa fa-close' style='color:red'></i> (Rejected from HOD)";
								}								
								else if($row['status'] == 8){
									echo "<i class='fa fa-close' style='color:red'></i> (Rejected from Director)";
								}
								else if ($row['status'] == 7){
									echo "<i class='fa fa-close' style='color:red'></i>";
								}
								else if($row['status'] == 0){
									echo 'Waiting for others';
								}
								else if($row['status'] == 1){
									echo 'Waiting for Director';
								}
								else if($row['status'] == 2){
									echo "Waiting from our side";
								}
								else{
									echo '<i class="fa fa-check" style="color:green"></i>';
								}
								?>
							</td>
						</tr>
						<?php 
					  } ?>
						</table>
					<?php			  
					} else { ?>
						<table>
							  <tr>
								<th class="text-center">Delivery Date</th>
								<th class="text-center">Item Name</th>
								<th class="text-center">Approved By Warden</th>
								<th class="text-center">Approved By Dean</th>
								<th class="text-center">Approved By Director</th>
								<th class="text-center">Approved By Purchase</th>
							  </tr>
							  <div>0 results</div>
						</table>
					<?php
				}
			   }
			else if ($_SESSION['login_user'] == 'director@iiitdm.ac.in') { ?>
				<table>
					<tr>
						<td class="text-center">Item Name</td>
						<td class="text-center">Email</td>
						<td class="text-center">Description</td>
												<td class="text-center">Price</td>

						<td class="text-center">Approve or Deny</td>
					</tr>
					<?php
						$sql_1 = 'SELECT * FROM indents INNER JOIN add_items ON add_items.id = indents.id and add_items.email = indents.indenter_name WHERE add_items.status=1 ORDER BY indents.preferred_delivery_date ASC;';
					    $result = mysqli_query($conn, $sql_1); 
						
						while($row = mysqli_fetch_assoc($result)) { ?>
							<tr>
								<td class="text-center">
								<?php echo $row['Name']?>
								</td>
								<td class="text-center">
								<?php echo $row['indenter_name']?>
								</td >
								<td class="text-center">
								<?php echo $row['Description'] ?>
								</td>
								<td class="text-center">
								<?php echo $row['Total_Price'] ?>
								</td>
								<td class="text-center">
								
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
									
										
								<!--
									<button type="button" class="btn btn-success" onclick='updateStatus(this,"director","approve","<?php echo $row['id']?>","<?php echo $row['indenter_name'] ?>","<?php echo $row['Name'] ?>")'>Approve</button>				
									<button type="button" class="btn btn-danger" onclick='updateStatus(this,"director","reject","<?php echo $row['id']?>","<?php echo $row['indenter_name'] ?>","<?php echo $row['Name'] ?>")'>Deny</button>
								-- >	
								</td>
							</tr>
							<?php
						}
						
					?>
				</table>
			<?php
			}
			else if ($_SESSION['login_user'] == 'purchase@iiitdm.ac.in'){ ?>
				<table>
					<tr>
						<td class="text-center">Item Name</td>
						<td class="text-center">Email</td>
						<td class="text-center">Description</td>
																		<td class="text-center">Price</td>

						<td class="text-center">Approve or Deny</td>
					</tr>
					<?php
						$sql_1 = 'SELECT * FROM indents INNER JOIN add_items ON add_items.id = indents.id and add_items.email = indents.indenter_name WHERE add_items.status=2 ORDER BY indents.preferred_delivery_date ASC;';
					    $result = mysqli_query($conn, $sql_1); 
						
						while($row = mysqli_fetch_assoc($result)) { ?>
							<tr>
								<td class="text-center">
								<?php echo $row['Name']?>
								</td>
								<td class="text-center">
								<?php echo $row['indenter_name']?>
								</td >
								<td class="text-center">
								<?php echo $row['Description'] ?>
								</td>
								<td class="text-center">
								<?php echo $row['Total_Price'] ?>
								</td>
								<td class="text-center">
									<button type="button" class="btn btn-success" onclick='updateStatus(this,"purchase","approve","<?php echo $row['id']?>","<?php echo $row['indenter_name'] ?>","<?php echo $row['Name'] ?>")'>Approve</button>				
									<button type="button" class="btn btn-danger" onclick='updateStatus(this,"purchase","reject","<?php echo $row['id']?>","<?php echo $row['indenter_name'] ?>","<?php echo $row['Name'] ?>")'>Deny</button>
								</td>
							</tr>
						<?php }?>
				</table>
			<?php }
			else{ ?>
				
				<table>
					<tr>
						<td class="text-center">Item Name</td>
						<td class="text-center">Email</td>
						<td class="text-center">Description</td>
																		<td class="text-center">Price</td>
						<td class="text-center">Approve or Deny</td>
					</tr>
					<?php
						$dept_id = '';
						if($_SESSION['login_user'] == 'csehod@iiitdm.ac.in'){
							$dept_id .= 'CSE';
						}
						else if($_SESSION['login_user'] == 'ecehod@iiitdm'){
							$dept_id .= 'ECE';
						}
						else{
							$dept_id .= 'MECH';
						}
						$sql_1 = 'SELECT * FROM indents INNER JOIN add_items ON add_items.id = indents.id and add_items.email = indents.indenter_name WHERE add_items.status=0 and indents.department="'.$dept_id.'" ORDER BY indents.preferred_delivery_date ASC;';
					    $result = mysqli_query($conn, $sql_1); 
						while($row = mysqli_fetch_assoc($result)) { ?>
						
							<tr>
								<td class="text-center">
								<?php echo $row['Name']?>
								</td>
								<td class="text-center">
								<?php echo $row['indenter_name']?>
								</td class="text-center">
								<td>
								<?php echo $row['Description'] ?>
								</td>
								<td class="text-center">
								<?php echo $row['Total_Price'] ?>
								</td>
								<td class="text-center">
									<button type="button" class="btn btn-success" onclick='updateStatus(this,"hod","approve","<?php echo $row['id']?>","<?php echo $row['indenter_name'] ?>","<?php echo $row['Name'] ?>")'>Approve</button>				
									<button type="button" class="btn btn-danger" onclick='updateStatus(this,"hod","reject","<?php echo $row['id']?>","<?php echo $row['indenter_name'] ?>","<?php echo $row['Name'] ?>")'>Deny</button>
								</td>
							</tr>
							
						<?php
						}
					?>				
					
				</table>
				
				<?php
			}
			?>
		</div>
	
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
		
		

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-ZGrTpOaZ/tDzSveRsSNG1MvU15l6UJ7Gce8Wwy1+h7K1iCV5Yw7FbQoVo21D7+zP"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<?php

?>

</body>
</html>