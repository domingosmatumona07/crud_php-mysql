<?php
    require_once "./connection.php";

    if(isset($_POST['atualizar']) && isset($_POST['nome']) && isset($_POST['turma'])) {
        $cod = $_POST['atualizar'];
        $nome = $_POST['nome'];
        $turma = $_POST['turma'];

        $query = "update coord_turmas set nome = :nome, turma = :turma where cod = :cod";
        $stmt = $connection->prepare($query);
        $stmt->execute(array('nome' => $nome, 'turma' => $turma, 'cod' => $cod));
    }

    header("Location: " . './index.php');
?>