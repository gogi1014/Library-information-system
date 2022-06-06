echo '<div class="'.$container_class.'">';    // Container open
            while($row = $result->fetch_array()){
              if(($counter % $cols) == 1) {    // Check if it's new row
                echo '<div  class="'.$row_class.'">';	// Start a new row
                
              }
              echo '<div class="'.$col_class.'">
              <br>
              <a href="./details.php?id='.$row['id'].'" ">
              <img  src="'.$row['url'].'""" />
              <h3>'.$row['IME'].'</h3>
              <h6>'.$row['AUTHOR'].'</h6></a>
              </div>';  // Column with content
              if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
                echo '</div>';	 //  Close the row
              }
              $counter++;    // Increase the counter
            }
            $result->free();
            
                echo '</div>';  // Close the container