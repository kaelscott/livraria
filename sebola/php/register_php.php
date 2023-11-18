<?php include ("./views/includes/connection.php");

session_start();

$email = $_POST['txtEmail'];
$senha = $_POST['txtPassword'];

// Verifique se o email ou a senha estão vazios
if(empty($email) || empty($senha)) {
    $_SESSION["error"] = "Email e senha são obrigatórios.";
    header('Location: ./views/register.php');
    exit;
}

$senha = password_hash($senha, PASSWORD_DEFAULT);

// Use consultas preparadas para evitar injeção SQL
$stmt = $conn->prepare("SELECT email FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    $_SESSION["error"] = "Email já cadastrado.";
    header('Location: ./views/register.php');
    exit;
} else {
    $stmt = $conn->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        echo "Usuário cadastrado com sucesso!";

        // Redirecione o usuário para a página inicial ou painel
        header('Location: ./views/login.php');
    } else {
        echo "Houve um erro ao cadastrar o usuário";
    }
}

?>