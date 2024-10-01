<html>

<head>
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
                echo "id:       $id_usuario<br>";
                echo "email:    {$row['email']}<br>";
                echo "senha:    {$row['senha']}<br>";
                echo "isAdmin:  {$row['isAdmin']}<br>";
            }
        }
    } else {
        echo "Nenhum registro encontrado";
    }
    ?>

    <br>
    <button>
        <a href="users_list.php">Voltar</a>
    </button>

</body>

</html>