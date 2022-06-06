<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" href="search.css">
<title>Вход </title>

<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){



  
    $username = $_POST['username'];
    $password = md5($_POST['password']);


    $sql="select * from users where username='".$username."' AND password='".$password."' ";

    $result=mysqli_query($con,$sql);
  
    $row=mysqli_fetch_array($result);

    
  
    if($row["admin"]=="1")
    {	
  
      $_SESSION["admin"]= "1";
  
    }



    $stmt = $con->prepare("SELECT username, password,admin FROM users WHERE username=? and password=?");
    $stmt->bind_param('ss', $username, $password);
	  $stmt->execute();
	  
	  $stmt->store_result();
        if($stmt->num_rows==1){
	    setcookie("username", $username);
      setcookie("user_id", $row["id"]);
      
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
          echo "
    <META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
    <script type=\"text/javascript\">
    alert(\"User and password dont match.\");
    </script>";
	}
 



    }
?>





</head>

<body>

<div class="wrapper fadeInDown">
  <div id="formContent">

    <!-- Login Form -->
    <form name="profile" method="post"   onsubmit="return showMessage()">
	    <h1 class="text-center mb-4 mt-4 text-white" >Вход</h1>
      <div class="input-group mb-3 ml-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
    <input type="text" name="username" id="username" class="fadeIn second"  placeholder="Потребителско име">
    </div>
    <div class="input-group mb-3 ml-3">
							<div class="input-group-append">
              <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
              </div>
    <input type="password" name="password" id="password" class="fadeIn third"  placeholder="Парола">
    </div>
      <input type="submit" class="fadeIn fourth" value="Вход">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
	  <p>Не сте регистриран все още? <a href='reg.php'>Регистрирайте се тук</a></p>
    </div>

  </div>
</div>
</body>
</html>
