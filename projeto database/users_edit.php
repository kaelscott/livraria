<html>
    <head>
        <title>Sistema</title>
    </head>
<body>

    <?php
        include("connection.php");

        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $sql = "SELECT id, nome, cidade FROM users WHERE id=$id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = $row["nome"];
                    $city = $row["cidade"];
                }
            }
        }
    ?>

    <h1>Edição de Usuário</h1>
    <form id="form1" name="form1" method="post" action="users_edit_php.php">
        <b>Nome:</b><br>
        <input type="text" name="txtName" value="<?php echo $name?>"><br>
        <b>Cidade:</b><br>
        <input type="text" name="txtCity" value="<?php echo $city?>">
        <input type="hidden" name="txtId" value="<?php echo $id?>"><br><br>
        <input type="submit" value="Enviar">
    <form>

</body>
</html>