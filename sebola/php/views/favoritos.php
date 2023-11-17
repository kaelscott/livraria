<?php
include ("./includes/connection.php");
include ("./includes/header.php");

if(isset($_SESSION['id_usuarios'])){
    $id_usuarios = $_SESSION['id_usuarios'];
} else {
    // Trate o caso em que 'id_usuarios' não está definido na sessão
    echo "id_usuarios não está definido na sessão.";
    exit();
}

$sql = "SELECT livro.id_livro, livro.titulo, livro.autor, livro.preco, livro.thumbnail
        FROM livro
        INNER JOIN lista_desejo ON livro.id_livro = lista_desejo.id_livro
        WHERE lista_desejo.id_usuarios = $id_usuarios";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo $row['titulo'];
    }
} else {
    echo "nenhum livro favoritado";
}






?>