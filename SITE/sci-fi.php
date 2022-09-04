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

        <div id="type_view">
            <form method="post">
                <button input type="submit" name="button1" value="Button1" class="btn"><i class="fa fa-th"></i></button>

                <button input type="submit" name="button2" value="Button2" class="btn"><i class="fa fa-bars"></i></button>

            </form>
        </div>


    <div id="content">

        <?php



        include('db.php');




        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 6;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        $genre = "1";
        $sql = "select * from knigi where GENRE = 'Научна фантастика ' LIMIT  $offset, $no_of_records_per_page";
        $result = mysqli_query($con, $sql);
    $stmt = mysqli_num_rows($result);


        
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
  

        ?>
          
    </div>

    <?php  ?>

        <div class="pagg">

            <?php
            $sql = "select * from knigi where GENRE = 'Научна фантастика ' LIMIT  $offset, $no_of_records_per_page";
            $rs_result = mysqli_query($con, $sql);
            $total_records = mysqli_num_rows($rs_result);
            echo $total_records;
            $total_pages = ceil($total_records / $no_of_records_per_page);
            $pagLink = "<ul class='pagination pagination-lg'>";
            for ($i = 1; $i <= $total_pages; $i++) {
                $pagLink .= '<li class="page-item"><a class="page-link" href="?pageno=' . $i . '" >' . $i . '</a></li>';
            }
            echo $pagLink . "</ul>";
            ?>

        </div>

        <?php
        include("footer.php");
        ?>


</body>

</html>