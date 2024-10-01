
<?php
session_start();
include("./views/includes/connection.php");

$livro_favorito = $_POST['livro_favorito'];


if (isset($_SESSION['id_usuario'])) {  // se o usuário estiver logado pega o id dele
  $id_usuario = $_SESSION['id_usuario'];
} else {
  header("Location: ./views/login.php");
  exit();
}

// ve se o livro já está na lista de desejos
$query = "SELECT * FROM lista_desejo WHERE id_usuario = $id_usuario AND id_livro = $livro_favorito";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  // se o livro já está na lista de desejos, remove ele
  $query = "DELETE FROM lista_desejo WHERE id_usuario = $id_usuario AND id_livro = $livro_favorito";
} else {
  // se nao, adiciona ele
  $query = "INSERT INTO lista_desejo (id_usuario, id_livro) VALUES ($id_usuario, $livro_favorito)";
}

if ($conn->query($query) === TRUE) {
  header("Location: ./views/book.php?id_livro=$livro_favorito");
} else {
  echo "Erro ao atualizar lista de desejos: " . $conn->error;
}



$conn->close();

?>
