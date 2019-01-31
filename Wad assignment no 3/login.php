<?php
    $con = mysqli_connect("localhost","root","","signup");
      if(!$con)
      {
        die("connnection failed");

      }
      $flag = 0;

    if(isset($_POST['submit']))
    {  
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($email))
    {
      array_push($errors,"email is required");
    }
    if(empty($password))
    {
      array_push($errors, "password is required");
    }
    $query = "select from person_info where email = '$email'";
    $checkifpresentbefore  = mysqli_query($con, $query);
    if($checkifpresentbefore)
    {
      echo "Already present";
      $flag++;
    }
    $query = "select from person_info where password = '$password'";
    $checkifpresentbefore  = mysqli_query($con, $query);
     if($checkifpresentbefore)
    {
      echo "Already present";
      $flag++;
    }
    if(flag == 0)
    {
    $login = "insert into person_info (email,Password) 
                          VALUES ('$email','$password');";
    $insert = mysqli_query($con, $login);
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
</head>


<body>
	<nav class="head navbar navbar-expand-lg navbar-light bg-dark">
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
		<h4>Login</h4>
		</center >
		<form action="index.php" method="post" style="margin-left: 18% " >
		
		<input type ="text" name="email"  placeholder="Your email address or profile URL"><br>
		<input type ="text" name="password" placeholder="Your password"><br>
		<button type="submit" name="submit" style="background-color: #ff4f00">Submit</button>
		</form>
</div>
</body>
</html>
