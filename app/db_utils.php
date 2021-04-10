
<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);




function getDbCredentials() {
    $result = [];
    $credentialsFile = fopen('../db_credentials.txt', 'r');
    while(! feof($credentialsFile)) {
        $line = fgets($credentialsFile);
        $args = explode('=',trim($line));
        $result[$args[0]] = $args[1];
    }
    fclose($credentialsFile);

    return $result;
}

function connectToDatabase($hostname, $user, $password, $database, $port) {
    $connection = new mysqli($hostname, $user, $password, $database, $port);
    if ($connection->connect_error) {
        die('Connection problem');
        echo "---<br />";
        var_export($connection);
        echo "---<br />";
        return null;
    }

    return $connection;
}

function executeQuery($connection, $query) {
    $query_result = $connection->query($query);
    return $query_result;
}



function getDbConnection() {
    
    $dbCredentials = getDbCredentials();
    return  connectToDatabase(
        $dbCredentials['hostname'],
        $dbCredentials['user'],
        $dbCredentials['password'],
        $dbCredentials['database'],
        $dbCredentials['port']
    );
}

?>