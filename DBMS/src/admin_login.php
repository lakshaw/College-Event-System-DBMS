<?php

 include_once('connection.php');

 function test_input($data) {

     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
 }

 if ($_SERVER["REQUEST_METHOD"]== "POST") {

     $adminname = test_input($_POST["adminname"]);
     $password = test_input($_POST["password"]);
     $stmt = $conn->prepare("SELECT * FROM adminlogin");
     $stmt->execute();
     $users = $stmt->fetchAll();

     foreach($users as $user) {

         if(($user['adminname'] == $adminname) &&
             ($user['password'] == $password)) {
                 header("Location: choose_admin.html");
         }
         else {
             echo "<script language='javascript'>";
             echo "alert('WRONG INFORMATION')";
             echo "</script>";
             die();
         }
     }
 }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="card">
          <div class="inner-box" id="card">
            <div class="card-front">
              <h2>LOGIN FOR ADMIN</h2>

              <div class="signup-classic">
      <form class="form-signin" method="POST" name="registration">

        <label for="input name" class="sr-only">name </label>
        <input type="adminname" name="adminname" id="adminname" class="form-control" placeholder="admin name" required autofocus>
        <br>
		<br>
        <label for="inputPassword" class="sr-only"> Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
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