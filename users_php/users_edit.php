<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Sistema</title>
</head>

<body>

    <?php
    include("../views/includes/connection.php");

    if (isset($_GET["id_usuario"])) {
        $id_usuario = $_GET["id_usuario"];

        $sql = "SELECT id_usuario, email, senha, isAdmin FROM usuarios WHERE id_usuario = $id_usuario";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $email          = $row["email"];
                $password       = $row["senha"];
                $isAdmin        = $row["isAdmin"];
            }
        }
    }
    ?>

    <h1>Edição de usuario</h1>
    <form id="form1" name="form1" method="POST" action="users_edit_php.php">
        <b>Torna-lo admin? (1 = sim / 0 = não)</b>
        <input type="text" name="txtAdmin" pattern="[0-1]" title="Digite apenas 0 ou 1" value="<?php echo $isAdmin ?>" required> <br>

        <input type="hidden" name="txtIdUser" value="<?php echo $id_usuario ?>"><br>
        <input type="submit" value="Enviar">
        <form>


</body>

</html>