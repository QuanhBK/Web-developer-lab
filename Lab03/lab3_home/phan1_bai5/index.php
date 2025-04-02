<?php
  // Khởi tạo biến $result
  $result = '';

  // Kiểm tra nếu có dữ liệu gửi qua POST
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Lấy dữ liệu từ form
    $num1 = $_POST['num1'];
    $num2 = isset($_POST['num2']) ? $_POST['num2'] : null; // Kiểm tra nếu có số thứ hai
    $operator = $_POST['operator'];

    // Nếu phép toán là nghịch đảo, chỉ sử dụng num1
    if ($operator == 'inverse') {
      $num2 = null;  // Đảm bảo num2 không được dùng cho phép toán nghịch đảo
    }

    // Xử lý phép toán
    switch($operator):
      case 'add':
        $result = $num1 + $num2;
        break;
      case 'sub':
        $result = $num1 - $num2;
        break;
      case 'mul':
        $result = $num1 * $num2;
        break;
      case 'div':
        if ($num2 == 0) {
          $result = "Không thể chia do số chia bằng 0";
        } else {
          $result = $num1 / $num2;
        }
        break;
      case 'pow':
        $result = pow($num1, $num2);
        break;
      case 'inverse':
        if ($num1 == 0) {
          $result = "Không thể tính nghịch đảo của 0";
        } else {
          $result = 1 / $num1;  // Chỉ sử dụng num1 cho phép toán nghịch đảo
        }
        break;
      default:
        $result = "Lựa chọn phép toán không hợp lệ.";
        break;
    endswitch;
  }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máy Tính Cơ Bản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Header -->
    <header class="text-center py-3 bg-primary text-white">
        <h1>Máy Tính Cơ Bản</h1>
        <p>Chọn phép toán trước rồi nhập số</p>
    </header>

    <!-- Máy tính -->
    <section class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg">
            <div class="card-body text-center">
                <!-- Form nhập dữ liệu -->
                <form method="POST" action="index.php">
                    <div class="mb-3">
                        <select id="operation" class="form-select" name="operator" required>
                            <option value="add">Cộng (+)</option>
                            <option value="sub">Trừ (-)</option>
                            <option value="mul">Nhân (×)</option>
                            <option value="div">Chia (÷)</option>
                            <option value="pow">Lũy thừa (^)</option>
                            <option value="inverse">Nghịch đảo (1/n)</option>
                        </select>
                    </div>

                    <!-- Nhập số -->
                    <div class="mb-3">
                        <input type="number" id="num1" class="form-control text-center" name="num1" placeholder="Số thứ nhất" required>
                    </div>

                    <!-- Nhập số thứ 2 chỉ khi phép toán không phải nghịch đảo -->
                    <?php if ($operator != 'inverse'): ?>
                    <div class="mb-3" id="num2_div">
                        <input type="number" id="num2" class="form-control text-center" name="num2" placeholder="Số thứ hai" required>
                    </div>
                    <?php endif; ?>

                    <!-- Nút tính toán -->
                    <button type="submit" class="btn btn-primary w-100">Tính Toán</button>

                    <!-- Kết quả -->
                    <div class="mt-4 text-center fw-bold text-primary">
                        <?php 
                            // Hiển thị kết quả nếu có
                            if ($result != '') {
                                echo "<h2>Kết quả: " . $result . "</h2>";
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>
</html>
