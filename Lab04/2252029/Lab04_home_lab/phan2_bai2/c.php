<?php
include 'DBconnect.php';  // Đảm bảo kết nối cơ sở dữ liệu

// Lấy dữ liệu từ request
$data = json_decode(file_get_contents("php://input"), true);

try {
    // Kiểm tra các trường dữ liệu
    if (empty($data['id']) || empty($data['name']) || empty($data['price'])) {
        throw new Exception("ID, Name, and Price are required.");
    }

    // Cập nhật sản phẩm trong cơ sở dữ liệu
    $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?");
    $stmt->execute([$data['name'], $data['description'], $data['price'], $data['image'], $data['id']]);

    // Trả về thông báo thành công dưới dạng JSON
    echo json_encode(['message' => 'Product updated successfully']);

} catch (Exception $e) {
    // Nếu có lỗi, trả về lỗi dưới dạng JSON
    echo json_encode(['error' => 'Error updating product: ' . $e->getMessage()]);
}
?>
