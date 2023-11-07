<html>
    <head>
        <title>Sistema</title>
    </head>
    <body>
        <?php
            include("connection.php");

            if (isset($_GET["id"])) {
                $id = $_GET["id"];

                $sql = "SELECT id, nome, cidade FROM users WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "id: $id<br>";
                        echo "Nome: {$row['nome']}<br>";
                        echo "Cidade: {$row['cidade']}";
                    }
                }
            }
        ?>

        <br>
        <button>
            <a href="users_lst.php">Voltar</a>
        </button>

    </body>
</html>