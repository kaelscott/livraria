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
                <div class='row gx-1 gy-4'>
                    <div class='col-md-5 gx-5'>
                        <img src='<?php echo $row['thumbnail']; ?>' style='width:250px'>
                    </div>
                    <div class='col-md-5 py-3 gx-5'>
                        <h1>  <?php echo $row['titulo']; ?> <br> </h1>
                        <div class='d-flex align-items-center'>
                            <h4>  <?php echo $row['autor']; ?> - </h4>
                            <h6 class="px-2"><?php echo $row['data_publicacao']; ?></h6>
                        </div>
                        <h6><?php echo $row['categoria']; ?><br></h6>
                        <br>
                        <p> <?php echo $row['descricao']; ?><br> </p>

                    </div>
                </div>
                <form action="" method="POST">
                    <input type='checkbox' class='btn-check' name='options-outlined' id='danger-outlined' autocomplete='off'>
                    <label class='btn btn-outline-danger' for='danger-outlined'>♡</label>
                </form>
        <?php
            }
        }
} else {
    echo "Nenhum registro encontrado";
}
?>
