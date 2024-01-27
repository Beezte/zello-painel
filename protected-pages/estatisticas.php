<?php
include '../php/verfica_autenticacao.php';
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Zlo Admin - Home</title>
    <link rel="stylesheet" href="../css/css/bootstrap.css">
    <link rel="stylesheet" href="../css/estatisticas.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon-zello.png">
</head>
<body>
<div class="banner-warning">
    <p><strong><i class="fa-solid fa-bug"></i> O painel está em constante atualização, em caso de erro, contate a equipe de Insfraestrutura e Tecnologia</strong></p>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
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

<div class="container">
    <div class="row ">
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Clientes</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                0
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>0% <!-- <i class="fa fa-arrow-up"></i></span> --!>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Usuários totais</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                0
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>0% <!-- <i class="fa fa-arrow-up"></i></span> --!>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="0" style="height: 8px;">
                        <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Ticket Resolvidos</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                0
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>0% <!-- <i class="fa fa-arrow-up"></i>--!></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Receita geral</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                R$0,00
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>0% <!-- <i class="fa fa-arrow-up"></i>--!> </span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>