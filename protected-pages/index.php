<?php
include '../php/verfica_autenticacao.php';
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Zlo Admin - Home</title>
    <link rel="stylesheet" href="../css/css/bootstrap.css">
    <link rel="stylesheet" href="../css/index.css">
    <script src="../css/js/bootstrap.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/favicon-zello.png">
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand me-auto" href="#">Zello Painel</a>
<!--                <img src="../images/logo-zello.svg" height="65" width="65" alt="">-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Zello Painel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item"> <!--MUDEI AQUI-->
                            <a class="nav-link mx-lg-2" href="#">Funcionários</a>
                        </li>
                        <li class="nav-item"> <!--MUDEI AQUI-->
                            <a class="nav-link mx-lg-2" href="encurtador.php">Encurtador</a>
                        </li>
                        <li class="nav-item"> <!--MUDEI AQUI-->
                            <a class="nav-link mx-lg-2" href="#">teste</a>
                        </li>
                        <li class="nav-item"> <!--MUDEI AQUI-->
                            <a class="nav-link mx-lg-2" href="#">teste</a>
                        </li>
                        <li class="nav-item"> <!--MUDEI AQUI-->
                            <a class="nav-link mx-lg-2" href="#">teste</a>
                        </li>
                        <li class="nav-item"> <!--MUDEI AQUI-->
                            <a class="nav-link mx-lg-2" href="#">teste</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="../php/logout.php" class="login-button">Sair</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>


<!--<h2>Bem-vindo ao Painel Administrativo</h2>-->
<!-- Conteúdo da página administrativa aqui -->
<!--<p><a href=../php/logout.php>Sair</a></p>-->
</body>
</html>