<html>
    <head>
        <title>Sistema</title>
    </head>
<body>

    <?php
        include ("./views/includes/connection.php");

        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $sql = "SELECT id, titulo, autor, data_publicacao, descricao,categoria, preco, isbn, thumbnail FROM livro WHERE id = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $title          = $row["titulo"];
                    $author         = $row["autor"];
                    $pubDate        = $row["data_publicacao"];
                    $description    = $row["descricao"];
                    $category       = $row["categoria"];
                    $price          = $row["preco"];
                    $isbn           = $row["isbn"];
                    $thumb          = $row["thumbnail"];
                }
            }
        }
    ?>

    <h1>Edição de livro</h1>
    <form id="form1" name="form1" method="POST" action="books_edit_php.php">
        <b>Titulo:</b>
        <input type="text" name="txtTitle" value="<?php echo $title?>" required> <br>

        <b>Autor:</b>
        <input type="text" name="txtAuthor" value="<?php echo $author?>" required> <br>

        <b>Data da publicacao:</b>
        <input type="text" name="txtPubDate" value="<?php echo $pubDate?>" required> <br>

        <b>Descricao:</b>
        <input type="text" name="txtDesc" value="<?php echo $description?>" required> <br>

        <b>Categoria:</b>
        <input type="text" name="txtCategory" value="<?php echo $category?>" required> <br>

        <b>Preço:</b>
        <input type="text" name="txtPrice" value="<?php echo $price?>" required> <br>

        <b>ISBN:</b>
        <input type="text" name="txtIsbn" value="<?php echo $isbn?>"> <br>

        <b>Capa:</b>
        <input type="text" name="txtThumb" value="<?php echo $thumb?>" required> <br>

        <input type="hidden" name="txtId" value="<?php echo $id?>"><br><br>
        <input type="submit" value="Enviar">
    <form>

</body>
</html>