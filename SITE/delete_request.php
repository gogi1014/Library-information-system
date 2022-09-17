<?php

if (!isset($_COOKIE["username"]))
{
    header("Location: login.php");
    die();
}

require('db.php');
$id=$_REQUEST['id'];
$stmt = $con->prepare("DELETE FROM request_books WHERE id=?"); 
$stmt->bind_param("i",$id);
$stmt->execute();
header("Location: view_request.php"); 
?>