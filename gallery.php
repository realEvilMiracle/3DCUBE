<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
</head>
<body>
    <div class="container">
        <h1>Галерея фото</h1>
        <div class="carousel">
            <?php
            require 'includes/db.php';
            $stmt = $pdo->query("SELECT filename FROM photos ORDER BY uploaded_at DESC");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div><img src="uploads/' . htmlspecialchars($row['filename']) . '" alt="Фото"></div>';
            }
            ?>
        </div>
        <a href="index.php" class="btn">На главную</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.carousel').slick({
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true
            });
        });
    </script>
</body>
</html>