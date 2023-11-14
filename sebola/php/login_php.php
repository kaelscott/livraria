<?php include ("./views/includes/connection.php");

$email = $_POST["txtEmail"];
$password = $_POST["txtPassword"];
$remember = isset($_POST["chkRemember"]) ? $_POST["chkRemember"] : '';

// Prepare a consulta SQL
$stmt = $conn->prepare("SELECT id_usuarios, senha, isAdmin FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);

// Execute a consulta
$stmt->execute();

// Obtenha o resultado
$result = $stmt->get_result();

$error = "Email ou senha incorretos";

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if(password_verify($password, $row["senha"])) {
            session_start();
            $_SESSION["id_usuarios"] = $row["id_usuarios"];
            $_SESSION["isAdmin"] = $row["isAdmin"]; // Defina a variável de sessão isAdmin
            $_SESSION["loggedIn"] = true;
            // Se o usuário marcar a opção "lembrar-me", armazene o ID do usuário em um cookie
            if($remember) {
                setcookie("id_usuarios", $row["id_usuarios"], time() + (86400 * 30), "/"); // 86400 = 1 dia
            }
            header('Location: ./views/home.php');
            exit();
        }

    }
}

session_start();
$_SESSION["error"] = $error;
header('Location: ./views/login.php');
?>