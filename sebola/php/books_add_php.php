<?php
include ("./views/includes/connection.php");

$id_livro       = $_POST["txtIdBook"];
$title          = $_POST["txtTitle"];
$author         = $_POST["txtAuthor"];
$pubDate        = $_POST["txtPubDate"];
$description    = $_POST["txtDesc"];
$category       = $_POST["txtCategory"];
$isbn           = $_POST["txtIsbn"];
$thumb          = $_POST["txtThumb"];


$sql = "INSERT INTO livros (titulo, autor, data_publicacao, descricao,categoria, preco, isbn, thumbnail)
        VALUES ('$title', '$author', '$pubDate', '$description', '$category', '$isbn', '$thumb', )";

$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: books_list.php");
} else {
?>

<script>
    alert("falha");
</script>

<?php
    }
?>