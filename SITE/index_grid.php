<?php


require_once('./modules/template.php');

// zadavame pytia do firektoriata sys HTML shabloni
$path = './templates/';

// syazdawame instakcia na klasa
$tpl = new Template($path);

$rows = $result->num_rows;    // Find total rows returned by database
      if($rows > 0) {
        $cols = 3;    // Define number of columns
        $counter = 1;     // Counter used to identify if we need to start or end a row
        $nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
        
        ?> 
            <div class="container-fluid">    <!-- // Container open-->
            <?php while($row = $result->fetch_array()){
              if(($counter % $cols) == 1) {?>     <!--// Check if it's new row -->
                 <div  class="row">	<!--// Start a new row -->
                <?php
              }
                $tpl->set('id', $row["id"]);
                $tpl->set('url', $row["url"]);
                $tpl->set('IME', $row["IME"]);
                $tpl->set('AUTHOR', $row["AUTHOR"]);
                
                print $tpl->fetch('_index_grid.html');// Column with content
              if(($counter % $cols) == 0) {?>  <!-- If it's last column in each row then counter remainder will be zero -->
                </div>	<!-- //  Close the row -->
                <?php }
              $counter++;    // Increase the counter 
            }
            $result->free();
            if($nbsp > 0) { // Adjustment to add unused column in last row if they exist
              for ($i = 0; $i < $nbsp; $i++) { 	?> 
                <div class="col-sm-4">&nbsp;</div>
                <?php
            }?>
                </div>  <!--// Close the row -->
              <?php
            }?>	
                </div>
                 <!--// Close the container -->
                <?php
          } 

?>

