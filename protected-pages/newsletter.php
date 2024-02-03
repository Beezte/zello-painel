<?php
include '../php/verfica_autenticacao.php';
?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark" class="bg-body-tertiary">
<head>
    <meta charset="UTF-8">
    <title>Zlo Admin - Home</title>
    <link rel="stylesheet" href="../css/css/bootstrap.css">
    <link rel="stylesheet" href="../css/newsletter.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/9cdb7b0b74.js" crossorigin="anonymous"></script>
    <script src="../css/js/bootstrap.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/favicon-zello.png">
</head>

<body>
<div class="banner-warning">
    <p><strong><i class="fa-solid fa-life-ring"></i> O painel está em constante atualização, em caso de erro, contate a equipe de Insfraestrutura e Tecnologia</strong></p>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand me-auto" href="#">Zello Painel</a>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Zello Painel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item"> <!--MUDEI AQUI-->
                        <a class="nav-link mx-lg-2" href="#">Funcionários</a>
                    </li>
                    <li class="nav-item"> <!--MUDEI AQUI-->
                        <a class="nav-link mx-lg-2" href="encurtador.php">Encurtador</a>
                    </li>
                    <li class="nav-item"> <!--MUDEI AQUI-->
                        <a class="nav-link mx-lg-2 active" href="#">Newsletter</a>
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
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<header class=" py-5 header-cor-custom">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-light"> <!-- muda o fundo do texto -->
            <span class="badge text-bg-warning">BETA 0.1</span> <span class="badge text-bg-danger">INSTÁVEL</span>
            <h1 class="display-3 fw-bolder">Envio de Newsletter</h1>
            <p class="h4 fw-normal text-white mb-0">Use esse sistema para enviar um e-mail para todos os inscritos em
            em nossa newsletter</p>
        </div>
    </div>
</header>

<section class="py-5 align-items-center py-4 bg-body-tertiary">
    <main class="w-100 m-auto form-container">

        <form action="../php/newsletter-sender-all.php" method="post" id="newsletterform">
            <span>Defina o título e-mail</span>
            <div class="input-group  mb-3">
                <span class="input-group-text" id="tituloEmail">🌎 News da Zello: </span>
                <input type="text" class="form-control" name="tituloEmail" placeholder="Beta 0.5 disponível!" aria-label="Beta 0.5 disponível!" aria-describedby="basic-addon1">
            </div>

            <div class=" mb-3">
                <label for="corpoEmail" class="form-label">Defina todo o corpo do e-mail</label>
                <textarea class="form-control" name="corpoEmail" id="corpoEmaill" rows="15" cols="50" spellcheck="true" placeholder="Lorem ipsum..."></textarea>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#corpoEmaill' ),{
                            style: []
                        } )
                        .then( editor => {
                            console.log( editor );
                        } )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
            </div>

            <button class="btn btn-success w-100 py-2 mt-4" type="submit" name="enviarNewsletter">Enviar newsletter</button>
        </form>

    </main>
</section>

</body>
</html>