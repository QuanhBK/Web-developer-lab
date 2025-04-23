<!DOCTYPE html>
<?php   
    session_start();
    // Nếu người dùng đã đăng nhập, chuyển hướng tới trang info.php
    if (isset($_SESSION['loggedin'])) {
        header('Location: info.php');
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
    <title>Login</title>
</head>
<body class="bg-light">
    <?php 
        $username_err = $password_err = null;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['username'])) {
                $username_err = "Please enter your username";
            }
            if (empty($_POST['password'])) {
                $password_err = "Please enter your password";
            }
            if ($username_err == null && $password_err == null) {
                session_regenerate_id();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];

                header('Location: info.php');
            }
            if (!empty($_POST["remember"])) {
                setcookie("username", $_POST["username"], time() + 3600);
                setcookie("password", $_POST["password"], time() + 3600);
            } else {
                setcookie("username", "", time() - 3600);
                setcookie("password", "", time() - 3600);
            }
        }
    ?>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="w-50 p-4 shadow-sm rounded bg-white">
            <h1 class="text-center fw-bold fs-1 mb-4">Login</h1>
            
            <div class="form-group mb-3">
                <label for="username" class="form-label"><i class="fas fa-user"></i> Username</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" 
                       class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                       value="<?php if (isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"
                >
                <div class="invalid-feedback"><?php echo $username_err; ?></div>
            </div>
            
            <div class="form-group mb-3">
                <label for="password" class="form-label"><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" 
                       class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                       value="<?php if (isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"
                >
                <div class="invalid-feedback"><?php echo $password_err; ?></div>
            </div>
            
            <div class="form-group mb-4">
                <input type="checkbox" name="remember"> <span>Remember me</span>
            </div>
            
            <div class="d-flex justify-content-center"> 
                <input type="submit" value="Login" class="btn btn-success w-100">
            </div>
        </form>
    </div>
</body>
</html>
