<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Danh sách Người dùng</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ và Tên</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    foreach($users as $user){
                ?> 
                <tr>
                    <th scope="row"><?=$user->getId()?></th>
                    <td><?=$user->getFullname()?></td>
                    <td><?=$user->getUsername()?></td>
                    <td><?=$user->getPassword()?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <a href="?controller=addUser" class="btn btn-success">Đăng ký</a>
        <a href="?controller=login" class="btn btn-primary">Đăng nhập</a>
        <!-- <a href="../app/views/user/access.php" class="btn btn-danger">test</a> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>