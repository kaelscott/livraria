<?php
include("./includes/connection.php");
include("./includes/header.php");


if (isset($_SESSION['id_usuario'])) {  // se o usuário estiver logado pega o id dele
    $id_usuario = $_SESSION['id_usuario'];
} else {
    echo "id_usuario não está definido na sessão.";
    exit();
}

// pega os livros favoritados pelo usuário
$sql = "SELECT livro.id_livro, livro.titulo, livro.autor, livro.preco, livro.thumbnail
        FROM livro
        INNER JOIN lista_desejo ON livro.id_livro = lista_desejo.id_livro
        WHERE lista_desejo.id_usuario = $id_usuario";
$result = $conn->query($sql);
$num_results = $result->num_rows;
?>

<div class='container'>
    <?php // exibe o número de livros favoritados
    if ($num_results === 1) {
        echo "<p class='fw-medium fs-5'>  $num_results  livro favoritado</p>";
    } else {
        echo "<p class='fw-medium fs-5'>  $num_results  livros favoritados</p>";
    }
    ?>

    <?php if ($num_results > 0) { ?>
        <?php
        $count = 0;  // contador para exibir 5 livros por linha
        while ($row = $result->fetch_assoc()) {
            if ($count % 5 == 0) {
        ?>
                <div class='row justify-content-center mb-4'>
                <?php } ?>
                <div class='col-lg-2 col-md-4 col-sm-6 mt-5'>
                    <div class='card shadow-sm'>
                        <a href="book.php?id_livro=<?php echo $row['id_livro']; ?>">
                            <img class='bd-placeholder-img card-img-top' width='100%' height='250' src='<?php echo $row['thumbnail']; ?>' alt='<?php echo $row['titulo']; ?>'>
                        </a>
                        <div class='card-body'>
                            <p class='card-text'>
                                <?php echo $row['titulo']; ?>
                                <br>
                                <span class="text-body-tertiary"> <?php echo $row['autor']; ?> </span>
                            </p>
                            <div class='d-flex justify-content-between align-items-center'>
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-sm btn-outline-secondary'>Add to cart</button>
                                </div>
                                <small class='text-body-secondary'>R$<?php echo $row['preco'] ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            $count++;
        }
            ?>
                </div>
            <?php } else { ?>
                <p class="fw-medium fs-5">Nenhum livro favoritado :(</p>
            <?php } ?>
</div>


<!-- if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo $row['titulo'];
    }
} else { ?>

     <div class="container">
         <p class="fw-medium fs-5">Nenhum livro favoritado :(</p>
     </div> -->