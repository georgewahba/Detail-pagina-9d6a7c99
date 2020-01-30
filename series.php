<?php

$host = '127.0.0.1';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

echo 'serie ' . htmlspecialchars($_GET["id"]);
$id = htmlspecialchars($_GET["id"]);


$info = $pdo->query('SELECT * FROM series WHERE id = ' . $_GET['id']);
foreach ($info as $show) {
    foreach ($show as $key => $value) {
        if ($key != 'id'){
            echo "<span style='font-weight:bold'>". $key . "</span>: " . $value . "<br>";
        }
    }

}


?>