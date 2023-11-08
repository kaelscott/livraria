<html>
    <head>
        <title>Sistema</title>
    </head>
    <body>
        <?php
            include ("./includes/connection.php");

            if (isset($_GET["id"])) {
                $id = $_GET["id"];

                $sql = "SELECT id, titulo, autor, data_publicacao, descricao,categoria, preco, isbn, thumbnail FROM livro WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "id:               $id<br>";
                        echo "titulo:           {$row['titulo']}<br>";
                        echo "autor:            {$row['autor']}<br>";
                        echo "data_publicacao:  {$row['data_publicacao']}<br>";
                        echo "descricao:        {$row['descricao']}<br>";
                        echo "categoria:        {$row['categoria']}<br>";
                        echo "isbn:             {$row['isbn']}<br>";
        ?>              <p>thumbnail:</p>       <img src="<?php echo $row['thumbnail'];?>"> <br> <?php
                    }
                }
            }
        ?>

        <br>
        <button>
            <a href="books_list.php">Voltar</a>
        </button>

    </body>
</html>