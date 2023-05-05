<?php
require "config.php";
SESSION_START();
?>

<!--<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<form action="login.php" method="post">
			<label for="email">email:</label>
			<input type="text" name="email" required>

			<label for="password">Password:</label>
			<input type="password" name="password" required>

			<input type="submit" name="submit" value="Login">
		</form>
	</div>
</body>
</html>-->

<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style1.css">
  </head>
  <body>
    <header>
      <img src="logo.png" alt="Logo">
    </header>
    <main>
      <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
       <!-- <button type="submit">Login</button> -->
	   <input type="submit" name="submit" value="Login">
      </form>
    </main>
    <footer>
      <p>Don't have an account? <a href="register.php">Sign up here.</a></p>
    </footer>
  </body>
</html>



<?php
if(isset($_POST['submit'])){ // Fetching variables of the form
$email = $_POST['email'];
$password = $_POST['password'];
if($email !=''&& $password !=''){ // SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
$rows = mysqli_num_rows($query);
if($rows == 1){
$_SESSION['login_user'] = $email; // Initializing Session
header("location: i1.php"); // Redirecting To Other Page
}
else{
echo "<script>alert('Email or Password is invalid!');</script>";
}
}
else{
echo "<script>alert('Please fill all fields!');</script>";
}
}
mysqli_close($conn); // Closing Connection with Server
?>

<!-- HTML Form 
<form method="POST" action="">
<input type="email" name="email" placeholder="Email">
<input type="password" name="password" placeholder="Password">
<input type="submit" name="submit" value="Login">
</form> -->
