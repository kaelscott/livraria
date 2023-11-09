<html>
    <head>
        <title>Sistema</title>
        <style>
            table td {
                text-align: center;
            }

            .descricao {
                height: 80px !important;
                overflow-y: auto;
            }

            .thumb{
                width: 100px !important;
                overflow: scroll;
            }
        </style>
    </head>
    <body>

        <?php
            include("connection.php");

            $sql = "SELECT id, titulo, autor, data_publicacao, descricao,categoria, preco, isbn, thumbnail FROM livro";
            $result = $conn->query($sql);
        ?>

        Número de registros na tabela: <?php echo $result->num_rows?><br><br>

        <a href="books_add.php">+ Adicionar Registro</a>

        <br><br>
        <table border=1 width=100%>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Data Publicação</th>
                <th>Descricao</th>
                <th>Categoria</th>
                <th>Preco</th>
                <th>ISBN</th>
                <th>Capa <\link></th>
                <th colspan=2>Ações</th>
            </tr>
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td>
                    <a href="books_book.php?id=<?php echo $row['id']?>">
                        <?php echo $row['id']?>
                    </a>
                </td>
                <td><?php echo $row['titulo']?></td>
                <td><?php echo $row['autor']?></td>
                <td><?php echo $row['data_publicacao']?></td>
                <td>
                    <div class="descricao">
                        <?php echo $row['descricao']?>
                    </div>
                </td>
                <td><?php echo $row['categoria']?></td>
                <td><?php echo $row['preco']?></td>
                <td><?php echo $row['isbn']?></td>
                <td>
                    <div class="thumb">
                        <?php echo $row['thumbnail']?>
                    </div>
                </td>
                <td>
                    <a href="books_edit.php?id=<?php echo $row['id']?>">
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
                location.href = `books_del_php.php?id=${id}`
            }
        }
    </script>

</html>