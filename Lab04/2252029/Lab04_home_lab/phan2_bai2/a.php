<?php
include 'DBconnect.php';  // Đảm bảo kết nối cơ sở dữ liệu

try {
    // Truy vấn cơ sở dữ liệu lấy sản phẩm
    $stmt = $pdo->prepare('SELECT * FROM products');
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Trả về dữ liệu dưới dạng JSON
    echo json_encode($products);

} catch (Exception $e) {
    // Nếu có lỗi, trả về lỗi dưới dạng JSON
    echo json_encode(['error' => 'Error fetching products: ' . $e->getMessage()]);
}
?>
