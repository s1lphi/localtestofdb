<?php
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['message' => 'Неавторизовано']);
    exit;
}

echo json_encode(['message' => 'Привіт, користувачу #' . $_SESSION['user_id']]);
