const fs = require('fs');
const path = require('path');

// Đường dẫn đến file users.txt
const filePath = path.join(__dirname, '../data/users.txt'); 

// Hàm để ghi dữ liệu vào file users.txt
function registerUser(username, password) {
    // Kiểm tra xem file đã tồn tại hay chưa
    fs.readFile(filePath, 'utf8', (err, data) => {
        if (err && err.code !== 'ENOENT') {
            console.error('Lỗi khi đọc file:', err);
            return;
        }

        // Kiểm tra xem người dùng đã tồn tại chưa
        const users = data ? data.split('\n').map(line => line.split(',')[0]) : [];
        if (users.includes(username)) {
            console.log('Tên người dùng đã tồn tại.');
            return;
        }

        // Ghi người dùng vào file
        fs.appendFile(filePath, `${username},${password}\n`, (err) => {
            if (err) {
                console.error('Lỗi khi lưu dữ liệu:', err);
                return;
            }
            console.log('Đăng ký thành công!');
        });
    });
}

// Ví dụ về việc gọi hàm để đăng ký
// Bạn có thể thay thế giá trị này bằng dữ liệu từ form hoặc đầu vào khác
registerUser('user1', 'password1');
