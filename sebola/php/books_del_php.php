<?php
include ("./views/includes/connection.php");

$id_livro = $_GET["id_livro"];

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
?>
