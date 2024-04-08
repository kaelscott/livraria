<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>




    <div class="container">
        <form id="form1" name="form1" method="POST" action="books_add_php.php">

            <h1>Adicionar livro</h1>
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text" class="form-control" name="txtTitle" id="titulo" required>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor:</label>
                <input type="text" class="form-control" name="txtAuthor" id="autor" required>
            </div>
            <div class="mb-3">
                <label for="publicacao" class="form-label">Data da publicacao:</label>
                <input type="text" class="form-control" name="txtPubDate" id="publicacao" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao:</label>
                <input type="text" class="form-control" name="txtDesc" id="descricao" required>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <input type="text" class="form-control" name="txtCategory" id="categoria" required>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço:</label>
                <input type="text" class="form-control" name="txtPrice" id="preco" required>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN:</label>
                <input type="text" class="form-control" name="txtIsbn" id="isbn">
            </div>
            <div class="mb-3">
                <label for="capa" class="form-label">Capa:</label>
                <input type="text" class="form-control" name="txtThumb" id="capa" required>
            </div>


            <input type="hidden" name="txtIdBook" value="<?php echo $id_livro?>"><br><br>
            <input type="submit" class="btn btn-primary" value="Enviar">
        <form>
    </div>

</body>
</html>