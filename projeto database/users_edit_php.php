<?php

include("connection.php");

$id = $_POST["txtId"];
$name = $_POST["txtName"];
$city = $_POST["txtCity"];

$sql = "UPDATE users SET nome='$name', cidade='$city' WHERE id='$id'";

$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: users_user.php?id=$id");
} else {
    echo "<script>alert('falha');</script>";
}

?>

