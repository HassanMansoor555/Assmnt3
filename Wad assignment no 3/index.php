<?php
    $con = mysqli_connect("localhost","root","","signup");
      if(!$con)
      {
        die("connnection failed");

      }

    if(isset($_POST['submit']))
    {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirm'];


    if(empty($name))
    {
     array_push($errors, "userame is required");
    }
    if(empty($email))
    {
      array_push($errors,"userame is required");
    }
    if(empty($password))
    {
      array_push($errors, "password is required");
    }
    if(empty($confirmpassword))
    {
      array_push($errors, "confirmpassword is required");
    }
    if($password != $confirmpassword)
    {
      array_push($errors, "Your Password and Confirm password arnt same");
    }
    if(count($errors) == 0)
    {
    $sign = "insert into person_info (Name,email,Password,Cpassword) 
                          VALUES ('$name' , '$email','$password','$confirmpassword');";
    $insert = mysqli_query($con, $sign);
    if($insert){
        header("location: ".$_SERVER['PHP_SELF']);
    }
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" href="errors.php">
</head>


<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand" href="#" style="background-color: #ff4f00;">SoundCloud</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #ff4f00;">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#" style="color: white">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: white">Stream</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: white">colloction</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search for artist,bands,track,podcasts" aria-label="Search" >
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="iform">
<center style="margin-top:25%">
		<h4>Signup</h4>
		</center >
    
		<form action="index.php" method="post" style="margin-left: 18% " >
		<input type ="text" name="username" placeholder="Your name"><br>
		<input type ="text" name="email"  placeholder="Your email"><br>
		<input type ="text" name="password" placeholder="Your password"><br>
		<input type ="text" name="confirm" placeholder="Confirm password"><br>
		<button type="submit" name="submit" style="background-color: #ff4f00" ;>Submit</button>
		</form>
</div>
</body>
</html>
