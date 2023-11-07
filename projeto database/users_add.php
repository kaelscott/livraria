<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Adcionar usuario</h1>
    <form id="form2" name="form2" method="post" action="users_add_php.php">
        <b>Nome:</b><br>
        <input type="text" name="txtName"><br>
        <b>Cidade:</b><br>
        <input type="text" name="txtCity">
        <input type="hidden" name="txtId" value="<?php echo $id?>">
        <br><br>
        <input type="submit" value="Enviar">
    <form>

</body>
</html>