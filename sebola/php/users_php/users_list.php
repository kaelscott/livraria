<html>
    <head>
        <title>Sistema</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
            thead {
                text-align: center;
            }

            .descricao {
                height: 120px !important;
                overflow-y: auto;
            }

        </style>

    </head>
    <body>

        <?php
            include ("../views/includes/connection.php");

            session_start();
            if (!isset($_SESSION["isAdmin"])) {
                header("Location: ./views/home.php");
            }


            $sql = "SELECT id_usuarios, email, senha, isAdmin FROM usuarios";
            $result = $conn->query($sql);
        ?>

        <div class="d-flex justify-content-between align-items-center mx-4">
            <div class="fw-bold fs-5"> Número de registros na tabela: <?php echo $result->num_rows?> </div>
            <a href="../views/home.php"><img src="../../image/sebola logo.png" alt="logo"></a>
        </div>

        <br>
        <table class="table table-hover table-striped table-bordered border-secondary">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Admin</th>
                    <th scope="col" colspan=2>Ações</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td scope="row">
                        <a href="users_user.php?id_usuarios=<?php echo $row['id_usuarios']?>">
                            <?php echo $row['id_usuarios']?>
                        </a>
                    </td>
                    <td scope="row"><?php echo $row['email']?></td>
                    <td scope="row"><?php echo $row['senha']?></td>
                    <td scope="row"><?php echo $row['isAdmin']?></td>
                    <td>
                        <a href="users_edit.php?id_usuarios=<?php echo $row['id_usuarios']?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a href="#" onclick="remove(<?php echo $row['id_usuarios']?>)">
                            Excluir
                        </a>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </body>

    <script>
        function remove(id_usuarios) {
            if (confirm("Tem certeza que quer deletar?")) {
                location.href = `users_del_php.php?id_usuarios=${id_usuarios}`
            }
        }
    </script>

</html>