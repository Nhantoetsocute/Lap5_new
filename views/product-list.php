<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh sách sản phẩm</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h3>Quản lý sản phẩm</h3>
            <a href="index.php?page=product-add" class="btn btn-primary">+ Thêm mới</a>
        </div>
        <table class="table table-white table-hover shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $p): ?>
                <tr>
                    <td><?= $p->id ?></td>
                    <td><?= $p->name ?></td>
                    <td><?= number_format($p->price) ?>đ</td>
                    <td>
                        <a href="index.php?page=product-edit&id=<?= $p->id ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="index.php?page=product-delete&id=<?= $p->id ?>" 
                           onclick="return confirm('Xác nhận xóa?')" 
                           class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>