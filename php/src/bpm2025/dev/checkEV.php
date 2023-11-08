<?php
    if (array_key_exists('DB_NAME', $_ENV)) {
        echo "db:".$_ENV["DB_NAME"]."<br/>";
    }else{
        echo "DB_NAME Environment Variable Not Found<br/>";
    }

    if (array_key_exists('DB_SERVERNAME', $_ENV)) {
        echo "servername:".$_ENV["DB_SERVERNAME"]."<br/>";
    }else{
        echo "DB_SERVERNAME Environment Variable Not Found<br/>";
    }

?>