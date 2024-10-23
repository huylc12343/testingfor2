// Giả sử dữ liệu tài khoản được lưu dưới dạng một mảng (thông tin demo)
let userData = [
    { username: "", password: "" }
];

// Hàm lấy dữ liệu từ file TXT
function getData() {
    return new Promise((resolve, reject) => {
        const dataUrl = "../data/users.txt"; // Đường dẫn đến file TXT
        $.get(dataUrl, function(data) {
            const lines = data.split('\n'); // Tách dữ liệu theo từng dòng
            lines.forEach(line => {
                const [username, password] = line.split(','); // Tách tên và mật khẩu
                if (username && password) {
                    userData.push({ username: username.trim(), password: password.trim() }); // Thêm vào mảng
                }
            });
            resolve(); // Báo rằng dữ liệu đã được tải xong
        }).fail(function() {
            reject("Lỗi khi tải dữ liệu người dùng!"); // Thông báo lỗi nếu không tải được file
        });
    });
}

// Hàm kiểm tra đăng nhập
function checkLogin(username, password) {
    // Tìm trong dữ liệu userData
    const user = userData.find(user => user.username === username && user.password === password);
    
    // Kiểm tra nếu người dùng tồn tại
    return !!user; // Trả về true nếu tìm thấy người dùng, ngược lại là false
}

// Lấy form và xử lý sự kiện submit
document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Ngăn chặn form reload lại trang

    // Lấy giá trị từ form
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Tải dữ liệu từ file TXT trước khi kiểm tra đăng nhập
    getData().then(() => {
        // Gọi hàm kiểm tra đăng nhập sau khi dữ liệu đã được tải
        const isValidLogin = checkLogin(username, password);

        // Hiển thị kết quả
        const errorMessage = document.getElementById("error-message");
        if (isValidLogin) {
            errorMessage.style.color = "green";
            errorMessage.textContent = "Đăng nhập thành công!";
            window.location.href = "../../index.html"; // Chuyển trang sau khi đăng nhập thành công
        } else {
            errorMessage.style.color = "red";
            errorMessage.textContent = "Tên đăng nhập hoặc mật khẩu không đúng!";
        }
    }).catch((error) => {
        console.error(error); // Xử lý lỗi nếu việc tải dữ liệu thất bại
        const errorMessage = document.getElementById("error-message");
        errorMessage.style.color = "red";
        errorMessage.textContent = "Có lỗi xảy ra khi tải dữ liệu người dùng!";
    });
});
