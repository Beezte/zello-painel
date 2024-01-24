<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['MATRICULA'])) {
    header("Location: ../login.html"); // Redireciona para a página de login se não estiver autenticado
    exit();
}