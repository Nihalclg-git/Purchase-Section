<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Purchase of Goods by Local Purchase Committee</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- Custom styles -->
  <style>
    /* Add your custom styles here */
  </style>
</head>
<body>
  <div class="container">
    <h1 class="text-center">Purchase of Goods by Local Purchase Committee</h1>
    <form>
      <div class="form-group">
        <label for="date_of_submission">Date of Submission:</label>
        <input type="date" class="form-control" id="date_of_submission" name="date_of_submission">
      </div>
      <!-- Add other form fields here -->
      <div class="checkbox">
        <label>
          <input type="checkbox" name="certification" value="certified" id="certification-checkbox"> Certified that we, the members of the Purchase Committee are jointly and individually satisfied that the goods recommended for Purchase are of the requisite specification and quality, priced at the prevailing market rate and the supplier recommended is reliable and competent to supply the goods in question, and it is not debarred by Department of Commerce or Ministry/Department concerned.
        </label>
      </div>
      <div class="form-group">
        <label for="comments">Comments:</label>
        <textarea class="form-control" id="comments" name="comments"></textarea>
      </div>
      <button type="submit" class="btn btn-primary" id="submit-button" disabled>Submit</button>
    </form>
  </div>
  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      // Disable the Submit button by default
      $('#submit-button').prop('disabled', true);

      // Enable the Submit button if the checkbox is checked
      $('#certification-checkbox').change(function() {
        if ($(this).is(':checked')) {
          $('#submit-button').prop('disabled', false);
        } else {
          $('#submit-button').prop('disabled', true);
        }
      });
    });
  </script>
</body>
</html>
