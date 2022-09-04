<?php
require('db.php');

if (!isset($_COOKIE["username"]))
{
    header("Location: login.php");
    die();
}

$id =  $_GET['id'];
$sql = "SELECT * FROM `knigi` where id = $id";
    $result = $con->query($sql);
    if($result->num_rows != 1){
        // redirect to show page
        die('id is not in db');
    }
    $data = $result->fetch_assoc();

$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $id=$_REQUEST['id'];
    $ime =$_POST['IME'];
    $author = $_POST['AUTHOR'];
    $typ = $_POST['TYP'];
    $god = $_POST['GOD'];
    $izd = $_POST['IZD'];
    $str = $_POST['STR'];
    $genre = $_POST['GENRE'];
    $tag = $_POST['TAG'];
    $url = $_POST['url'];
    
    $stmt = $con->prepare("UPDATE knigi SET IME = ?, AUTHOR = ?, TYP = ?,GOD = ?, 
    IZD = ?, STR = ?, GENRE = ?, TAG = ?, url =	? where id = ?");
    $stmt->bind_param("sssisisssi",$ime,$author,$typ,$god,$izd,$str,$genre,$tag,$url,$id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
    header('Location: view.php');

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
<div id="cont">
<div class="wrapper fadeInDown">
  <div id="formContent">

    <!-- Login Form -->
    <form name="profile" method="post"   onsubmit="return showMessage()">
	    <h1 class="text-center mb-4 mt-4 text-white" >Редактиране на книга</h1>
        <input type="hidden" name="new" value="1" />

      <div class="input-group mb-3 ml-3">
    <input type="text" name="IME" id="IME" class="fadeIn second" value="<?php echo $data['IME'];?>"  placeholder="Заглавие">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="AUTHOR" id="AUTHOR" class="fadeIn third" value="<?php echo $data['AUTHOR'];?>"  placeholder="Автор">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="TYP" id="TYP" class="fadeIn third" value="<?php echo $data['TYP'];?>"  placeholder="Тип">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="GOD" id="GOD" class="fadeIn third" value="<?php echo $data['GOD'];?>"  placeholder="Година">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="IZD" id="IZD" class="fadeIn third" value="<?php echo $data['IZD'];?>"  placeholder="Издателство">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="STR" id="STR" class="fadeIn third" value="<?php echo $data['STR'];?>"  placeholder="Страници">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="GENRE" id="GENRE" class="fadeIn third" value="<?php echo $data['GENRE'];?>"  placeholder="Жанр">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="TAG" id="TAG" class="fadeIn third" value="<?php echo $data['TAG'];?>"  placeholder="Тагове">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="url" id="url" class="fadeIn third" value="<?php echo $data['url'];?>"  placeholder="Корица">
    </div>


      <input type="submit" class="fadeIn fourth" value="Добавяне">
    </form>

  </div>
</div>
</div>
</body>
</html>

