<?php
include ("./includes/header.php");
include ("./includes/connection.php");
?>

<style>
    img{
        object-fit: contain;
    }
</style>

<?php if (isset($_GET['termoPesquisa'])){ ?>
    <?php
    $pesquisa = $_GET['termoPesquisa'];
    $sql = "SELECT * FROM livro WHERE titulo LIKE '%$pesquisa%' OR autor LIKE '%$pesquisa%'";
    $result = $conn->query($sql);
    $num_results = $result->num_rows;
    ?>

    <div class='container'>
    <h6><?php echo $num_results; ?> resultados para "<?php echo $pesquisa;?>"</h6>

    <?php if ($num_results > 0){ ?>
        <?php
        $count = 0;
        while($row = $result->fetch_assoc()){
            if($count % 5 == 0){
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
        Nenhum resultado encontrado
    <?php } ?>
    </div>

<?php
$conn->close();
    }
?>

