<?php
require('db.php');

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
    
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function(){
        $('#cont').load('reusbookin.html');
    });
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" href="search.css">
<title>Вход </title>

<body>
<div id="cont"></div>
</body>
</html>

