<?php
    require_once "./connection.php";

    if(isset($_POST['btn_eliminar'])) {
        $cod = $_POST['btn_eliminar'];
        
        $query = "delete from coord_turmas where cod = :cod";
        $stmt = $connection->prepare($query);
        $stmt->execute(array('cod' => $cod));
    }

    header("Location: " . './index.php');
?>