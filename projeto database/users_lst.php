<html>
    <head>
        <title>Sistema</title>
        <style>
            table td {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php
            include("connection.php");

            session_start();
            if (!isset($_SESSION["id"])) {
                header("Location: index.php");
            }

            $sql = "SELECT id, nome, cidade FROM users";
            $result = $conn->query($sql);
        ?>
        
        Número de registros na tabela: <?php echo $result->num_rows?><br><br>

        <a href="users_add.php">+ Adicionar Registro</a>

        <br><br>
        <table border=1 width=100%>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Cidade</th>
                <th colspan=2>Ações</th>
            </tr>
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td>
                    <a href="users_user.php?id=<?php echo $row['id']?>">
                        <?php echo $row['id']?>
                    </a>
                </td>
                <td><?php echo $row['nome']?></td>
                <td><?php echo $row['cidade']?></td>
                <td>
                    <a href="users_edit.php?id=<?php echo $row['id']?>">
                        Editar
                    </a>
                </td>
                <td>
                    <a href="#" onclick="remove(<?php echo $row['id']?>)">
                        Excluir
                    </a>
                </td>
            </tr>
            <?php
                    }
                }
            ?>
        </table>
    </body>

    <script>
        function remove(id) {
            if (confirm("Tem certeza que quer deletar?")) {
                location.href = `users_del_php.php?id=${id}`
            }
        }
    </script>

</html>