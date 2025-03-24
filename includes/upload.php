<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    $uploadDir = 'assets/uploads/';
    $filename = uniqid() . '_' . basename($_FILES['photo']['name']);
    $uploadFile = $uploadDir . $filename;

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
        $stmt = $pdo->prepare("INSERT INTO photos (filename) VALUES (:filename)");
        $stmt->execute(['filename' => $filename]);
        echo "Фото успешно загружено!";
    } else {
        echo "Ошибка при загрузке файла.";
    }
}
?>