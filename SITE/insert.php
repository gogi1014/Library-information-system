<?php

session_start();

if (!isset($_COOKIE["username"]))
{
    header("Location: login.php");
    die();
}

require('db.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $ime =$_POST['IME'];
    $author = $_POST['AUTHOR'];
    $typ = $_POST['TYP'];
    $god = $_POST['GOD'];
    $izd = $_POST['IZD'];
    $str = $_POST['STR'];
    $genre = $_POST['GENRE'];
    $tag = $_POST['TAG'];
    $url = $_POST['url'];
    

    $stmt = $con->prepare("INSERT into knigi (IME,AUTHOR,TYP,GOD,IZD,STR,GENRE,TAG,url)VALUES(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssisisss", $ime,$author,$typ,$god,$izd,$str,$genre,$tag,$url);
    $stmt->execute();
    
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
	    <h1 class="text-center mb-4 mt-4 text-white" >Добавяне на книга</h1>
        <input type="hidden" name="new" value="1" />

      <div class="input-group mb-3 ml-3">
    <input type="text" name="IME" id="IME" class="fadeIn second"  placeholder="Заглавие">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="AUTHOR" id="AUTHOR" class="fadeIn third"  placeholder="Автор">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="TYP" id="TYP" class="fadeIn third"  placeholder="Тип">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="GOD" id="GOD" class="fadeIn third"  placeholder="Година">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="IZD" id="IZD" class="fadeIn third"  placeholder="Издателство">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="STR" id="STR" class="fadeIn third"  placeholder="Страници">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="GENRE" id="GENRE" class="fadeIn third"  placeholder="Жанр">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="TAG" id="TAG" class="fadeIn third"  placeholder="Тагове">
    </div>

    <div class="input-group mb-3 ml-3">
    <input type="text" name="url" id="url" class="fadeIn third"  placeholder="Корица">
    </div>


      <input type="submit" class="fadeIn fourth" value="Добавяне">
    </form>

  </div>
</div>
</div>
</body>
</html>
