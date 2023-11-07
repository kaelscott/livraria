<?php
    include("connection.php");

    $city = $_POST["txtCity"];
    $name = $_POST["txtName"];

    $sql = "INSERT INTO users (nome, cidade)
    VALUES ('$name', '$city')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: users_lst.php");
    } else {
?>

<script>
    alert("falha");
</script>

<?php
    }
?>