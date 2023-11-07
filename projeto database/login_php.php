<?php

include("connection.php");

$login = $_POST["txtLogin"];
$password = $_POST["txtPassword"];

$sql = "SELECT id, password FROM login WHERE login
= '$login'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row["password"] === $password) {
            session_start();
            $_SESSION["id"] = $row["id"];
            header("Location: users_lst.php");
        }
    }
} else {
    echo '<script> alert("Login ou senha incorretos"); history.go(-1); </script>';
}

?>