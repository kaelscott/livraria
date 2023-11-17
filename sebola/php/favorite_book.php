<?php
session_start(); // Inicia a sessão
include ("./views/includes/connection.php");

// Get the book ID from the form
$livro_favorito = $_POST['livro_favorito'];

// Verifique se 'id_usuarios' está definido na sessão
if(isset($_SESSION['id_usuarios'])){
    $id_usuarios = $_SESSION['id_usuarios'];
} else {
    // Trate o caso em que 'id_usuarios' não está definido na sessão
    echo "id_usuarios não está definido na sessão.";
    exit();
}

// Check if the book is already in the wishlist
$query = "SELECT * FROM lista_desejo WHERE id_usuarios = $id_usuarios AND id_livro = $livro_favorito";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  // The book is in the wishlist, remove it
  $query = "DELETE FROM lista_desejo WHERE id_usuarios = $id_usuarios AND id_livro = $livro_favorito";
} else {
  // The book is not in the wishlist, add it
  $query = "INSERT INTO lista_desejo (id_usuarios, id_livro) VALUES ($id_usuarios, $livro_favorito)";
}

if ($conn->query($query) === TRUE) {
    header("Location: ./views/book.php?id_livro=$livro_favorito");
} else {
  echo "Erro ao atualizar lista de desejos: " . $conn->error;
}



$conn->close();

?>
