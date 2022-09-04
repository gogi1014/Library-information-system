 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" href="search.css">
<title>Регистрация </title>

<?php
require('db.php');
session_start();

$nameErr = $userEx =  $emailErr = $passw = $passw2 = $prov = $al = $al1 ="";

// If form submitted, insert values into the database.
if (isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['password2'])){

	$username = $_POST['username'];
	$password = hash("sha256", $_POST['password']);
	$email = $_POST['email'];
  $password2 = hash("sha256", $_POST['password2']);
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
	

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Неправилен имейл!";
  }
  
  
  if (preg_match('/^[a-zA-Z0-9]+$/', $username) == 0) {
    $nameErr = "Не сте въвели потребителско име!";
  }
  
 
  if (strlen($password) < 8) {
    $passw = 'Паролата трябва да бъде поне 8 символа!';
  }

  if($password != $password2){
    $passw2 = 'Паролите не съвпадат!';
  }

  if(strlen($emailErr) + strlen($nameErr) + strlen($passw) + strlen($passw2) == 0)
  {
    $prov = "success";
  }

  if ($stmt = $con->prepare('SELECT * FROM users WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
      $userEx = 'Потребителското име съществува, изберете друго!';
    } else {
      if(($stmt = $con->prepare("INSERT into users (username,first_name,last_name,password,email)VALUES(?,?,?,?,?)")) and ($prov == "success")){
        $stmt->bind_param("sssss", $username,$first_name ,$last_name,$password, $email);
          $stmt->execute();
          $al = "Регистрацията успешна";
          $al1= "Натиснете тук за <a href='index.php'>Вписване"; 
          echo "
      <h3>Регистрацията успешна</h3>
      <br/>Натиснете тук за <a href='index.php'>Вписване</a>";
      } 
    }
    $stmt->close();
  } else {
    // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
    echo 'Could not prepare statement!';
  }

}

$con->close();

?>



</head>

<body>
<div class="wrapper fadeInDown">
  <div id="formContent">

    <!-- Login Form -->
    <form name="profile" method="post"   onsubmit="return showMessage()">
	  <h1 class="text-center mb-4 mt-4 text-white" >Регистрация</h1>

    <div class="input-group mb-3 ml-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
    <input type="text" name="username" id="username" class="fadeIn second"  placeholder="Потребителско име">
    </div>
    <span class = "error"><?php echo $nameErr;echo $userEx;?></span>

    <div class="input-group mb-3 ml-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
    <input type="text" name="first_name" id="first_name" class="fadeIn second"  placeholder="Собствено име">
    </div>

    <div class="input-group mb-3 ml-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
    <input type="text" name="last_name" id="last_name" class="fadeIn second"  placeholder="Фамилия">
    </div>

    <div class="input-group mb-3 ml-3">
							<div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-envelope"></i></i></span>
    </div>
	  <input type="text" name="email" id="email" class="fadeIn second"  placeholder="Имейл">
    </div>
    <span class = "error"><?php echo $emailErr;?></span>

    <div class="input-group mb-3 ml-3">
							<div class="input-group-append">
              <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
              </div>
    <input type="password" name="password" id="password" class="fadeIn third"  placeholder="Парола">
    </div>
    <span class = "error"> <?php echo $passw;?></span>


    <div class="input-group mb-3 ml-3">
							<div class="input-group-append">
              <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
              </div>
	  <input type="password" name="password2" id="password2" class="fadeIn third"  placeholder="Потвърди парола">
    </div>
    <span class = "error"><?php echo $passw2;?></span>

      <input type="submit" name="submit" class="fadeIn fourth" value="Регистрация">

      <?php 

      if(isset($al)){
        echo"
        <h4 class='alert-heading'><?php echo $al;?></h4>
        <?php echo $al1;?>";
      }
      ?>




    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
	    
    </div>

  </div>
</body>
</html>
