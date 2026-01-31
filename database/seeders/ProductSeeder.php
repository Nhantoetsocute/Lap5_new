<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use Faker\Factory;

try {
    $host = "127.0.0.1";
    $dbname = "lab5_mvc";
    $user = "root";
    $pass = "";

    $pdo = new PDO("mysql:host=$host;port=3306;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $faker = Factory::create();
    
    echo "Đang khởi tạo dữ liệu mẫu...\n";
    for ($i = 0; $i < 10; $i++) {
        $stmt = $pdo->prepare("INSERT INTO products (name, price, description) VALUES (?, ?, ?)");
        $stmt->execute([
            $faker->sentence(3), 
            $faker->numberBetween(100, 1000) * 100, 
            $faker->paragraph()
        ]);
    }
    echo "--- Seeder: Đã thêm thành công 10 sản phẩm mẫu! ---\n";
} catch (Exception $e) {
    echo "Lỗi Seeder: " . $e->getMessage() . "\n";
}