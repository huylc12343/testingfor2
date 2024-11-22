const express = require('express');
const fs = require('fs');
const bodyParser = require('body-parser');

const app = express();
app.use(bodyParser.json());

// Xử lý đăng ký
app.post('/register', (req, res) => {
    const { username, password } = req.body;

    // Đọc file JSON để thêm dữ liệu mới
    fs.readFile('users.json', 'utf8', (err, data) => {
        if (err) {
            return res.status(500).send('Lỗi đọc file JSON.');
        }

        let users = JSON.parse(data || '[]');

        // Thêm người dùng mới vào danh sách
        users.push({ username, password });

        // Ghi lại file JSON với dữ liệu mới
        fs.writeFile('users.json', JSON.stringify(users, null, 2), (err) => {
            if (err) {
                return res.status(500).send('Lỗi ghi file JSON.');
            }
            res.send('Đăng ký thành công!');
        });
    });
});

// Khởi động server
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Server chạy tại http://localhost:${PORT}`);
});
