<?php

include("../views/includes/connection.php");

$id_usuario    = $_POST["txtIdUser"];
$isAdmin        = $_POST["txtAdmin"];

$sql = "UPDATE usuarios
        SET isAdmin = '$isAdmin'
        WHERE id_usuario = '$id_usuario'";

$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: users_user.php?id_usuario=$id_usuario");
} else {
    echo "<script>alert('falha');</script>";
}
