<?php
session_start();
include("./views/includes/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {  // se o método de requisição for POST, ele adiciona o comentário no banco de dados
    $id_livro = $_POST['id_livro'];
    $comentario = $_POST['comentario'];
    $id_usuario = $_SESSION['id_usuario'];

    $sql = "INSERT INTO comentarios (id_usuario, id_livro, comentario) VALUES ('$id_usuario', '$id_livro', '$comentario')";
    if (mysqli_query($conn, $sql)) {
        echo "Comentário adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }
}

header("Location: ./views/book.php?id_livro=$id_livro");
