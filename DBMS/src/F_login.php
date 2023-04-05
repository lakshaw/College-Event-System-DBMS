<?php

 include_once('connection.php');

 function test_input($data) {

     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
 }

 if ($_SERVER["REQUEST_METHOD"]== "POST") {

     $F_email = test_input($_POST["F_email"]);
     $F_password = test_input($_POST["F_password"]);
     $stmt = $conn->prepare("SELECT * FROM facultyregister");
     $stmt->execute();
     $users = $stmt->fetchAll();

     foreach($users as $user) {

         if(($user['F_email'] == $F_email) &&
             ($user['F_password'] == $F_password)) {
                 header("Location: about.html");
         }
         //else {
            // echo "<script language='javascript'>";
//echo "alert('WRONG INFORMATION')";
            // echo "</script>";
           //  die();
        // }
     }
 }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Faculty Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="card">
          <div class="inner-box" id="card">
            <div class="card-front">
              <h2>LOGIN FOR FACULTY</h2>

              <div class="signup-classic">
      <form class="form-signin" method="POST" name="registration">

        <label for="input name" class="sr-only">name </label>
        <input type="email" name="F_email" id="F_email" class="form-control" placeholder="email" required autofocus>
        <br>
		<br>
        <label for="inputPassword" class="sr-only"> Password</label>
        <input type="password" name="F_password" id="F_password" class="form-control" placeholder="Password" required>
        <br>
        <br>
        <input name="submit" type="submit" value="Login" />
                  <input type="checkbox" checked="checked" name="remember"> Remember me<br>

              </form>


            </div>
          </div>
        </div>
    </div>
</body>
</html>
