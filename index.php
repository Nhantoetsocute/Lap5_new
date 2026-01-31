<?php
require_once 'vendor/autoload.php';
use App\Models\Product;
use App\Models\Student;

$page = $_GET['page'] ?? 'home';
$productModel = new Product();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lab 5 - Quản lý Sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php?page=home">Nguyễn Bá Nhân D18CNPM2</a>
        <div class="navbar-nav">
            <a class="nav-link <?= $page == 'home' ? 'active' : '' ?>" href="index.php?page=home">Trang chủ</a>
            <a class="nav-link <?= $page == 'product-list' ? 'active' : '' ?>" href="index.php?page=product-list">Danh sách sản phẩm</a>
            <a class="nav-link btn btn-primary btn-sm text-white ms-lg-3" href="index.php?page=product-add">Thêm sản phẩm mới</a>
        </div>
    </div>
</nav>

<div class="container">
    <?php
    switch ($page) {
        case 'home':
            $student = new Student();
            $studentInfo = $student->getInfo();
            $message = "Hệ thống MVC & Faker";
            include 'views/home.php';
            break;

        case 'product-list':
            $products = $productModel->all();
            include 'views/product-list.php';
            break;

        case 'product-add':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $productModel->create($_POST['name'], $_POST['price']);
                header("Location: index.php?page=product-list");
            }
            include 'views/product-form.php';
            break;

        case 'product-edit':
            $id = $_GET['id'];
            $product = $productModel->find($id);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $productModel->update($id, $_POST['name'], $_POST['price']);
                header("Location: index.php?page=product-list");
            }
            include 'views/product-form.php';
            break;

        case 'product-delete':
            $id = $_GET['id'];
            $productModel->delete($id);
            header("Location: index.php?page=product-list");
            break;

        default:
            echo "<h1 class='text-center'>404 - Not Found</h1>";
            break;
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>