<?php include("./views/includes/connection.php");

$email = $_POST["txtEmail"];
$password = $_POST["txtPassword"];

// statement que previne SQL injection
$stmt = $conn->prepare("SELECT email, id_usuario, senha, isAdmin FROM usuarios WHERE email = ?");  // ? significa que o valor será passado depois
$stmt->bind_param("s", $email);  // "s" significa que o valor é uma string

$stmt->execute();  // executa a query
$result = $stmt->get_result();  // pega o resultado da query

$error = "Email ou senha incorretos";

if ($result->num_rows > 0) {  // se o email existir no banco de dados
    while ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row["senha"])) {  // se a senha estiver correta
            session_start();
            $_SESSION["email"] = $row["email"];
            $_SESSION["id_usuario"] = $row["id_usuario"];
            $_SESSION["isAdmin"] = $row["isAdmin"];
            $_SESSION["loggedIn"] = true;

            header('Location: ./views/home.php');
            exit();
        }
    }
}
session_start();
$_SESSION["error"] = $error;
header('Location: ./views/login.php');
