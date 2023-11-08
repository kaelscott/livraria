<?php

include("./includes/connection.php");
include("./includes/header.php");

function exibirLivrosPorCategoria($conn, $categoria) {
    $sql = "SELECT id, thumbnail FROM livro WHERE categoria = '$categoria' OR categoria LIKE '$categoria%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div style="display: flex; flex-wrap: wrap;">';
        while ($row = $result->fetch_assoc()) {
            echo '<img src="' . $row['thumbnail'] . '" style="margin-right: 10px;"><br>';
        }
        echo '</div>';
    }
}

exibirLivrosPorCategoria($conn, 'fiction');
exibirLivrosPorCategoria($conn, 'psychology');
exibirLivrosPorCategoria($conn, 'biography');

include("./includes/footer.php");

?>

