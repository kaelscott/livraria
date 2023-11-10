<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>



<header class="sticky-lg-top bg-body-tertiary">
    <nav class="navbar navbar-expand-sm pt-3">
        <div class="container d-flex flex-wrap justify-content-between">
            <a href="home.php" class="navbar-brand">Site</a>
            <form   class="w-50 mx-auto d-none d-sm-block" role="search"
                    action="./search.php"
                    method="POST">
                <input type="search" name="termoPesquisa" class="form-control " placeholder="Search..." aria-label="Search">
            </form>
            <ul class="nav">
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Login</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Cart</a></li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-sm ">
        <div class="container d-flex flex-wrap justify-content-between">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-label="Expand Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form   class="w-75 mx-auto d-block d-sm-none" role="search"
                    action="../../books_search.php"
                    method="POST">
                <input type="search" name="termoPesquisa" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
            <div class="collapse navbar-collapse justify-content-center border-bottom" id="nav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2 active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Features</a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Pricing</a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">About</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
