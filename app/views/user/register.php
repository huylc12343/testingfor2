<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="../public/css/register.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <div class="register-container">
        <form id="registerForm" action="?controller=addUser" method="post">
            <h2>Đăng Ký</h2>
            <div class="input-group">
                <label for="fullname">Họ và Tên</label>
                <input type="text" id="fullname" name="fullname" placeholder="Nhập Họ và Tên" required>
            </div>
            <div class="input-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="input-group">
                <label for="password">Nhập lại Mật khẩu</label>
                <input type="password" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu" required>
            </div>
            <button type="submit" name="btn_create">Đăng ký</button>
            <p id="error-message"></p>
        </form>
        <a href="?controller=home" class="btn btn-primary" style="width: 100%;">Quay lại</a>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>
