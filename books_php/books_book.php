<html>
    <head>
        <title>Sistema</title>
    </head>
    <body>
        <?php
            include ("../views/includes/connection.php");


            if (isset($_GET["id_livro"])) {
                $id_livro = $_GET["id_livro"];

                if (!empty($id_livro)) {
                    $sql = "SELECT id_livro, titulo, autor, data_publicacao, descricao, categoria, preco, isbn, thumbnail FROM livro WHERE id_livro = $id_livro";
                    $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "id:               $id_livro<br>";
                        echo "titulo:           {$row['titulo']}<br>";
                        echo "autor:            {$row['autor']}<br>";
                        echo "data_publicacao:  {$row['data_publicacao']}<br>";
                        echo "descricao:        {$row['descricao']}<br>";
                        echo "categoria:        {$row['categoria']}<br>";
                        echo "preco:            {$row['preco']}<br>";
                        echo "isbn:             {$row['isbn']}<br>";
                        echo "capa: <br>  <img src='".$row['thumbnail']."' alt='".$row['titulo']."' <br>";
                    }
                }
                } else {
                    echo "ID do livro não fornecido.";
                }
            } else {
                echo "ID do livro não fornecido.";
            }
        ?>

        <br>
        <button>
            <a href="books_list.php">Voltar</a>
        </button>

    </body>
</html>