<?php
    $host = 'localhost';
    $dbname = 'dbmonitoria';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        echo "Conectado a $dbname em $host com sucesso.";
    } catch (PDOException $pe) {
        die("Não foi possível se conectar ao banco de dados $dbname :" . $pe->getMessage());
    }

?>