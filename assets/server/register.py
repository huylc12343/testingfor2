from flask import Flask, request, jsonify
import os

app = Flask(__name__)
from flask_cors import CORS
CORS(app)

# Đường dẫn tuyệt đối đến file users.txt
BASE_DIR = os.path.dirname(os.path.abspath(__file__))  # Thư mục chứa register.py
DATA_FILE = os.path.join(BASE_DIR, '../data/users.txt')  # Đường dẫn đến users.txt

@app.route('/register', methods=['POST'])
def register():
    username = request.form.get('username')
    password = request.form.get('password')

    # Kiểm tra nếu tên người dùng đã tồn tại
    if not os.path.exists(DATA_FILE):
        open(DATA_FILE, 'w').close()  # Tạo file nếu chưa tồn tại

    with open(DATA_FILE, 'r') as f:
        existing_users = f.readlines()

    for line in existing_users:
        existing_username = line.split(',')[0].strip()
        if existing_username == username:
            return jsonify({'success': False, 'message': 'Tên đăng nhập đã tồn tại.'}), 400

    # Lưu người dùng mới vào file
    with open(DATA_FILE, 'a') as f:
        f.write(f"{username},{password}\n")

    return jsonify({'success': True, 'message': 'Đăng ký thành công!'}), 200

if __name__ == '__main__':
    app.run(debug=True)
