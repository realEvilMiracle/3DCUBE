<?php
function validateImage($file) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $maxSize = 5 * 1024 * 1024; // 5MB

    if (!in_array($file['type'], $allowedTypes)) {
        die("Invalid file type");
    }

    if ($file['size'] > $maxSize) {
        die("File too large");
    }

    return true;
}
?>