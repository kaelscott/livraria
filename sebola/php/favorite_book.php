
<?php
session_start();
include ("./views/includes/connection.php");

$livro_favorito = $_POST['livro_favorito'];


if(isset($_SESSION['id_usuarios'])){  // se o usuário estiver logado pega o id dele
    $id_usuarios = $_SESSION['id_usuarios'];
} else {
    header("Location: ./views/login.php");
    exit();
}

// ve se o livro já está na lista de desejos
$query = "SELECT * FROM lista_desejo WHERE id_usuarios = $id_usuarios AND id_livro = $livro_favorito";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  // se o livro já está na lista de desejos, remove ele
  $query = "DELETE FROM lista_desejo WHERE id_usuarios = $id_usuarios AND id_livro = $livro_favorito";
} else {
  // se nao, adiciona ele
  $query = "INSERT INTO lista_desejo (id_usuarios, id_livro) VALUES ($id_usuarios, $livro_favorito)";
}

if ($conn->query($query) === TRUE) {
    header("Location: ./views/book.php?id_livro=$livro_favorito");
} else {
  echo "Erro ao atualizar lista de desejos: " . $conn->error;
}



$conn->close();

?>
