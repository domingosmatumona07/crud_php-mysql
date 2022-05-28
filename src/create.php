<?php
    require_once "./connection.php";

    if(isset($_POST['nome']) && isset($_POST['turma'])) {
        $nome = $_POST['nome'];
        $turma = $_POST['turma'];

        $query = "insert into coord_turmas(nome, turma) values(:nome, :turma)";
        $stmt = $connection->prepare($query);
        $stmt->execute(array('nome' => $nome, 'turma' => $turma));
    }

    header("Location: " . './addCoord.html');
?>