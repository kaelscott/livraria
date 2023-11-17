<?php
include ("../views/includes/connection.php");

$id_usuarios = $_GET["id_usuarios"];

mysqli_query($conn, "SET foreign_key_checks = 0");

$sql = "DELETE FROM usuarios WHERE id_usuarios='$id_usuarios'";
$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: users_list.php");
} else {
?>

<script>
    alert("falha");
</script>

<?php
    }
mysqli_query($conn, "SET foreign_key_checks = 1");
?>
