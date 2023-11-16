<?php
include ("./includes/connection.php");
include ("./includes/header.php");


    if (isset($_GET["id_livro"])) {
        $id_livro = $_GET["id_livro"];

        $sql = "SELECT id_livro, titulo, autor, data_publicacao, descricao,categoria, preco, isbn, thumbnail FROM livro WHERE id_livro = $id_livro";
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
                                <form action="" method="POST">
                                    <input type='checkbox' class='btn-check' name='options-outlined' id='danger-outlined' autocomplete='off'>
                                    <label class='btn btn-outline-danger rounded-pill' for='danger-outlined'>♡</label>
                                </form>
                            </div>
                            <div class="my-3">
                                <h3 >Descrição</h3>
                                <p> <?php echo $row['descricao']; ?>  </p>
                            </div>
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
