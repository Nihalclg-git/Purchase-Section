<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proprietary Article Certificate</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script>
		function enableSubmit() {
			var onlySupplierChecked = document.getElementById("only_supplier").checked;
			var noOtherMakeModelChecked = document.getElementById("no_other_make_model").checked;
			if (onlySupplierChecked && noOtherMakeModelChecked) {
				document.getElementById("submitBtn").disabled = false;
			} else {
				document.getElementById("submitBtn").disabled = true;
			}
		}
	</script>
</head>
<body>
	<div class="container">
		<h1>Proprietary Article Certificate</h1>
		<form>
			<div class="form-group">
				<label>
					<input type="checkbox" name="only_supplier" id="only_supplier" value="yes" onclick="enableSubmit()">
					Only Supplier: The indented goods / software are manufactured / developed by
				</label>
				<input type="text" name="name" placeholder="Enter name" class="form-control">
			</div>
			<div class="form-group">
				<label>
					<input type="checkbox" name="no_other_make_model" id="no_other_make_model" value="yes" onclick="enableSubmit()">
					No other make or model / software is acceptable
				</label>
			</div>
			<div class="form-group">
				<label>Comments:</label>
				<textarea name="comments" rows="5" cols="40" class="form-control"></textarea>
			</div>
			<button type="submit" id="submitBtn" class="btn btn-primary" disabled>Submit</button>
		</form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
