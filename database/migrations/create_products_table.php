<?php
try {
    // Sử dụng 127.0.0.1 để tránh lỗi Socket trên macOS
    $host = "127.0.0.1";
    $dbname = "lab5_mvc";
    $user = "root";
    $pass = ""; 

    $pdo = new PDO("mysql:host=$host;port=3306;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        price INT NOT NULL,
        description TEXT
    ) ENGINE=INNODB;";

    $pdo->exec($sql);
    echo "--- Migration: Tạo bảng products thành công! ---\n";
} catch (PDOException $e) {
    echo "Lỗi Migration: " . $e->getMessage() . "\n";
}