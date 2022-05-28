<?php
    require_once "./connection.php";

    $query = "select * from coord_turmas";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    $datas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap.min.js">
</head>
<body>
    <section style="width: 900px; margin: auto">
        <h1>Coordenadores de Turma</h1>
        <table class="table table-striped" style="box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.4)">
            <thead class="table-dark">
                <th>Código</th>
                <th>Nome</th>
                <th>Turma</th>
                <th>Opções</th>
            </thead>
            <tbody>
                <?php foreach ($datas as $row) {?>
                <tr>
                    <td><?= $row['cod'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td><?= $row['turma'] ?></td>
                    <td style="display: flex; gap: 0.5rem">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" value="<?= $row['cod'] ?>" name="btn_editar">Editar</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="./update.php" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Atualizar dados</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome</label>
                                            <input type="text" name="nome" class="form-control" id="nome">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Turma</label>
                                            <input type="text" name="turma" class="form-control" id="turma">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary" name="atualizar" value="<?= $row['cod'] ?>">Atualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>

                        <form method="POST" action="./delete.php"> 
                            <button type="submit" class="btn btn-danger" value="<?= $row['cod'] ?>" name="btn_eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        
    </section>

    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/magnify/jquery.magnific-popup.min.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/bootstrap.bundle.js.map"></script>
    <script src="./js/jquery.magnific-popup.min.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>