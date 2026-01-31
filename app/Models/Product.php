<?php
namespace App\Models;
use PDO;

class Product {
    private function connect() {
        $host = 'localhost';
        $db   = 'lab5_mvc';
        $user = 'root';
        $pass = ''; 
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public function all() {
        return $this->connect()->query("SELECT * FROM products ORDER BY id DESC")->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($name, $price) {
        $sql = "INSERT INTO products (name, price) VALUES (?, ?)";
        return $this->connect()->prepare($sql)->execute([$name, $price]);
    }

    public function find($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update($id, $name, $price) {
        $sql = "UPDATE products SET name = ?, price = ? WHERE id = ?";
        return $this->connect()->prepare($sql)->execute([$name, $price, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        return $this->connect()->prepare($sql)->execute([$id]);
    }
}