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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">



<link rel="stylesheet" href="search.css">


<body>

<?php
    include("reusesearch.php");
?>

    <div id="content"  >
    <div class="form">
    <p><a href="view.php">Преглед на записите</a> 
    | <a href="insert.php">Добавяне на нов запис</a> 
    | <a href="view_user.php">Преглед на потребителите</a></p>
    <h2>Всички потребители</h2>
    <form class="user_search" action='view_user.php'  method="get" >
    <div class="input-group">
  <div class="form-outline">
    <input type="search" id="search_view" name="search_view" class="form-control" placeholder="Търси потребител"/>
  </div>
  <button type="button" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
    </div>
    </form>

    <div class="table-responsive">
    <table class="table">
    <thead>
    <tr>
    <th class="text-center"><strong>S.No</strong></th>
    <th class="text-center"><strong>Потребителско име</strong></th>
    <th class="text-center"><strong>Имейл</strong></th>
    <th class="text-center"><strong>Админ</strong></th>
    <th class="text-center"><strong>Edit</strong></th>
    <th class="text-center"><strong>Delete</strong></th>
    </tr>
    </thead>
    <tbody>
    <?php require('db.php');

require_once('./modules/template.php');

// zadavame pytia do firektoriata sys HTML shabloni
$path = './templates/';

// syazdawame instakcia na klasa
$tpl = new Template($path);


    
   
    $sql="Select * from users ORDER BY id desc;";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result)) { 
        $tpl->set('id', $row["id"]);
        $tpl->set('username', $row["username"]);
        $tpl->set('email', $row["email"]);
        $tpl->set('admin', $row["admin"]);
        $tpl->set('id2', $row["id"]);
        $tpl->set('id3', $row["id"]);
        

        
        print $tpl->fetch('_view_user.html');

        
       } 
       
       if( isset($_GET['search_view']) && $_GET['search_view'] != "" ){
        $stmt = $con->prepare("SELECT * FROM users 
        Where
        username LIKE	?");
        $search = $_GET['search_view'];
        $stmt->bind_param("s", $search);
        $stmt->execute();
        $result = $stmt->get_result();
           
        
    
    while($row = $result->fetch_array()) { 
        

        
        print $tpl->fetch('_view_user.html');

        
       } 
           
       }
       ?>
    </tbody>
</table>
</div>
</div>
</div>

<?php
    include("footer.php");
?>
</body>
</html>   