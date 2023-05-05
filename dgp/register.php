<?php
require "config.php";
SESSION_START();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Register</h1>
		<form action="register.php" method="post">
			<label for="username">Username:</label>
			<input type="text" name="username" required>
			
			<!-- <label for="dept">Department:</label>
			<select class="form-select" name="dept">
            <option value="1">CSE</option>
            <option value="2">ECE</option>
            <option value="3">Mech</option>
            <option value="4">Others</option>
            </select> -->

			<label for="email">Email:</label>
			<input type="email" name="email" required>

			<label for="password">Password:</label>
			<input type="password" name="password" required>

			<input type="submit" name="submit" value="Register">
		</form>
	</div>
</body>
</html>



<?php

if(isset($_POST['submit'])){ // Fetching variables of the form
$name = $_POST['username'];
// $dept = $_POST['dept'];
$email = $_POST['email'];
$password = $_POST['password'];
if($name !=''&& $email !=''&& $password !=''){ // Insert query
$query = mysqli_query($conn, "insert into users(username, email, password) values ('$name','$email', '$password')");
//echo "<script>alert('You have successfully registered!');</script>";
header("location: login.php"); // Redirecting To Other Page

}
else{
echo "<script>alert('Please fill all fields!');</script>";
}
}
mysqli_close($conn); // Closing Connection with Server
?>



