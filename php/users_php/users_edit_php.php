<?php

include ("../views/includes/connection.php");

$id_usuarios    = $_POST["txtIdUser"];
$isAdmin        = $_POST["txtAdmin"];

$sql = "UPDATE usuarios
        SET isAdmin = '$isAdmin'
        WHERE id_usuarios = '$id_usuarios'";

$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: users_user.php?id_usuarios=$id_usuarios");
} else {
    echo "<script>alert('falha');</script>";
}

?>

