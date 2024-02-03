<?php
session_start();

$host = "127.0.0.1";
$port = 3306;
$user = "root";
$password = "";
$database = "zello_painel";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function generate_short_url($custom_url = null) {
    if ($custom_url) {
        return $custom_url;
    } else {
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($characters), 0, 6);
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['url'])) {
        http_response_code(400);
        echo json_encode(['error' => 'A URL não foi fornecida']);
        exit();
    }

    $original_url = $data['url'];
    $custom_url = isset($data['custom_url']) ? $data['custom_url'] : null;

    if ($custom_url) {
        $stmt = $conn->prepare("SELECT id FROM links WHERE custom_url = ?");
        $stmt->bind_param("s", $custom_url);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result) {
            http_response_code(400);
            echo json_encode(['error' => 'O link personalizado já existe']);
            exit();
        }
    } else {
        $custom_url = generate_short_url();
    }

    $user_matricula = isset($_SESSION['matricula']) ? $_SESSION['matricula'] : null;

    if ($user_matricula) {
        $stmt = $conn->prepare("SELECT nome FROM funcionarios_info WHERE matricula = ?");
        $stmt->bind_param("s", $user_matricula);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        $user_nome = $result ? $result['nome'] : null;

        if ($user_nome) {
            $stmt = $conn->prepare("INSERT INTO links (original_url, custom_url, matricula, nome) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $original_url, $custom_url, $user_matricula, $user_nome);
            $stmt->execute();

            http_response_code(200);
            echo json_encode(['short_url' => "http://localhost:5000/{$custom_url}"]);
            exit();
        }
    }

    http_response_code(500);
    echo json_encode(['error' => 'Erro ao obter dados do usuário']);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $short_url = basename($_SERVER["REQUEST_URI"]);

    $stmt = $conn->prepare("SELECT original_url FROM links WHERE custom_url = ?");
    $stmt->bind_param("s", $short_url);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result) {
        $original_url = $result['original_url'];
        header("Location: $original_url", true, 302);
        exit();
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Link não encontrado']);
        exit();
    }
}

$conn->close();
