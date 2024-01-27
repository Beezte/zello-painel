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
    <script src="https://kit.fontawesome.com/9cdb7b0b74.js" crossorigin="anonymous"></script>    <script src="../css/js/bootstrap.js"></script>
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

<section class="pt-8 pt-md-9">
    <div class="container">
        <h2 class="text-dark fw-normal">
            Menu principal
        </h2>

        <!-- Form -->
        <form class="mt-4">
            <div class="input-group input-group-lg shadow-sm">
          <span class="input-group-text border-0">
            <i class="fas fa-search fa-xs text-secondary mb-1"></i>
          </span>

                <input type="text" class="form-control bg-white border-0 px-1" placeholder="Search help topics...">

                <span class="input-group-text border-0 py-1 pe-2">
            <button type="submit" class="btn btn-primary text-uppercase-bold-sm">
              Search
            </button>
          </span>
            </div>
        </form>

        <!-- Categories -->
        <div class="row mt-6">
            <div class="col-12 mb-4">
          <span class="badge bg-pastel-primary text-primary text-uppercase-bold-sm">
            Categorias
          </span>
            </div>

            <!-- Category -->
            <div class="col-md-3 mb-4">
                <a href="#" class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
            <span class="icon-circle icon-circle-lg bg-pastel-primary text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-c</title><polyline points="352 144 464 144 464 256" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polyline><path d="M48,368,169.37,246.63a32,32,0,0,1,45.26,0l50.74,50.74a32,32,0,0,0,45.26,0L448,160" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path></svg>
            </span>
                    <span class="text-dark mt-3">
              Estatísticas
            </span>
                </a>
            </div>

            <!-- Category -->
            <div class="col-md-3 mb-4">
                <a href="#" class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
            <span class="icon-circle icon-circle-lg bg-pastel-primary text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-e</title><rect x="48" y="80" width="416" height="384" rx="48" ry="48" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></rect><path d="M397.82,80H114.18C77.69,80,48,110.15,48,147.2V208H64c0-16,16-32,32-32H416c16,0,32,16,32,32h16V147.2C464,110.15,434.31,80,397.82,80Z"></path><circle cx="296" cy="232" r="24"></circle><circle cx="376" cy="232" r="24"></circle><circle cx="296" cy="312" r="24"></circle><circle cx="376" cy="312" r="24"></circle><circle cx="136" cy="312" r="24"></circle><circle cx="216" cy="312" r="24"></circle><circle cx="136" cy="392" r="24"></circle><circle cx="216" cy="392" r="24"></circle><circle cx="296" cy="392" r="24"></circle><line x1="128" y1="48" x2="128" y2="80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line x1="384" y1="48" x2="384" y2="80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line></svg>
            </span>
                    <span class="text-dark mt-3">
              Calendar
            </span>
                </a>
            </div>

            <!-- Category -->
            <div class="col-md-3 mb-4">
                <a href="#" class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
            <span class="icon-circle icon-circle-lg bg-pastel-primary text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-l</title><path d="M431,320.6c-1-3.6,1.2-8.6,3.3-12.2a33.68,33.68,0,0,1,2.1-3.1A162,162,0,0,0,464,215c.3-92.2-77.5-167-173.7-167C206.4,48,136.4,105.1,120,180.9a160.7,160.7,0,0,0-3.7,34.2c0,92.3,74.8,169.1,171,169.1,15.3,0,35.9-4.6,47.2-7.7s22.5-7.2,25.4-8.3a26.44,26.44,0,0,1,9.3-1.7,26,26,0,0,1,10.1,2L436,388.6a13.52,13.52,0,0,0,3.9,1,8,8,0,0,0,8-8,12.85,12.85,0,0,0-.5-2.7Z" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></path><path d="M66.46,232a146.23,146.23,0,0,0,6.39,152.67c2.31,3.49,3.61,6.19,3.21,8s-11.93,61.87-11.93,61.87a8,8,0,0,0,2.71,7.68A8.17,8.17,0,0,0,72,464a7.26,7.26,0,0,0,2.91-.6l56.21-22a15.7,15.7,0,0,1,12,.2c18.94,7.38,39.88,12,60.83,12A159.21,159.21,0,0,0,284,432.11" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></path></svg>
            </span>
                    <span class="text-dark mt-3">
              Conversations
            </span>
                </a>
            </div>

            <!-- Category -->
            <div class="col-md-3 mb-4">
                <a href="#" class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
            <span class="icon-circle icon-circle-lg bg-pastel-primary text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-n</title><path d="M53.12,199.94l400-151.39a8,8,0,0,1,10.33,10.33l-151.39,400a8,8,0,0,1-15-.34L229.66,292.45a16,16,0,0,0-10.11-10.11L53.46,215A8,8,0,0,1,53.12,199.94Z" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path><line x1="460" y1="52" x2="227" y2="285" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line></svg>
            </span>
                    <span class="text-dark mt-3">
              Messages
            </span>
                </a>
            </div>

            <!-- Category -->
            <div class="col-md-3 mb-4">
                <a href="#" class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
            <span class="icon-circle icon-circle-lg bg-pastel-primary text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-p</title><path d="M403.29,32H280.36a14.46,14.46,0,0,0-10.2,4.2L24.4,281.9a28.85,28.85,0,0,0,0,40.7l117,117a28.86,28.86,0,0,0,40.71,0L427.8,194a14.46,14.46,0,0,0,4.2-10.2V60.8A28.66,28.66,0,0,0,403.29,32Z" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path><path d="M352,144a32,32,0,1,1,32-32A32,32,0,0,1,352,144Z"></path><path d="M230,480,492,218a13.81,13.81,0,0,0,4-10V80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path></svg>
            </span>
                    <span class="text-dark mt-3">
              Pricing
            </span>
                </a>
            </div>

            <!-- Category -->
            <div class="col-md-3 mb-4">
                <a href="#" class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
            <span class="icon-circle icon-circle-lg bg-pastel-primary text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-i</title><path d="M277.42,247a24.68,24.68,0,0,0-4.08-5.47L255,223.44a21.63,21.63,0,0,0-6.56-4.57,20.93,20.93,0,0,0-23.28,4.27c-6.36,6.26-18,17.68-39,38.43C146,301.3,71.43,367.89,37.71,396.29a16,16,0,0,0-1.09,23.54l39,39.43a16.13,16.13,0,0,0,23.67-.89c29.24-34.37,96.3-109,136-148.23,20.39-20.06,31.82-31.58,38.29-37.94A21.76,21.76,0,0,0,277.42,247Z" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path><path d="M478.43,201l-34.31-34a5.44,5.44,0,0,0-4-1.59,5.59,5.59,0,0,0-4,1.59h0a11.41,11.41,0,0,1-9.55,3.27c-4.48-.49-9.25-1.88-12.33-4.86-7-6.86,1.09-20.36-5.07-29a242.88,242.88,0,0,0-23.08-26.72c-7.06-7-34.81-33.47-81.55-52.53a123.79,123.79,0,0,0-47-9.24c-26.35,0-46.61,11.76-54,18.51-5.88,5.32-12,13.77-12,13.77A91.29,91.29,0,0,1,202.35,77a79.53,79.53,0,0,1,23.28-1.49C241.19,76.8,259.94,84.1,270,92c16.21,13,23.18,30.39,24.27,52.83.8,16.69-15.23,37.76-30.44,54.94a7.85,7.85,0,0,0,.4,10.83l21.24,21.23a8,8,0,0,0,11.14.1c13.93-13.51,31.09-28.47,40.82-34.46s17.58-7.68,21.35-8.09A35.71,35.71,0,0,1,380.08,194a13.65,13.65,0,0,1,3.08,2.38c6.46,6.56,6.07,17.28-.5,23.74l-2,1.89a5.5,5.5,0,0,0,0,7.84l34.31,34a5.5,5.5,0,0,0,4,1.58,5.65,5.65,0,0,0,4-1.58L478.43,209A5.82,5.82,0,0,0,478.43,201Z" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path></svg>
            </span>
                    <span class="text-dark mt-3">
              Settings
            </span>
                </a>
            </div>

            <!-- Category -->
            <div class="col-md-3 mb-4">
                <a href="#" class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
            <span class="icon-circle icon-circle-lg bg-pastel-primary text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-l</title><rect x="32" y="80" width="448" height="256" rx="16" ry="16" transform="translate(512 416) rotate(180)" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></rect><line x1="64" y1="384" x2="448" y2="384" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line x1="96" y1="432" x2="416" y2="432" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><circle cx="256" cy="208" r="80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></circle><path d="M480,160a80,80,0,0,1-80-80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path><path d="M32,160a80,80,0,0,0,80-80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path><path d="M480,256a80,80,0,0,0-80,80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path><path d="M32,256a80,80,0,0,1,80,80" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path></svg>
            </span>
                    <span class="text-dark mt-3">
              Payments
            </span>
                </a>
            </div>

            <!-- Category -->
            <div class="col-md-3 mb-4">
                <a href="#" class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
            <span class="icon-circle icon-circle-lg bg-pastel-primary text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-g</title><path d="M336,208V113a80,80,0,0,0-160,0v95" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path><rect x="96" y="208" width="320" height="272" rx="48" ry="48" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></rect></svg>
            </span>
                    <span class="text-dark mt-3">
              Security
            </span>
                </a>
            </div>
        </div>
    </div>
</section>
</body>
</html>