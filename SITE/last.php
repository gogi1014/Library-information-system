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


  <div id="content">

    <?php


    include('db.php');
    $sql = "select * from knigi order BY knigi.id DESC ";


    $result = mysqli_query($con, $sql);
    $queryResult = mysqli_num_rows($result);


    if ($queryResult > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo " <table>
			<tr><td><h3>" . $row['IME'] . "</h3></td></tr>&nbsp
			<tr><td> Автор: " . $row['AUTHOR'] . "</td></tr><br>&nbsp
			<tr><td> Тип на продукта: " . $row['TYP'] . "</td></tr>
			<tr><td> Година на издаване: " . $row['GOD'] . " </td></tr>
			<tr><td> Издателство: " . $row['IZD'] . " </td></tr>
			<tr><td> Брой страници: " . $row['STR'] . " </td></tr>
			<tr><td> Жанр: " . $row['GENRE'] . "</td></tr>
      <tr><td> Тагове: " . $row['TAG'] . " </td></tr>
      <img  src=" . $row['url'] . " width='160px' height='230px' align='right' >
			</table>";
      }
    } else {
      echo "Няма открити резултати!";
    }

    ?>

  </div>


</body>
<?php
    include("footer.php");
?>

</html>