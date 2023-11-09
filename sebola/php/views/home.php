<?php

include("./includes/connection.php");
include("./includes/header.php");
?>


<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-dark">
    <div class="col-md-6 p-lg-5 mx-auto my-5 text-light">
      <h1 class="display-3 fw-bold">Lorem ipsum dolor sit.</h1>
      <h3 class="fw-normal mb-3 text-light-emphasis">Lorem ipsum dolor sit amet consectetur.</h3>
      <div class="d-flex gap-3 justify-content-center lead fw-normal text-white">
        <a class="icon-link link-light link-underline-opacity-25 link-underline-opacity-75-hover" href="#">
          lorem
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>
        <a class="icon-link link-light link-underline-opacity-25 link-underline-opacity-75-hover" href="#">
          lorem
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>






<?php

function exibirLivrosPorCategoria($conn, $categoria) {
    $sql = "SELECT id, thumbnail FROM livro WHERE categoria = '$categoria' OR categoria LIKE '$categoria%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="container text-center mb-5">';
        echo '<div class="row flex-nowrap overflow-auto">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col">';
            echo '<img src="' . $row['thumbnail'] . '" style="margin-right: 5px;"><br>';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
    }
}

exibirLivrosPorCategoria($conn, 'Fiction');
exibirLivrosPorCategoria($conn, 'Philosophy');
exibirLivrosPorCategoria($conn, 'Computers');

include("./includes/footer.php");

?>

