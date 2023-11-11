<?php
include ("./views/includes/connection.php");

$id = $_GET["id"];

$sql = "DELETE FROM livro WHERE id='$id'";
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
