<?php
include("../views/includes/connection.php");

$id_usuario = $_GET["id_usuario"];

mysqli_query($conn, "SET foreign_key_checks = 0");

$sql = "DELETE FROM usuarios WHERE id_usuario='$id_usuario'";
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