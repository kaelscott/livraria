<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Adcionar livro</h1>
    <form id="form1" name="form1" method="POST" action="books_add_php.php">

        <b>Titulo:</b>
        <input type="text" name="txtTitle" required> <br>

        <b>Autor:</b>
        <input type="text" name="txtAuthor" required> <br>

        <b>Data da publicacao:</b>
        <input type="text" name="txtPubDate" required> <br>

        <b>Descricao:</b>
        <input type="text" name="txtDesc" required> <br>

        <b>Categoria:</b>
        <input type="text" name="txtCategory" required> <br>

        <b>ISBN:</b>
        <input type="text" name="txtIsbn"> <br>

        <b>Capa:</b>
        <input type="text" name="txtThumb" required> <br>

        <input type="hidden" name="txtIdBook" value="<?php echo $id_livro?>"><br><br>
        <input type="submit" value="Enviar">
    <form>

</body>
</html>