<?php
    $localhost = 'localhost';
    $dbname = 'crudPhpTarefaTLP';
    $username = 'root';
    $password = '';

    try {
        $connection = new PDO("mysql:host=$localhost; dbname=$dbname", $username, $password);
    } catch(PDOException $e) {
        die('<h2>Não foi possível conectar-se a base de dados.</h2>' . $e->getMessage());
    }
?>