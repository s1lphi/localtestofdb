<?php
header('Access-Control-Allow-Origin: http://fordevtest.local');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json');

require 'config.php';

$data = json_decode(file_get_contents("php://input"));

$email = $data->email ?? '';
$password = $data->password ?? '';

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    echo json_encode(['message' => 'Вхід успішний']);
} else {
    echo json_encode(['message' => 'Невірний логін або пароль']);
}
