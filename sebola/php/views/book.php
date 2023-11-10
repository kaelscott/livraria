<?php

include ("./includes/connection.php");
include ("./includes/header.php");

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "SELECT id, titulo, autor, data_publicacao, descricao,categoria, preco, isbn, thumbnail FROM livro WHERE id = $id";
        $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "titulo:           {$row['titulo']}<br>";
            echo "autor:            {$row['autor']}<br>";
            echo "data_publicacao:  {$row['data_publicacao']}<br>";
            echo "descricao:        {$row['descricao']}<br>";
            echo "categoria:        {$row['categoria']}<br>";
            echo "capa: <br>  <img src='".$row['thumbnail']."' alt='".$row['titulo']."' <br>";
        }
    }
} else {
    echo "Nenhum registro encontrado";
}
?>