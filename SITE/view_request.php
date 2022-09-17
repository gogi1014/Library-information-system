<?php
session_start();

if (!isset($_COOKIE["username"]))
{
    header("Location: login.php");
    die();
}
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
    | <a href="view_user.php">Преглед на потребителите</a>
    |<a href="view_request.php">Преглед на заявките</a></p>
    <h2>Всички заявки</h2>
    <form class="user_search" action='view_user.php'  method="get" >
    <div class="input-group">
  <div class="form-outline">
  <input type="search" id="search_view" onkeyup="searchView()" class="form-control" placeholder="Търси заявка"/>
  </div>
  <button type="button" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
    </div>
    </form>

    <div class="table-responsive">
    <table class="table" id = "myTable">
    <thead>
    <tr>
    <th class="text-center"><strong>ID на заявка</strong></th>
    <th class="text-center"><strong>ID на заглавие</strong></th>
    <th class="text-center"><strong>ID на потребител</strong></th>
    <th class="text-center"><strong>Тип</strong></th>
    <th class="text-center"><strong>Дата на заявка</strong></th>
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


    
   
    $sql="Select * from request_books ORDER BY id desc;";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result)) { 
        $tpl->set('id', $row["id"]);
        $tpl->set('itemId', $row["itemId"]);
        $tpl->set('userId', $row["userId"]);
        $tpl->set('typpe', $row["typpe"]);
        $tpl->set('created', $row["created"]);
        $tpl->set('id2', $row["id"]);
        

        
        print $tpl->fetch('_view_request.html');

        
       } 
       
       if( isset($_GET['search_view']) && $_GET['search_view'] != "" ){
        $stmt = $con->prepare("SELECT * FROM request_books 
        Where id
         LIKE	?");
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

<script>
function searchView() {
  var input, filter, table, tr, td, cell, i, j;
  filter = document.getElementById("search_view").value.toLowerCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
    const tdArray = tr[i].getElementsByTagName("td");
    for (var j = 0; j < tdArray.length; j++) {
      const cellValue = tdArray[j];
      if (cellValue && cellValue.innerHTML.toLowerCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        break;
      }
    }
  }
}
</script>