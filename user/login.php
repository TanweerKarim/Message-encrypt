<?php
session_start();
$con=mysqli_connect("localhost","root","","cmb");
if(isset($_POST["registerUser"]))
{
  $name=$_POST["name"];
  $uname=$_POST["user_name"];
  $num=$_POST["number"];
  $password1=$_POST["password"];
  $sql="INSERT INTO `users`(`name`, `user_name`, `phone`, `password`) VALUES ('{$name}','{$uname}','{$num}','{$password1}')";
  try {
  mysqli_query($con,$sql);
  echo "<script>window.alert('You are successfully registered');</script>";

}
//catch exception
catch(Exception $e) {
  echo "<script>window.alert('User name or Phone number already exists');</script>";
  header("Refresh:0; url=signup.php");
}

}
 ?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Message Encrypt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="resources/logo.png">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="../style/style.css">

	</head>
	<body style="background-color:white;">
    <nav class="navbar navbar-light bg-light py-4" style="position:fixed;width: 100%;">
      <a class="navbar-brand" href="#">

        </a>
      </nav>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow py-0" style="z-index: 3;position:sticky;width: 100%;">
      <div class="container-fluid" >
        <a class="navbar-brand" href="../index.php" style="margin-left:50px;">
          <img src="resources/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
          Message Encrypt
        </a>

        </div>
      </nav>
    <section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="../resources/cent2.png" class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <h3>Login</h3>
        <form action="login.php" method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="form1Example13" name="t2" class="form-control form-control-lg" value="<?php
            if(isset($_POST["registerUser"])){echo $uname;}?>" />
            <label class="form-label" for="form1Example13">User Name</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form1Example23" name="t3" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example23">Password</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <a href="#!">Forgot password?</a>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-success btn-lg btn-block" name="s2">Sign in</button><br>
          <a href="signup.php"><button type="button" class="btn btn-success btn-lg btn-block">Create new account</button></a>

        </form>
      </div>
    </div>
  </div>
</section>

	</body>
</html>
<?php
      if(isset($_POST["s2"]))
      {
        $user_name=$_POST["t2"];
        $pass=$_POST["t3"];
        $sql="SELECT user_name,password FROM users WHERE user_name='{$user_name}' and password='{$pass}'";
        $fth=mysqli_query($con,$sql);
        $res=mysqli_fetch_array($fth);
        print_r($res);
        if($res[0]==$user_name&&$res[1]==$pass)
        {
          echo "hello";
          $_SESSION["id"]=$user_name;
          $_SESSION["t"]=time()+1800;
          header("Refresh:0; url=../dashboard/index.php");
        }
        else {
          echo "<script>window.alert('Wrong User Name and Password')</script>";
        }
      }
     ?>
