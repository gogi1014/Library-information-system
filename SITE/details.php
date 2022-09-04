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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="search.css">
<script src="rating.js"></script>
<link href='./assets/jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="./assets/jquery-bar-rating-master/dist/jquery.barrating.min.js"></script>
<script type="text/javascript">
   $(function() {
      $('#sel_rating').barrating({
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

<?php if(isset($_COOKIE["username"])) { ?>
<div id="type_view">
      <form method="post">
              <button input type="submit" name="saveQuery" value="Button1" class="btn">За заемане <i class="fa fa-clipboard"></i></button>

              <button input type="submit" name="savePrint" value="Button2" class="btn">За сканиране <i class="fa fa-clipboard"></i></button>

          </form>
      </div>
<?php } ?>

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

<?php if((isset($_COOKIE["username"])) ){ ?>


<?php } 
if(isset($_POST['saveQuery'])){
  $userID = $_COOKIE["user_id"];
  $insertRating = "INSERT INTO request_books (itemId, userId, typpe, created) 
  VALUES ('".$_GET["id"]."', '".$userID."','Заявка за заемане', '".date("Y-m-d H:i:s")."')";
  mysqli_query($con, $insertRating) or die("database error: ". mysqli_error($con));
}
if(isset($_POST['savePrint'])){
  $userID = $_COOKIE["user_id"];
  $insertRating = "INSERT INTO request_books (itemId, userId, typpe, created) 
  VALUES ('".$_GET["id"]."', '".$userID."','Заявка за сканиране', '".date("Y-m-d H:i:s")."')";
  mysqli_query($con, $insertRating) or die("database error: ". mysqli_error($con));
}
?>



<div id="comm">

<?php if(isset($_COOKIE["username"])) { ?>

<div class="row">
<div class="col-sm-12">
<form id="ratingForm" method="POST">
<div class="form-group">

<?php


function star_rating($rating)
{
    $rating_round = round($rating * 2) / 2;
    if ($rating_round <= 0.5 && $rating_round > 0) {
        return '<i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }
    if ($rating_round <= 1 && $rating_round > 0.5) {
        return '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }
    if ($rating_round <= 1.5 && $rating_round > 1) {
        return '<i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }
    if ($rating_round <= 2 && $rating_round > 1.5) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }
    if ($rating_round <= 2.5 && $rating_round > 2) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }
    if ($rating_round <= 3 && $rating_round > 2.5) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    }
    if ($rating_round <= 3.5 && $rating_round > 3) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i>';
    }
    if ($rating_round <= 4 && $rating_round > 3.5) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
    }
    if ($rating_round <= 4.5 && $rating_round > 4) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>';
    }
    if ($rating_round <= 5 && $rating_round > 4.5) {
        return '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
    }
    
}



$ratinguery = "SELECT  itemId,  ROUND(AVG(ratingNumber),1) as rn, title FROM item_rating where itemId = $id";
$ratingResult = mysqli_query($con, $ratinguery) or die("database error:". mysqli_error($con));
while($rating = mysqli_fetch_assoc($ratingResult)){
  echo $rating["rn"];
  echo star_rating($rating["rn"]);
}
?>

<h4>Коментари</h4>

<div class="br-wrapper br-theme-fontawesome-stars">

<select id = "sel_rating" onchange="getOption()">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>
</div>


<input type="hidden" class="form-control" id="rating" name="rating" value= "1" onchange="getOption()" >
<input type="hidden" class="form-control" id="itemId" name="itemId" value= <?php echo $id ?> >
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
<button type="submit" class="btn btn-info" id="saveReview" >Добави коментар</button> 
<button type="button" class="btn btn-info" id="cancelReview">Откажи</button>
</div>

<script>
function getOption() {
  document.getElementById("rating").value = document.getElementById('sel_rating').value;
  document.getElementById("rate").innerHTML = document.getElementById('rating').value;
}
</script>

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
$ratinguery = "SELECT ratingId, itemId, userId,  ratingNumber, title, comments, created, modified,id,username FROM item_rating, users where itemId = $id and userId = id;";
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
<script>getOption();</script>
<div class="col-sm-9">
<div class="review-block-title"> Рейтинг:<?php echo $rating['ratingNumber'];echo star_rating($rating["ratingNumber"]); ?></div>  
<div class="review-block-title"> Заглавие: <?php echo $rating['title']; ?></div>
<div class="review-block-description">Коментар:<?php echo $rating['comments']; ?></div>
<?php 
if((isset($_SESSION["admin"]))){?>
    
  <a href="delete_comment.php?ratingId=<?= $row["ratingId"]; ?>">Изтрий коментара</a>
  <?php  } ?>
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