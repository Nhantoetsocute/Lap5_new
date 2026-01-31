<?php
require_once 'vendor/autoload.php';
use App\Models\Product;
use App\Models\Student;

$page = $_GET['page'] ?? 'home';
$productModel = new Product();

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
        echo "<h1>404 - Not Found</h1>";
        break;
}