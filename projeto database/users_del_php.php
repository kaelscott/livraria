<?php
    include("connection.php");

    $id = $_GET["id"];

    $sql = "DELETE FROM users WHERE id='$id'";

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
