<?php include ("./views/includes/connection.php");


$email = $_POST['txtEmail'];
$senha = password_hash($_POST['txtPassword'], PASSWORD_DEFAULT);

$query_select = "SELECT email FROM usuarios WHERE email = '$email'";
$select = $conn->query($query_select);
if($select->num_rows > 0){
    echo "Este email já está cadastrado";
} else {
    $query_insert = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')";
    $insert = $conn->query($query_insert);
    if($insert){
        echo "Usuário cadastrado com sucesso!";
        // Inicie uma nova sessão ou continue a sessão existente
        session_start();
        // Armazene os dados do usuário na sessão
        $_SESSION['email'] = $email;
        // Redirecione o usuário para a página inicial ou painel
        header('Location: ./views/home.php');
    } else {
        echo "Houve um erro ao cadastrar o usuário";
    }
}

?>