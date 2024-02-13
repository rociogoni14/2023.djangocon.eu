<?php
    error_reporting(E_ERROR | E_PARSE);

    function getConnection(){

        $host = 'localhost';
        $user = 'bpm2025_user';
        $pass = 'bpm2025_password';
        $db = 'BPM2025';
        $logfilename = "bpm2025_log.txt";

        // For developlment environment, this vars are overrided  
        //  with the values in docker-compose.yaml
        
       // if (array_key_exists('LOG_FILENAME', $_ENV)) {
       //     $logfilename = $_ENV["LOG_FILENAME"];   
       // }
        
       // $logfile = dirname(__FILE__)."/../".$logfilename;

        
       // if (array_key_exists('DB_SERVER', $_ENV)) {
       //     $host = $_ENV["DB_SERVER"];   
       // }
        
       // if (array_key_exists('DB_USER', $_ENV)) {
       //    $user = $_ENV["DB_USER"];
       // }
        
       // if (array_key_exists('DB_PWD', $_ENV)) {
       //     $pass = $_ENV["DB_PWD"];
       // }
        
       // if (array_key_exists('DB_NAME', $_ENV)) {
       //     $db = $_ENV["DB_NAME"];
       // }

        try{
            
            $conn = new mysqli($host, $user, $pass, $db);

        }catch(Exception $e){
            $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
            "ERROR Connect failed: (db <".$db."> , host <".$host.">) ".$conn->connect_error.PHP_EOL.
            "#############################################################################".PHP_EOL;
            file_put_contents($logfile, $log, FILE_APPEND);
            header("Location: /2023.djangocon.eu/php/src/bpm2025/maintenance.html?code=311");
            exit();
        }

        if ($conn->connect_errno) {
            echo "Debug Information: " . PHP_EOL;
    	    echo "User: " . $_SERVER['REMOTE_ADDR'] . PHP_EOL;
   	    echo "Date: " . date("F j, Y, g:i a") . PHP_EOL;
    	    echo "DB: " . $db . PHP_EOL;
   	    echo "Host: " . $host . PHP_EOL;
    	    echo "User: " . $user . PHP_EOL;
    	    echo "Pass: " . $pass . PHP_EOL;
	    echo "Log File: " . $logfile . PHP_EOL;
	    	
	    $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
            "ERROR Connect failed: (db <".$db."> , host <".$host.">) ".$conn->connect_error.PHP_EOL.
            "#############################################################################".PHP_EOL;
            file_put_contents($logfile, $log, FILE_APPEND);
            echo "Log File content: " . $log . PHP_EOL;
	    //header("Location: /2023.djangocon.eu/php/src/bpm2025/maintenance.html?code=312");
            exit();
        }else{
            return $conn;
        }
    }

?>
