<?php
session_start();
include ("./views/includes/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_livro = $_POST['id_livro'];
    $comentario = $_POST['comentario'];
    $id_usuarios = $_SESSION['id_usuarios'];

    $sql = "INSERT INTO comentarios (id_usuarios, id_livro, comentario) VALUES ('$id_usuarios', '$id_livro', '$comentario')";
    if (mysqli_query($conn, $sql)) {
        echo "Comentário adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }
}

header("Location: ./views/book.php?id_livro=$id_livro");
?>
