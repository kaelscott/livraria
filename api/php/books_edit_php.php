<?php

include ("./includes/connection.php");

$id             = $_POST["txtId"];
$title          = $_POST["txtTitle"];
$author         = $_POST["txtAuthor"];
$pubDate        = $_POST["txtPubDate"];
$description    = $_POST["txtDesc"];
$category       = $_POST["txtCategory"];
$isbn           = $_POST["txtIsbn"];
$thumb          = $_POST["txtThumb"];

$sql = "UPDATE livro
        SET titulo='$title', autor='$author', data_publicacao='$pubDate', descricao='$description', categoria='$category', isbn='$isbn', thumbnail='$thumb'
        WHERE id='$id'";

$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: books_book.php?id=$id");
} else {
    echo "<script>alert('falha');</script>";
}

?>

