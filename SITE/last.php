<?php
  include '55.php';
?>

<!DOCTYPE html>
<html lang="bg">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image  {
  background-image: url("thumb-1920-26102.jpg");
  height: 1200px; 
  overflow: auto;
  
  }
  .bg-image .logo{
	  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0, 0.3); 
  font-weight: bold;
  position: absolute;
  height:20%;
  width:80%;
  top: 10%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  padding: 20px;  
  text-align: center;}
  }
  
  .bg-image .menu{
	  
 background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0, 0.8); 
  font-weight: bold;
  position: fixed;
  height:10%;
  top: 10%;
  left: 70%;
  transform: translate(-50%, -50%);
  z-index: 2;
  padding: 20px;  width: 50%;
  text-align: center;}
  
  
  .bg-image .nav{
	  
  position: absolute;
  top: 50%;
  left: 85%;
  font-size: 120%;
  border-radius: 12px;
  color: white;
  border: none;
  display: inline-block;
  background-color: #555555;}
  
  .bg-search {
	font-size: 40px;
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0, 0.7); 
  font-weight: bold;
  position: absolute;
  top: 200px;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  padding: 20px;  width: 80%;
  text-align: center;
}

#content{
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.7); /* Black w/opacity/see-through */
  color: white;
position: absolute;  top: 650px;
  left: 50%;
  transform: translate(-50%, -50%);
  height: 800px;
  width: 80%;
  padding: 20px;
  text-align: left;
  line-height: 50%;
  overflow: auto;
 

  }
 
 #content h3{
	 font-size: 30px;
 }
 
 div.bg-search img{
 width:5%;
 }
 
 .bg-search{
 color:white;
 }
 
 form.example button {
  width: 30px; 
  height: 28px;
  padding: 10px;
  background:url("pngegg.png");
  background-size: cover;
  cursor: pointer;
  border: 0; 
 
}

table{
  border-bottom: 2px solid rgb(180, 0, 0);
  width:70%;
  text-size-adjust: 30px;
  
}

th, td{
  padding-bottom:17px;
  font-size: 15px;
}

input[name="search"]{
  width: 80%;
}
  .inner {
    width: 80%;
    height: 1px;
    margin: 0px auto;
    border-bottom: 1px solid #969696;
}
</style>
<title>1-ва страница</title>
</head>

<body>
<div class="bg-image"></div>
<div class="bg-search">
Последно добавени заглавия
</div>
<div id="content" >

<?php
     $con = new mysqli($server, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
		
	
        $sql = "select * from knigi order BY knigi.id DESC ";
				   

        $result = mysqli_query($con,$sql);
        $queryResult = mysqli_num_rows($result);
		 
		 
		if($queryResult>0){
		while($row = mysqli_fetch_assoc($result)){
			echo " <table>
			<tr><td><h3>".$row['IME'] . "</h3></td></tr>&nbsp
			<tr><td> Автор: ".$row['AUTHOR']."</td></tr><br>&nbsp
			<tr><td> Тип на продукта: ".$row['TYP']."</td></tr>
			<tr><td> Година на издаване: ".$row['GOD'] . " </td></tr>
			<tr><td> Издателство: ". $row['IZD'] . " </td></tr>
			<tr><td> Брой страници: ".$row['STR'] . " </td></tr>
			<tr><td> Жанр: ".$row['GENRE'] . "</td></tr>
      <tr><td> Тагове: ".$row['TAG'] . " </td></tr>
      <img  src=".$row['url'] . " width='160px' height='230px' align='right' >
			</table>";
		}
		}
		else{
			echo"Няма открити резултати!";
		}

		?>
		
		</div>


</body>
</html>