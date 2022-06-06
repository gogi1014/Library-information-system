<?php
require('db.php');
$id=$_REQUEST['ratingId'];
$stmt = $con->prepare("DELETE FROM item_rating WHERE ratingId=?"); 
$stmt->bind_param("i",$id);
$stmt->execute();

?>