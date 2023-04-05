<?php

if(isset($_POST['name']) && isset($_POST['F_email'])){
	$name = $_POST['name'];
	$F_email = $_POST['F_email'];
	$F_Id = $_POST['F_Id'];
}
	// Database connection
	$conn = new mysqli('localhost','root','','registration');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into facultydance(name , F_email, F_Id) values(?, ?, ?)");
		$stmt->bind_param("sss", $name, $F_email, $F_Id);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="login.css">
    <title>Faculty Dance</title>
</head>
<body>
<form action="" method="post">

      <div class="container">
        <div class="card">
          <div class="inner-box" id="card">
            <div class="card-front">
      <h2>FACULTY DANCE</h2>
      <p>Please fill in this form to register for faculty dance.</p>

      <div class="signup-classic">
      <form class="form-signin" method="POST" name="registration">
        <div class="input-group">
	        <span class="input-group-addon" id="basic-addon1"> name</span>
	        <input type="text" name="name" id="name" class="form-control" placeholder="name" required>
	    </div>
		<br>
        <label for="inputEmail" class="sr-only">Email </label>
        <input type="email" name="F_email" id="F_email" class="form-control" placeholder="Email address" required autofocus>
        <br>
		<br>
		<div class="input-group">
	        <span class="input-group-addon" id="basic-addon1"> Id</span>
	        <input type="text" name="F_Id" id="F_Id" class="form-control" placeholder="name" required>
	    </div>
		<br>
        <br>

      <input name="submit" type="submit" value="Register" />
      <p>Already have an account? <a href="Student_login.php">Sign in</a>.</p>
</form>
    </div>
    </div>
    </div>
    </div>
  </form>
</body>
</html>