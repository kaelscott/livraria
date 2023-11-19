<?php
include ("../views/includes/connection.php");

$id_livro = $_GET["id_livro"];

mysqli_query($conn, "SET foreign_key_checks = 0");  // desabilita a verificação de chaves estrangeiras

$sql = "DELETE FROM livro WHERE id_livro='$id_livro'";
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
mysqli_query($conn, "SET foreign_key_checks = 1");
?>
