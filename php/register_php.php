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

$senha = password_hash($senha, PASSWORD_DEFAULT);  // criptografa a senha, PASSWORD_DEFAULT faz com que o algoritmo de criptografia seja atualizado automaticamente

// evitar injeção SQL
$stmt = $conn->prepare("SELECT email FROM usuarios WHERE email = ?");  // ? significa que o valor será passado depois
$stmt->bind_param("s", $email);  // "s" significa que o valor é uma string
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){  // se o email já estiver cadastrado
    $_SESSION["error"] = "Email já cadastrado.";
    header('Location: ./views/register.php');
    exit;
} else {  // se o email não estiver cadastrado, insere o usuário no banco de dados
    $stmt = $conn->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $senha);  // "ss" significa que os valores são strings
    $stmt->execute();

    if($stmt->affected_rows > 0){
        echo "Usuário cadastrado com sucesso!";

        header('Location: ./views/login.php');
    } else {
        echo "Houve um erro ao cadastrar o usuário";
    }
}

?>