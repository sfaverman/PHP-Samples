<?php

//link to manual: https://www.php.net/manual/en/pdo.connections.php

//Example 1: Simple Connect to database

/*
$pdo = new PDO("mysql:host=localhost:8889;dbname=webd166", 'root', 'root');
echo 'connected to webd166';
*/


//Example 2: Connect to database and handle connection errors

try {
    $dbh = new PDO("mysql:host=localhost:8889;dbname=webd166", 'root', 'root');
    foreach($dbh->query('SELECT * from students') as $row) {
        //print_r($row);
		echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].'<br>';
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>
