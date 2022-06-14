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
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="search.css">




<title>1-ва страница</title>
</head>

<body>

<?php
    include("reusesearch.php");
?>

<?php if( isset($_GET['search']) && $_GET['search'] != "" ){ ?>
<div id="type_view">
      <form method="post">
              <button input type="submit" name="button1" value="Button1" class="btn"><i class="fa fa-th"></i></button>

              <button input type="submit" name="button2" value="Button2" class="btn"><i class="fa fa-bars"></i></button>

          </form>
      </div>

<?php } ?>

<div id="content"  >

<?php if(isset($_COOKIE["username"])) { ?>




<?php 

}



include ('db.php');




if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
}
$no_of_records_per_page = 6;
$offset = ($pageno-1) * $no_of_records_per_page;


		function search(string $dbFieldToCheck, $con, $offset, $no_of_records_per_page){
      $stmt = $con->prepare("SELECT * FROM knigi 
               Where
               $dbFieldToCheck LIKE	? 
      LIMIT  $offset, $no_of_records_per_page");
      $search = "%".$_GET['search']."%";
      $stmt->bind_param("s", $search);
      $stmt->execute();
      $result = $stmt->get_result();


      if(isset($_COOKIE["username"])) { 
        if (!isset($_SESSION['View'])) {
          include ("index_grid.php");
        }
        else {
          include ($_SESSION['View']);
        }




           if (isset($_POST['button1'])) {
                 $_SESSION['View'] = "index_grid.php"; 

              }
              elseif (isset($_POST['button2']))

             {
                 $_SESSION['View'] = "index_table.php"; 
              }


    }
    else {
      include ("index_grid.php");
    }
  }







if( isset($_GET['search']) && $_GET['search'] != "" ){



    if($_GET['search_type'] == "avtor") {
      search("AUTHOR", $con, $offset, $no_of_records_per_page);
      }
    if($_GET['search_type'] == "ime") {
      search("IME", $con, $offset, $no_of_records_per_page);
        }

}
else{
  ?>
  <script type="text/javascript">$('#content').hide()</script>
  <?php } ?>
  </div>

  <?php if( isset($_GET['search']) && $_GET['search'] != "" ){ ?>

  <div class="pagg">   

<?php
$sql="select * from knigi";
  $rs_result=mysqli_query($con,$sql);
  $total_records=mysqli_num_rows($rs_result);
  $total_pages=ceil($total_records/$no_of_records_per_page);
  for($i=1;$i<=$total_pages;$i++){
    echo ($i==$pageno) ? 

    '<nav aria-label="Page navigation example">
    <ul class="pagination">
    <strong><a class="page-link" href="?pageno='.$i.'&search='.$_GET['search'].'&search_type='.$_GET['search_type'].'">'.$i.'</a></strong> </ul>
    </nav>' : 

    '<nav aria-label="Page navigation example">
    <ul class="pagination">
    <a class="page-link" href="?pageno='.$i.'&search='.$_GET['search'].'&search_type='.$_GET['search_type'].'" >'.$i.'</a> </ul>
    </nav>';


  }

?>
<?php
  }
else{
  ?>
  <script type="text/javascript">$('.pagg').hide()</script>
  <?php } ?>




</div>

<?php
    include("footer.php");
?>


</body>
</html> 