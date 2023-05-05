<?php
	require "config.php";
	SESSION_START();
	if(isset($_POST['email']) && isset($_POST['timestamp']) && isset($_POST['decision']) &&isset($_POST['person'])){
		
		if($_POST['person'] == 'director'){
			if ($_POST['decision']=='approve'){
					$sql = "UPDATE add_items SET status=2,director_remarks='".$_POST['remarks']."' WHERE Name='".$_POST['itemname']."' and email='".$_POST['email']."' and id ='".$_POST['timestamp']."';";
				if (mysqli_query($conn, $sql)) {
					// Query Accepted
				}
			}
			else if($_POST['decision']=='reject'){
					$sql_1 = "UPDATE add_items SET status=8,director_remarks='".$_POST['remarks']."' WHERE Name='".$_POST['itemname']."' and email='".$_POST['email']."' and id ='".$_POST['timestamp']."';";	
					if (mysqli_query($conn, $sql_1)) {
						// Query Accepted
					}
			}
		}
		else if($_POST['person'] == 'purchase'){
			if ($_POST['decision']=='approve'){
					$sql = "UPDATE add_items SET status=3 WHERE Name='".$_POST['itemname']."' and email='".$_POST['email']."' and id ='".$_POST['timestamp']."';";
				if (mysqli_query($conn, $sql)) {
					// Query Accepted
				}
			}
			else if($_POST['decision']=='reject'){
					$sql_1 = "UPDATE add_items SET status=7 WHERE Name='".$_POST['itemname']."' and email='".$_POST['email']."' and id ='".$_POST['timestamp']."';";	
					if (mysqli_query($conn, $sql_1)) {
						// Query Accepted
					}
			}
		}
		else{
			if ($_POST['decision']=='approve'){
					$sql = "UPDATE add_items SET status=1,hod_remarks='".$_POST['remarks']."' WHERE Name='".$_POST['itemname']."' and email='".$_POST['email']."' and id ='".$_POST['timestamp']."';";
				if (mysqli_query($conn, $sql)) {
					// Query Accepted
				}
			}
			else if($_POST['decision']=='reject'){
					$sql_1 = "UPDATE add_items SET status=9,hod_remarks='".$_POST['remarks']."' WHERE Name='".$_POST['itemname']."' and email='".$_POST['email']."' and id ='".$_POST['timestamp']."';";	
					if (mysqli_query($conn, $sql_1)) {
						// Query Accepted
					}
			}
		}
	}
	mysqli_close($conn);

?>