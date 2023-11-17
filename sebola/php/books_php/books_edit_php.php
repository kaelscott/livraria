<?php

include ("../views/includes/connection.php");

$id_livro       = $_POST["txtIdBook"];
$title          = $_POST["txtTitle"];
$author         = $_POST["txtAuthor"];
$pubDate        = $_POST["txtPubDate"];
$description    = $_POST["txtDesc"];
$category       = $_POST["txtCategory"];
$price          = $_POST["txtPrice"];
$isbn           = $_POST["txtIsbn"];
$thumb          = $_POST["txtThumb"];

$sql = "UPDATE livro
        SET titulo='$title', autor='$author', data_publicacao='$pubDate', descricao='$description', categoria='$category', preco='$price',isbn='$isbn', thumbnail='$thumb'
        WHERE id_livro='$id_livro'";

$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: books_book.php?id_livro=$id_livro");
} else {
    echo "<script>alert('falha');</script>";
}

?>

