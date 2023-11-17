<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>

<header class="sticky-lg-top bg-body-tertiary">
    <nav class="navbar navbar-expand-sm pt-3">
        <div class="container d-flex flex-wrap justify-content-between">
            <h1 class="navbar-brand"><a href="home.php" class="navbar-brand">Sebo lá</a></h1>
            <form   class="w-50 mx-auto d-none d-sm-block" role="search"
                    action="./search.php"
                    method="GET">
                <input type="search" name="termoPesquisa" class="form-control " placeholder="Pesquise por livros ou autores" aria-label="Search">
            </form>
            <ul class="nav">
            <?php
                session_start();

                if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
                    echo '
                        <li class="nav-item dropdown text-end">
                            <a href="#" class="nav-link  d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                            </a>
                            <ul class="dropdown-menu text-small" style="">'
            ?> <?php                if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]) {
                                echo '<li><a class="dropdown-item" href="../books_list.php">Registro livros</a></li>';
                                echo '<li><a class="dropdown-item" href="../books_list.php">Registro usuarios</a></li>';
                            } ?>
                                <li><a class="dropdown-item" href="./favoritos.php">Favoritos</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../logout_php.php">Sair</a></li>
                            </ul>
                        </li>
                <?php } else {
                    echo '<li class="nav-item"><a href="./login.php" class="nav-link link-body-emphasis px-2">Login</a></li>';
                }
                ?>
                <li class="nav-item">
                    <a href="#" class="nav-link link-body-emphasis px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                    </a>
                </li>




            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-sm ">
        <div class="container d-flex flex-wrap justify-content-between">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-label="Expand Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form   class="w-75 mx-auto d-block d-sm-none" role="search"
                    action="./search.php"
                    method="GET">
                <input type="search" name="termoPesquisa" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
            <div class="collapse navbar-collapse justify-content-center border-bottom" id="nav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-4"> Categorias </a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-4"> Lista de desejos </a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-4"> Ajude uma livraria </a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-4"> Crianças </a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-4"> In English </a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
