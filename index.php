<?php
session_start();
require 'conexao.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php
    include('navbar.php');

    ?>
    <div class="container mt-4">
        <?php
        include('mensagem.php');
        ?>
        <div class="raw">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Lista de usuario
                            <a href="usuario-creat.php" class="btn btn-primary float-end">Adicionar usuario</a>
                        </h4>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Data Nascimento</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM usuario";
                                $usuario = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($usuario) > 0) {
                                    foreach ($usuario as $usuarios) {
                                    }


                                ?>
                                    <tr>
                                        <td><?=$usuarios['id']?></td>
                                        <td><?=$usuarios['nome']?></td>
                                        <td><?=$usuarios['email']?>/td>
                                        <td><?=date('d/m/Y',strtotime($usuarios['data_nascimento']))?></td>
                                        <td>
                                            <a href="usuario-view.php?id=<?=$usuarios['id']?>" class="btn btn-secondary btn-sn">Visualizar</a>
                                            <a href="usuario-edit.php?id=<?=$usuarios['id']?>"class="btn btn-success btn-sn">Editar</a>
                                            <form action="acoes.php" Mmethod="POST" class="d-inline">
                                                <button onclick="return confirm('Tem certeza deu deseja excluir')" type="submit" name="delete_usuario" value="<?=$usuario['id']?>" class="btn btn-danger btn-sn">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } else {
                                    echo "<h5> Nenhum usuario cadastrado </h5>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>