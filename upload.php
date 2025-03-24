<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузить фото</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Загрузите ваше фото</h1>
        <form action="includes/upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="photo" accept="image/*" required>
            <button type="submit">Загрузить</button>
        </form>
    </div>
</body>
</html>