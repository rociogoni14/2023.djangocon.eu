<?php
    $logfilename = "log.txt";

    // For developlment environment, this vars are overrided  
    //  with the values in docker-compose.yaml
    
    if (array_key_exists('LOG_FILENAME', $_ENV)) {
        $logfilename = $_ENV["LOG_FILENAME"];   
    }
    
    if ( ( (count($_GET) == 1) && isset($_GET['pass']))  && ($_GET['pass'] == "pomelo") ) {
        echo "<html><head></head><body onload='window.scrollTo(0, document.body.scrollHeight);'>";
        echo "<h1>Log Content (".$logfilename.")</h1>";
    }else{
        header('HTTP/1.0 403 Forbidden');
        die();
    }

    $logfile = dirname(__FILE__)."/../".$logfilename;

    $fh = fopen($logfile,'r');
    echo "<pre>";
    
    while ($line = fgets($fh)) {
       echo($line);
    }

    fclose($fh);

    echo "</pre></body></html>";


?>