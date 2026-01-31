<!DOCTYPE html>
<html lang="vi">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sản phẩm</title>
</head>
<body class="bg-light p-5">
    <div class="container bg-white p-4 shadow rounded" style="max-width: 600px;">
        <h3><?= isset($product) ? 'Cập nhật' : 'Thêm mới' ?> sản phẩm</h3>
        <form action="index.php?page=<?= isset($product) ? 'product-update&id='.$product->id : 'product-store' ?>" method="POST">
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="<?= $product->name ?? '' ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Giá</label>
                <input type="number" name="price" class="form-control" value="<?= $product->price ?? '' ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" rows="3"><?= $product->description ?? '' ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Lưu dữ liệu</button>
            <a href="index.php?page=product-list" class="btn btn-link w-100 mt-2">Quay lại</a>
        </form>
    </div>
</body>
</html>