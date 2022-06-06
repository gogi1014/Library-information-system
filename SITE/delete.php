 <?php
require('db.php');
$id=$_REQUEST['id'];
$stmt = $con->prepare("DELETE FROM knigi WHERE id=?"); 
$stmt->bind_param("i",$id);
$stmt->execute();
header("Location: view.php"); 
?>