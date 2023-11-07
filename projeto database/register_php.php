<?php
    include("connection.php");

    $login = $_POST["txtLogin"];
    $password = $_POST["txtPassword"];

    // protecao contra sql injection
    $login = mysqli_real_escape_string($conn, $login);
    $password = mysqli_real_escape_string($conn, $password);

    // verifica se o login ja esta em uso
    $sql_check = "SELECT * FROM login WHERE login='$login'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "
            <script>
                alert('Login em uso, escolha outro')
                history.go(-1);
            </script>";
    } else {
        $sql_insert = "INSERT INTO login (login, password) VALUES ('$login','$password')";

        if($conn->query($sql_insert) === TRUE) {
            echo "<script> alert('registrado'); </script>";
            header("Location: index.php");
        } else {
            echo `<script> alert('erro ${$conn->error}')  </script>`;
        }
    }

    $conn->close();
?>