<?php
namespace App\Controllers;
use App\Models\Student;

class HomeController {
    public function index() {
        // 1. Chuẩn bị dữ liệu từ Model
        $message = "Hệ thống quản lý sinh viên Lab 5";
        $studentInfo = (new Student())->getInfo();

        // 2. Gọi View và truyền dữ liệu vào
        include 'views/home.php';
    }
}