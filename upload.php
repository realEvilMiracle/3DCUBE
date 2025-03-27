<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';
    
    if (!empty($_FILES['photo'])) {
        $filename = uniqid() . '_' . basename($_FILES['photo']['name']);
        $targetPath = $uploadDir . $filename;

        if (validateImage($_FILES['photo'])) {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetPath)) {
                $stmt = $pdo->prepare("INSERT INTO photos (filename, filepath) VALUES (?, ?)");
                $stmt->execute([$filename, $targetPath]);
                $success = "Photo uploaded successfully!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Photo</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Upload Your Photo</h2>
        <?php if(isset($success)): ?>
            <div class="alert success"><?= $success ?></div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="photo" accept="image/*" required>
            <button type="submit" class="btn">Upload</button>
        </form>
        <a href="index.html" class="btn">На главную</a>
    </div>
</body>
</html>