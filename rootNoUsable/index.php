<?php
//require 'header.php';
require 'user_nrequest.php';
?>
   
 <main>
     
     <?php
    
    if (isset($_SESSION['_ntUser'])) {
        echo '<p>Logged in</p>';
    }
    else {
        echo '<p>not logged inñ</p>';
    }
    
    
    ?>
     <p>main area</p>
     
     
 </main>

<?php
require"footer.php"
?>
































