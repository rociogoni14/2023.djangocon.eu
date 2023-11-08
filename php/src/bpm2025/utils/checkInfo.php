<?php
  
    
    if ( ( (count($_GET) == 1) && isset($_GET['pass']))  && ($_GET['pass'] == "pomelo") ) {
        echo "<h1>Server Info</h1>";
    }else{
        header('HTTP/1.0 403 Forbidden');
        die();
    }

    echo 'Current PHP version: ' . phpversion();
?>