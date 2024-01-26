<?php
session_start();

// Inicialização de variáveis
$mensagem = '';

if (isset($_POST['submit'])) {
    include 'php/config.php';

    // Recupera a matrícula e senha do formulário
    $MATRICULA = $_POST['matricula'];
    $SENHA_PAINEL = $_POST['senha'];

    // Proteção contra SQL injection usando prepared statement
    $stmt = $conn->prepare("SELECT MATRICULA, SENHA_PAINEL, CADASTRO_PAINEL FROM funcionarios_info WHERE MATRICULA = ?");
    $stmt->bind_param("s", $MATRICULA);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($matricula, $senhaHash, $cadastroPainel);
        $stmt->fetch();

        // Verifica se o CADASTRO_PAINEL é verdadeiro
        if (!$cadastroPainel) {
            // Usuário já possui uma conta
            $mensagem = "O usuário não possui uma conta no painel.";
        } else {
            // Verifica se a senha fornecida está correta
            if (password_verify($SENHA_PAINEL, $senhaHash)) {
                // Login bem-sucedido
                $_SESSION['MATRICULA'] = $matricula;
                header("Location: protected-pages/index.php");
                exit();
            } else {
                // Senha incorreta
                $mensagem = "Senha incorreta. Tente novamente.";
            }
        }
    } else {
        // Matrícula não encontrada
        $mensagem = "Matrícula não encontrada. Tente novamente.";
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
    <title>Zlo Admin - Login</title>
    <link rel="stylesheet" href="css/css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/login-senha-recuperacao.js"></script>
    <link rel="icon" type="image/x-icon" href="images/favicon-zello.png">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
<main class="w-100 m-auto form-container">
    <form action="login.php" method="post" id="loginForm">
        <img src="images/logo-zello.svg" class="mb-1 mx-auto d-block" height="100" width="100" alt="">
        <h1 class="h3 fw-bold mb-4 text-center">Painel Administrativo</h1>

        <?php
        // Exibe a mensagem na página
        if (!empty($mensagem)) {
            echo '<div class="alert alert-danger" role="alert">' . $mensagem . '</div>';
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

        <p class="fs-6 mt-2 mb-2 text-body-secondary text-lg-start text-muted meuTexto" id="recuperarSenha">Esqueci minha senha</p>

        <button class="btn btn-success w-100 py-2 mt-4" type="submit" id="submit" name="submit">Entrar</button>


        <p class="fs-6 mt-4 text-light text-center">Zello 2024 | Todos os direitos reservados</p>

        <!-- Modal -->
        <div class="modal fade" id="modalRecuperar" tabindex="-1" aria-labelledby="modalRecuperarSenha" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalRecuperarSenha">Recuperação de senha funcionário</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Prezado(a) funcionário(a),<br><br>

                        Por motivos de segurança, informamos que não realizamos recuperação de senhas via internet.
                        Para garantir a integridade dos nossos dados, as trocas de senha só podem ser realizadas pela equipe de TI.<br><br>
                        Nenhum membro da equipe tem acesso à sua senha atual, visando proteger suas informações.<br><br>

                        Com base nessas diretrizes, solicitamos que você abra um chamado para o reset de senha. Por favor, toque em "Abrir Chamado" e preencha as informações solicitadas.<br><br>


                        Agradecemos pela compreensão e colaboração no fortalecimento das medidas de segurança de nossos sistemas.<br><br>

                        Atenciosamente,<br>
                        <strong>Equipe de TI</strong> (Tecnologia e Infraestrutura)
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-warning">Abrir chamado</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
