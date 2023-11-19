
<?php
include ("./includes/connection.php");
include ("./includes/header.php");

if (isset($_GET["id_livro"])) {
    $id_livro = $_GET["id_livro"];

    $sql = "SELECT id_livro, titulo, autor, data_publicacao, descricao,categoria, preco, isbn, thumbnail FROM livro WHERE id_livro = '$id_livro'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-end align-items-start">
                        <img src='<?php echo $row['thumbnail']; ?>' style='width: 250px; height: auto; object-fit: cover;'>
                    </div>
                    <div class="col-md-8 d-flex justify-content-center align-items-center">
                        <div>
                            <h1> <?php echo $row['titulo']; ?> </h1>
                            <div class='d-flex align-items-center'>
                                <p class="fs-6"> <?php echo $row['autor']; ?> - </p>
                                <p class=" fw-light px-1"> <?php echo $row['data_publicacao']; ?></p>
                            </div>
                            <p class="fs-3"> R$<?php echo $row['preco'] ?> </p>
                            <div class="d-flex gap-2">

                                <button class="btn btn-primary rounded-pill" type="button">Adicionar ao carrinho</button>
                                <form action="../favorite_book.php" method="POST">
                                    <input type='hidden' name='livro_favorito' value='<?php echo $id_livro; ?>'>
                                    <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off" onChange="this.form.submit()">
                                    <label class="btn btn-outline-danger rounded-pill" for="btn-check-outlined">♡</label>
                                </form>
                            </div>

                            <div class="my-3">
                                <h3>Descrição</h3>
                                <p> <?php echo $row['descricao']; ?>  </p>
                            </div>

                                <!-- comentários -->
                                <div class=" form-floating my-4">
                                    <form action="../comment.php" method="POST">
                                        <input type='hidden' name='id_livro' value='<?php echo $id_livro; ?>'>
                                        <textarea class="form-control" name="comentario" placeholder="Adicione um comentário..."></textarea>
                                        <button class="btn btn-outline-primary mt-2" type="submit" id="button-addon2">Enviar</button>
                                    </form>
                                </div>

                                <?php // exibe os comentários
                                $sql_comentarios = "SELECT comentarios.comentario, comentarios.data_comentario, usuarios.email
                                                    FROM comentarios INNER JOIN usuarios
                                                    ON comentarios.id_usuarios = usuarios.id_usuarios
                                                    WHERE id_livro = '$id_livro'
                                                    ORDER BY data_comentario DESC";
                                $result_comentarios = $conn->query($sql_comentarios);

                                // se houver comentários
                                if ($result_comentarios->num_rows > 0) {
                                    while ($row_comentario = $result_comentarios->fetch_assoc()) {
                                        echo "<p><strong>" . $row_comentario['email'] . "</strong> (" . $row_comentario['data_comentario'] . "): " . $row_comentario['comentario'] . "</p>";
                                    }
                                }
                                ?>

                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    }
} else {
    echo "Nenhum registro encontrado";
}

?>

