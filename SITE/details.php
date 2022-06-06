<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link rel="stylesheet" href="fontawesome-stars.css">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="search.css">
<script src="rating.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="jquery.barrating.min.js"></script>
<script type="text/javascript">
   $(function() {
      $('#example').barrating({
        theme: 'fontawesome-stars'
      });
   });
</script>



<title>1-ва страница</title>
</head>

<body>

<?php
    include("reusesearch.php");
?>


<div id="content">


<?php
include ('db.php');

require_once('./modules/template.php');

// zadavame pytia do firektoriata sys HTML shabloni
$path = './templates/';

// syazdawame instakcia na klasa
$tpl = new Template($path);

if(isset($_GET["id"])){
    $id = $_GET['id'];
    
    $stmt = $con->prepare("select * from knigi where id = ?");
    $stmt->bind_param("s", $id);
          $stmt->execute();
          $result = $stmt->get_result();
          while($row = $result->fetch_assoc()){
            include ('details_content.php');
          }
        }

        include ('saveRating.php');
  ?>



<div id="comm">

<?php if(isset($_COOKIE["username"])) { ?>

<div class="row">
<div class="col-sm-12">
<form id="ratingForm" method="POST">
<div class="form-group">
<h4>Коментари</h4>

<select name = "sel_rating">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>

<input type="hidden" class="form-control" id="rating" name="rating" value= <?php echo $sel_rating ?>>
<input type="hidden" class="form-control" id="itemId" name="itemId" value= <?php echo $id ?>>
</div>
<div class="form-group">
<label for="usr">Заглавие</label>
<input type="text" class="form-control" id="title" name="title" required>
</div>
<div class="form-group">
<label for="comment">Коментар</label>
<textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-info" id="saveReview">Добави коментар</button> <button type="button" class="btn btn-info" id="cancelReview">Откажи</button>
</div>
</form>
</div>
</div>

<?php 
} 
else {?>  
<p class="text-warning">Трябва да бъдеш регистриран за да коментираш!</p>
<?php } ?>

<div class="row">
<div class="col-sm-7">
<hr/>
<div class="review-block">
<?php
$ratinguery = "SELECT ratingId, itemId, userId, ratingNumber, title, comments, created, modified,id,username FROM item_rating, users where itemId = $id and userId = id;";
$ratingResult = mysqli_query($con, $ratinguery) or die("database error:". mysqli_error($con));
while($rating = mysqli_fetch_assoc($ratingResult)){
$date=date_create($rating['created']);
$reviewDate = date_format($date,"M d, Y");
$result = mysqli_query($con, $ratinguery);
          while($row = $result->fetch_assoc()){
            $username = $row["username"];
          }
?>
<div class="row">
<div class="col-sm-3">
<div class="review-block-name">От <?php echo $username ?></a></div>
<div class="review-block-date"><?php echo $reviewDate; ?></div>
</div>
<div class="col-sm-9">
<div class="review-block-rate">
<?php
for ($i = 1; $i <= 5; $i++) {
$ratingClass = "btn-default btn-grey";
if($i <= $rating['ratingNumber']) {
$ratingClass = "btn-warning";
}
?>
<button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<?php } ?>
</div>
<div class="review-block-title"><?php echo $rating['title']; ?></div>
<div class="review-block-description"><?php echo $rating['comments']; ?></div>
<?php 
 if((isset($_SESSION["admin"]))){ 
    $sql="Select * from item_rating ;";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result)) { ?>
    <a href="delete_comment.php?ratingId=<?= $row["ratingId"]; ?>">Изтрий коментара</a>
<?php 
 } }?>
</div>

</div>
<hr/>
<?php 
 } ?>
</div>
</div>
</div>


</div>

</div>


<?php
    include("footer.php");
?>
    

</body>
</html>