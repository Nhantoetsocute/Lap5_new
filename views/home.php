<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="p-5 mb-4 bg-white rounded-3 shadow-sm">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold text-primary">Chào mừng đến với MVC!</h1>
                <p class="col-md-8 fs-4 text-secondary"><?= $message ?></p>
                <div class="alert alert-info d-inline-block">
                    <i class="bi bi-person-circle"></i> <?= $studentInfo ?>
                </div>
                <hr class="my-4">
                <p>Dữ liệu trên được lấy từ <strong>Controller</strong> và <strong>Model</strong>.</p>
                <a href="index.php?page=home" class="btn btn-primary btn-lg">Làm mới trang</a>
            </div>
        </div>
    </div>
</body>
</html>