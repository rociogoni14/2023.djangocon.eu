<?php

    if ( ( (count($_GET) == 1) && isset($_GET['pass']))  && ($_GET['pass'] == "pomelo") ) {
        echo "<h1>Check EVs</h1>";
    }else{
        header('HTTP/1.0 403 Forbidden');
        die();
    }

    if (array_key_exists('DB_NAME', $_ENV)) {
        echo "db: [".$_ENV["DB_NAME"]."]<br/>";
    }else{
        echo "DB_NAME Environment Variable Not Found<br/>";
    }

    if (array_key_exists('DB_SERVER', $_ENV)) {
        echo "servername: [".$_ENV["DB_SERVER"]."]<br/>";
    }else{
        echo "DB_SERVER Environment Variable Not Found<br/>";
    }
    echo "<h2>Include paths:</h2>";
    echo get_include_path();
?>