<?php

include("./includes/connection.php");
include("./includes/header.php");
?>


<div class="position-relative overflow-hidden p-2 p-lg-5 p-md-1 mb-5 text-center bg-dark">
    <div class="col-md-4 p-lg-1 mx-auto my-5 text-light" >
      <h1 class="display-3 fw-bold">Sebo lá</h1>
      <h3 class="fw-normal mb-3 text-light-emphasis">Plataforma que conecta você aos livros e às livrarias que você ama</h3>
      <div class="justify-content-center lead fw-normal text-white">
        <a class="icon-link link-light link-underline-opacity-25 link-underline-opacity-75-hover pt-4" href="#">
          Sobre nós
        </a>
      </div>
    </div>
</div>


<?php

function exibirLivrosPorCategoria($conn, $categoria) {
  $sql = "SELECT id_livro, thumbnail, categoria FROM livro WHERE categoria = '$categoria' OR categoria LIKE '$categoria%'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
?>
      <div class="container text-center mb-5">
          <h2 style="text-align: left;"><?php echo $row['categoria']; ?></h2>
          <div style="display: flex; align-items: center;">
              <button class="btn d-md-flex d-sm-none" id="scrollLeft">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
              </button>
              <div class="row flex-nowrap overflow-auto" id="scrollableDiv" style="flex-grow: 1;">
                  <div class="col">
                      <a href="book.php?id_livro=<?php echo $row['id_livro']; ?>">
                          <img src="<?php echo $row['thumbnail']; ?>" style="margin-right: 5px;"><br>
                      </a>
                  </div>
                  <?php
                    while ($row = $result->fetch_assoc()) {
                  ?>
                      <div class="col">
                          <a href="book.php?id_livro=<?php echo $row['id_livro']; ?>">
                              <img src="<?php echo $row['thumbnail']; ?>" style="margin-right: 5px;"><br>
                          </a>
                      </div>
                  <?php
                    }
                  ?>
              </div>
              <button class="btn d-md-flex  d-sm-none" id="scrollRight">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                </svg>
              </button>
          </div>
          <script>
              document.getElementById('scrollLeft').addEventListener('click', function() {
                  document.getElementById('scrollableDiv').scrollLeft -= 100;
              });

              document.getElementById('scrollRight').addEventListener('click', function() {
                  document.getElementById('scrollableDiv').scrollLeft += 100;
              });
          </script>
      </div>
<?php
  }
}



exibirLivrosPorCategoria($conn, 'Fiction');
exibirLivrosPorCategoria($conn, 'Philosophy');
exibirLivrosPorCategoria($conn, 'Computers');

include("./includes/footer.php");

?>


