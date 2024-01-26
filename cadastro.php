<?php
include 'php/config.php';

// Inicialização de variáveis
$mensagem = '';

if (isset($_POST['submit'])) {
    // Recupera a matrícula e senha do formulário
    $MATRICULA = $_POST['matricula'];
    $SENHA_PAINEL = $_POST['senha'];
    $SENHA_PAINEL2 = $_POST['senha2'];

    // Proteção contra SQL injection usando prepared statement
    $stmt = $conn->prepare("SELECT ACESSO_PAINEL, CADASTRO_PAINEL FROM funcionarios_info WHERE MATRICULA = ?");
    $stmt->bind_param("s", $MATRICULA);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // A matrícula existe
        $stmt->bind_result($acessoPainel, $cadastroPainel);
        $stmt->fetch();

        if ($acessoPainel === 0) {
            // ACESSO_PAINEL é falso, o funcionário não possui permissão
            $mensagem = "O funcionário não possui permissão para criar uma conta no painel.";
        } else {
            // ACESSO_PAINEL é verdadeiro
            if ($cadastroPainel) {
                // CADASTRO_PAINEL é verdadeiro, o funcionário já é cadastrado
                $mensagem = "O usuário já é cadastrado no painel.";
            } else {
                // CADASTRO_PAINEL é falso, verifica e atualiza se senhas coincidem
                if ($SENHA_PAINEL === $SENHA_PAINEL2) {
                    $senhaCriptografada = password_hash($SENHA_PAINEL, PASSWORD_DEFAULT);
                    $updateSql = "UPDATE funcionarios_info SET CADASTRO_PAINEL = TRUE, SENHA_PAINEL = ? WHERE MATRICULA = ?";
                    $updateStmt = $conn->prepare($updateSql);

                    $updateStmt->bind_param("ss", $senhaCriptografada, $MATRICULA);

                    if ($updateStmt->execute()) {
                        $mensagemSucesso = "Cadastro realizado com sucesso!";
                    } else {
                        $mensagem = "Erro ao cadastrar: " . $updateStmt->error;
                    }

                    $updateStmt->close();
                } else {
                    $mensagem = "As senhas fornecidas precisam ser iguais.";
                }
            }
        }
    } else {
        // A matrícula não existe
        $mensagem = "É preciso ser um funcionário verificado para ter acesso ao painel. Acione o seu Coordenador(a).";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zlo Admin - Cadastro</title>
    <link rel="stylesheet" href="css/css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/x-icon" href="images/favicon-zello.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
<main class="w-100 m-auto form-container">
    <form action="cadastro.php" method="post" id="loginForm">
        <img src="images/logo-zello.svg" class="mb-1 mx-auto d-block" height="100" width="100" alt="">
        <h1 class="h3 fw-bold mb-4 text-center">Painel Administrativo</h1>

        <h2 class="h3 fw-light fs-4">Crie sua conta para acessar</h2>

        <?php
        // Exibe a mensagem na página
        if (!empty($mensagem)) {
            echo '<div class="alert alert-danger" role="alert">' . $mensagem . '</div>';
        } else if (!empty($mensagemSucesso)) {
            echo '<div class="alert alert-success" role="alert">' . $mensagemSucesso  . '
<a href="login.php">Clique aqui para fazer login</a>
</div>';
        }
        ?>

        <div class="form-floating mb-4">
            <input type="text" class="form-control" name="matricula" id="matricula" placeholder="75984">
            <label for="matricula">Matricula</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
            <label for="senha">Senha Painel</label>
        </div>

        <div class="form-floating mt-2">
            <input type="password" class="form-control" name="senha2" id="senha2" placeholder="Repita sua Senha">
            <label for="senha2">Repita sua Senha Painel</label>
        </div>

        <button class="btn btn-primary w-100 py-2 mt-4" type="submit" id="submit" name="submit">Cadastrar</button>

        <p class="fs-6 mt-4 text-light text-center">ZELLO 2024 | TODOS OS DIREITOS RESERVADOS</p>
    </form>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
