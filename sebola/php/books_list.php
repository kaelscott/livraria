<html>
    <head>
        <title>Sistema</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
            thead {
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
            include ("./views/includes/connection.php");

            session_start();
            if (!isset($_SESSION["isAdmin"])) {
                header("Location: ./views/home.php");
            }


            $sql = "SELECT id_livro, titulo, autor, data_publicacao, descricao,categoria, preco, isbn, thumbnail FROM livro";
            $result = $conn->query($sql);
        ?>

        <div class="fw-bold fs-5"> Número de registros na tabela: <?php echo $result->num_rows?> </div>

        <a href="books_add.php">+ Adicionar Registro</a>

        <br><br>
        <table class="table table-hover table-striped table-bordered border-secondary">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Data Publicação</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Preco</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Capa <\link></th>
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
                        <a href="books_book.php?id_livro=<?php echo $row['id_livro']?>">
                            <?php echo $row['id_livro']?>
                        </a>
                    </td>
                    <td scope="row"><?php echo $row['titulo']?></td>
                    <td scope="row"><?php echo $row['autor']?></td>
                    <td scope="row"><?php echo $row['data_publicacao']?></td>
                    <td scope="row">
                        <div class="descricao">
                            <?php echo $row['descricao']?>
                        </div>
                    </td>
                    <td scope="row"><?php echo $row['categoria']?></td>
                    <td scope="row"><?php echo $row['preco']?></td>
                    <td scope="row"><?php echo $row['isbn']?></td>
                    <td scope="row">
                        <div class="thumb">
                            <?php echo $row['thumbnail']?>
                        </div>
                    </td>
                    <td>
                        <a href="books_edit.php?id_livro=<?php echo $row['id_livro']?>">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a href="#" onclick="remove(<?php echo $row['id_livro']?>)">
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
        function remove(id_livro) {
            if (confirm("Tem certeza que quer deletar?")) {
                location.href = `books_del_php.php?id_livro=${id_livro}`
            }
        }
    </script>

</html>