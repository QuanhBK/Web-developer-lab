<!DOCTYPE html>
<?php
    session_start();
    // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang login.php
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
        exit;
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>User Information</title>
</head>
<body class="bg-light">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-50 p-4 shadow-sm rounded bg-white">
            <h1 class="text-center fw-bold fs-1 mb-4">User's Information</h1>
            
            <div class="mb-3">
                <label class="fw-bold"><i class="fas fa-user"></i> Username: </label>
                <span><?php echo $_SESSION['username']; ?></span>
            </div>
            
            <div class="mb-3">
                <label class="fw-bold"><i class="fas fa-lock"></i> Password: </label>
                <span><?php echo $_SESSION['password']; ?></span>
            </div>
            
            <div class="d-flex justify-content-center mt-5"> 
                <a href="logout.php" class="btn btn-danger w-100">Log out</a>
            </div>
        </div>
    </div>
</body>
</html>
