<?php
require('db.php');

if (!isset($_COOKIE["username"]))
{
    header("Location: login.php");
    die();
}

$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $id=$_REQUEST['id'];
    $admin =$_POST['admin'];
    
    $stmt = $con->prepare("UPDATE users SET admin = ? where id = ?");
    $stmt->bind_param("si",$admin,$id);
    $stmt->execute();
    
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
    header('Location: view_user.php');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" href="search.css">
<title>Вход </title>

<body>
<div class="wrapper fadeInDown">
  <div id="formContent">

    <!-- Login Form -->
    <form name="profile" method="post"   onsubmit="return showMessage()">
	    <h1 class="text-center mb-4 mt-4 text-white" >Добавяне на книга</h1>
        <input type="hidden" name="new" value="1" />

      <div class="input-group mb-3 ml-3">
    <input type="text" name="admin" id="admin" class="fadeIn second"  placeholder="Админ">
    </div>

      <input type="submit" class="fadeIn fourth" value="Смяна">
    </form>

  </div>
</div>

</body>
</html>

