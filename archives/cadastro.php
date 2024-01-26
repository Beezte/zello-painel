<?php
include 'config.php';


// Recupera a matrícula e senha do formulário
$MATRICULA = $_POST['matricula'];
$SENHA_PAINEL = $_POST['senha'];

// Proteção contra SQL injection usando prepared statement
$stmt = $conn->prepare("SELECT ACESSO_PAINEL, CADASTRO_PAINEL FROM funcionarios_info WHERE MATRICULA = ?");
$stmt->bind_param("s", $MATRICULA);
$stmt->execute();
$stmt->store_result();  // Armazena o resultado para poder verificar o número de linhas retornadas
$stmt->bind_result($acessoPainel, $cadastroPainel);
$stmt->fetch();

if ($stmt->num_rows > 0) {
    // A matrícula existe
    if ($acessoPainel === 0) {
        // ACESSO_PAINEL é falso, o funcionário não possui permissão
        echo "O funcionário não possui permissão para criar uma conta no painel.";
    } else {
        // ACESSO_PAINEL é verdadeiro
        if ($cadastroPainel) {
            // CADASTRO_PAINEL é verdadeiro, o funcionário já é cadastrado
            echo "O usuário já é cadastrado no painel.";
        } else {
            // CADASTRO_PAINEL é falso, atualiza para verdadeiro e encripta a senha
            $updateSql = "UPDATE funcionarios_info SET CADASTRO_PAINEL = TRUE, SENHA_PAINEL = ? WHERE MATRICULA = ?";
            $updateStmt = $conn->prepare($updateSql);

            if (isset($SENHA_PAINEL)) {
                $senhaCriptografada = password_hash($SENHA_PAINEL, PASSWORD_DEFAULT);
                $updateStmt->bind_param("ss", $senhaCriptografada, $MATRICULA);

                if ($updateStmt->execute()) {
                    echo "CADASTRO_PAINEL atualizado e senha encriptada com sucesso!";
                } else {
                    echo "Erro ao atualizar CADASTRO_PAINEL e encriptar senha: " . $updateStmt->error;
                }

                $updateStmt->close();
            } else {
                echo "Erro: A senha não foi fornecida.";
            }
        }
    }
} else {
    // A matrícula não existe
    echo "É preciso ser um funcionário verificado para ter acesso ao painel.";
}

// Fecha a conexão com o banco de dados
$stmt->close();
$conn->close();