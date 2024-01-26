<?php

session_start();

if (isset($_POST['submit'])) {
    include 'config.php';

    // Recupera a matrícula e senha do formulário
    $MATRICULA = $_POST['matricula'];
    $SENHA_PAINEL = $_POST['senha'];

    // Proteção contra SQL injection usando prepared statement
    $stmt = $conn->prepare("SELECT MATRICULA, SENHA_PAINEL FROM funcionarios_info WHERE MATRICULA = ?");
    $stmt->bind_param("s", $MATRICULA);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($matricula, $senhaHash);
        $stmt->fetch();

        // Verifica se a senha fornecida está correta
        if (password_verify($SENHA_PAINEL, $senhaHash)) {
            // Login bem-sucedido
            $_SESSION['MATRICULA'] = $matricula;
            header("Location: ../protected-pages/index.php");
            exit();
        } else {
            // Senha incorreta
            echo "Senha incorreta. Tente novamente.";
        }
    } else {
        // Matrícula não encontrada
        echo "Matrícula não encontrada. Tente novamente.";
    }

    $stmt->close();
    $conn->close();
}