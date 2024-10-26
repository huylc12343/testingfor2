document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Ngăn chặn form reload lại trang

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Gửi yêu cầu đăng ký tới server Flask
    $.post("http://127.0.0.1:5000/register", { username: username, password: password })
        .done(function(response) {
            window.location.href = "../pages/login.html"; // Chuyển tới trang đăng nhập
            alert(response.message); // Hiển thị thông báo thành công
        })
        .fail(function(xhr) {
            const response = JSON.parse(xhr.responseText);
            alert(response.message); // Hiển thị thông báo lỗi
        });
});

// Giả sử có một hàm kiểm tra tên đăng nhập đã tồn tại
function isUsernameTaken(username) {
    // Đây là nơi để kiểm tra tên đăng nhập
    // Có thể gọi AJAX để kiểm tra từ server hoặc dùng một mảng mẫu trong ứng dụng của bạn
    return false; // Chưa có kiểm tra thực tế
}
