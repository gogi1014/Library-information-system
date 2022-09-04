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
<link rel="stylesheet" href="search.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

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
    <h2>Всички Записи</h2>

    <div class="input-group">
  <div class="form-outline">
    <input type="search" id="search_view" onkeyup="searchView()" class="form-control" placeholder="Търси заглавие"/>
  </div>
  <button type="button" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
    </div>

    <div class="table-responsive">
    <table class="table" id = "myTable">
    <thead>
    <tr>
    <th class="text-center"><strong>S.No</strong></th>
    <th class="text-center"><strong>Име</strong></th>
    <th class="text-center"><strong>Автор</strong></th>
    <th class="text-center"><strong>Тип</strong></th>
    <th class="text-center"><strong>Година</strong></th>
    <th class="text-center"><strong>Издание</strong></th>
    <th class="text-center"><strong>Страници</strong></th>
    <th class="text-center"><strong>Жанр</strong></th>
    <th class="text-center"><strong>Тагове</strong></th>
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


    
   
    $sql="Select * from knigi ORDER BY id desc;";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result)) { 
        $tpl->set('id', $row["id"]);
        $tpl->set('IME', $row["IME"]);
        $tpl->set('AUTHOR', $row["AUTHOR"]);
        $tpl->set('TYP', $row["TYP"]);
        $tpl->set('GOD', $row["GOD"]);
        $tpl->set('IZD', $row["IZD"]);
        $tpl->set('STR', $row["STR"]);
        $tpl->set('GENRE', $row["GENRE"]);
        $tpl->set('TAG', $row["TAG"]);
        $tpl->set('id2', $row["id"]);
        $tpl->set('id3', $row["id"]);
        

        
        print $tpl->fetch('_view_.html');

        
       } ?>
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
