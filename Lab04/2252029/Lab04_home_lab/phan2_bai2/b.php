<?php
include 'DBconnect.php';  // Đảm bảo kết nối cơ sở dữ liệu

// Lấy dữ liệu từ request
$data = json_decode(file_get_contents("php://input"), true);

try {
    // Kiểm tra các trường dữ liệu
    if (empty($data['name']) || empty($data['price'])) {
        throw new Exception("Name and price are required.");
    }

    // Thêm sản phẩm vào cơ sở dữ liệu
    $stmt = $pdo->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$data['name'], $data['description'], $data['price'], $data['image']]);

    // Trả về thông báo thành công dưới dạng JSON
    echo json_encode(['message' => 'Product added successfully']);

} catch (Exception $e) {
    // Nếu có lỗi, trả về lỗi dưới dạng JSON
    echo json_encode(['error' => 'Error adding product: ' . $e->getMessage()]);
}
?>
