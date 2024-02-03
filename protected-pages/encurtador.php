<?php
include '../php/config-short-api.php';
include '../php/verfica_autenticacao.php';

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
$sql = "SELECT * FROM links ORDER BY id ASC";
$result = $conn->query($sql);
$total_links = mysqli_num_rows($result);
$quantidade_pg = 10;
$num_pagina = ceil($total_links/$quantidade_pg);
$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

$sql = "SELECT * FROM links ORDER BY id ASC LIMIT $inicio, $quantidade_pg";
$result = $conn->query($sql);
$total_links = mysqli_num_rows($result);


$matricula = $_SESSION['MATRICULA'];
$name = "SELECT NOME FROM funcionarios_info WHERE MATRICULA = ?";
$stmt = $conn->prepare($name);
$stmt->bind_param("s", $matricula);
$stmt->execute();
$resultname = $stmt->get_result();
$funcionario = $resultname->fetch_assoc();
$nome = $funcionario['NOME'];

?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark" class="bg-body-tertiary">
<head>
    <meta charset="UTF-8">
    <title>Zlo Admin - Home</title>
    <link rel="stylesheet" href="../css/css/bootstrap.css">
    <link rel="stylesheet" href="../css/encurtador.css">
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
                        <a class="nav-link mx-lg-2 active" href="encurtador.php">Encurtador</a>
                    </li>
                    <li class="nav-item"> <!--MUDEI AQUI-->
                        <a class="nav-link mx-lg-2" href="newsletter.php">Newsletter</a>
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
            <span class="badge text-bg-warning">Nova feature 1.3</span>
            <h1 class="display-3 fw-bolder">Encurtador</h1>
            <p class="h4 fw-normal text-white mb-0">Use esse sistema para reduzir links oficiais</p>
        </div>
    </div>
</header>

<section class="py-5 align-items-center py-4 bg-body-tertiary">
    <main class="w-100 m-auto form-container">
        <form id="encurtarForm">
            <div class="form-floating mb-4">
                <input type="text" class="form-control" name="matricula-short" id="matricula-short" placeholder="Matricula solicitante" value="<?php echo isset($_SESSION['MATRICULA']) ? $_SESSION['MATRICULA'] : ''; ?>" disabled>
            <label for="matricula-short">Matricula solicitante</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" name="nome-short" id="nome-short" placeholder="teste" value="<?php echo htmlspecialchars($nome); ?>" disabled>
                <label for="nome-short">Nome solicitante</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" name="url-destino" id="url-destino" placeholder="teste">
                <label for="url-destino">Url de destino</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" name="url-custom" id="url-custom" placeholder="teste">
                <label for="url-custom">Url customizada (opcional)</label>
            </div>

            <button class="btn btn-success w-100 py-2 mt-4" type="submit" id="encurtarCopiarButton">Encurtar e copiar</button>
            <div id="resultado"></div>
        </form>

    </main>
</section>


<div class="card testestestes mx-auto ">
    <div class="card-body">
        <div class="container-xxl">
            <h1 class="text-center pb-4">Links criados</h1>
            <table class="table table-striped table-hover table-responsive-sm table-bordered margin-fix">
                <thead class="table-light text-center">
                <tr>
                    <th>Id</th>
                    <th>Criador(a)</th>
                    <th>Matricula</th>
                    <th>Url de destino</th>
                    <th>Url curta</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php
                while ($short_data = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$short_data['id']."</td>";
                    echo "<td>".$short_data['nome']."</td>";
                    echo "<td>".$short_data['matricula']."</td>";
                    echo "<td> Indisponível temporariamente</td>";
//                echo "<td>".$short_data['original_url']."</td>";
                    echo "<td><a href='http://localhost:5000/" . $short_data['custom_url'] . "'> http://localhost:5000/" . $short_data['custom_url'] . "</a></td>";
                    echo "<td><button class='btn btn-success mx-lg-1' onclick='copyToClipboard(\"http://localhost:5000/" . $short_data['custom_url'] . "\")'>Copiar</button>";
                    echo "<button class='btn btn-warning mx-lg-1' onclick='copyToClipboard(\"http://localhost:5000/" . $short_data['custom_url'] . "\")'>Editar</button>";
                    echo "<button class='btn btn-danger mx-lg-1' onclick='copyToClipboard(\"http://localhost:5000/" . $short_data['custom_url'] . "\")'>Deletar</button>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <?php
        $pagina_anterior = $pagina - 1;
        $pagina_posterior = $pagina + 1;
        ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <?php
                    if ($pagina_anterior != 0){
                        echo "<a class='page-link' href='encurtador.php?pagina=$pagina_anterior'>Anterior</a>";
                    }else{
                        echo "<a class='page-link disabled' href='#'>Sem pagina anterior</a>";
                    }
                    ?>
                </li>
                <?php
                for($i = 1; $i < $num_pagina + 1; $i++) {
                    echo "<li class='page-item'><a class='page-link' href='encurtador.php?pagina=$i'>$i</a></li>";
                }
                ?>
                <li class="page-item">
                    <?php
                    if ($pagina_posterior <= $num_pagina){
                        echo "<a class='page-link' href='encurtador.php?pagina=$pagina_posterior'>Próxima</a>";
                    }else{
                        echo "<a class='page-link disabled' href='#'>Fim da lista</a>";
                    }
                    ?>
                </li>
            </ul>
        </nav>

    </div>
</div>

<header class=" py-5 bg-body-tertiary">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-light"> <!-- muda o fundo do texto -->
        </div>
    </div>
</header>


<script src="../js/short.js"></script>
</body>
</html>