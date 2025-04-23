<?php
include 'DBconnect.php';  // Đảm bảo kết nối cơ sở dữ liệu

// Lấy dữ liệu từ request
$data = json_decode(file_get_contents("php://input"), true);

try {
    // Kiểm tra ID của sản phẩm
    if (empty($data['id'])) {
        throw new Exception("ID is required.");
    }

    // Xóa sản phẩm khỏi cơ sở dữ liệu
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$data['id']]);

    // Trả về thông báo thành công dưới dạng JSON
    echo json_encode(['message' => 'Product deleted successfully']);

} catch (Exception $e) {
    // Nếu có lỗi, trả về lỗi dưới dạng JSON
    echo json_encode(['error' => 'Error deleting product: ' . $e->getMessage()]);
}
?>
