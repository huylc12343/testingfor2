<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Sự Kiện Lịch Sử Việt Nam</title>
    <link rel="stylesheet" href="/file_php/HKTK/public/css/ls.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>
        <div id="headerline">
            <a href="?controller=access" class="back-button">
                <img src="/file_php/HKTK/public/media/svg/return-svgrepo-com.svg" alt="" style="height: 20px;">
            </a>
        </div>
    </h1>

    <div class="timeline" id="timeline"> 
        <!-- Nội dung sự kiện sẽ được tạo bởi JavaScript -->
    </div>

    <!-- Popup cho từng sự kiện -->
    <div id="modal-popup"></div>
    <div id="overlay" class="overlay" onclick="closePopup()"></div>

    <script>
        // Thay thế hàm getRandomSide bằng cách tính toán dựa trên chỉ số index
        function getSideByIndex(index) {
            return index % 2 === 0 ? "left" : "right"; // Sự kiện chẵn hiển thị bên trái, lẻ hiển thị bên phải
        }

        $(document).ready(function () {
            getData(); // Gọi hàm để lấy dữ liệu khi trang tải
        });

        function getData() {
            const urlParams = new URLSearchParams(window.location.search);
            const dataParam = urlParams.get('data');
            const thoiky = urlParams.get('thoiky');
            var thoikyh1 = "";
            let dataUrl;

            if (thoiky === "tiensu") {
                thoikyh1 = " tiền sử";
            } else if (thoiky === "sosu") {
                thoikyh1 = " sơ sử";
            } else if (thoiky === "codai") {
                thoikyh1 = " cổ đại";
            } else if (thoiky === "bacthuoc") {
                thoikyh1 = " bắc thuộc";
            } else if (thoiky === "quanchu") {
                thoikyh1 = " quân chủ";
            } else if (thoiky === "phapthuoc") {
                thoikyh1 = " thuộc Pháp";
            } else if (thoiky === "khangchien") {
                thoikyh1 = " kháng chiến";
            } else if (thoiky === "doimoi") {
                thoikyh1 = " mở cửa";
            }

            if (dataParam === "lsvn") {
                dataUrl = "/file_php/HKTK/public/media/data/lsvn.json"; // Đường dẫn file JSON cho lịch sử Việt Nam
                var section = $('<h1>Lịch sử Việt Nam thời kỳ' + thoikyh1 + '</h1>');
                $("#headerline").append(section);
            } else if (dataParam === "lsqt") {
                dataUrl = "../data/lsqt.json"; // Đường dẫn file JSON cho lịch sử Quảng Trị
                var section = $("<h1>Lịch sử Quảng Trị</h1>");
                $("#headerline").append(section);
            } else {
                alert("Không có dữ liệu phù hợp."); // Thông báo nếu không có tham số
                return;
            }

            $.getJSON(dataUrl, function (data) {
                if (dataParam === "lsvn" && thoiky) {
                    const result = data.filter(item => item.thoiky === thoiky);
                    if (result.length === 0) {
                        alert("Không có sự kiện nào cho thời kỳ này."); // Thông báo nếu không có kết quả
                        return;
                    }
                    $.each(result, function (index, item) {
                        var side = getSideByIndex(index);
                        var section = $('<div class="event ' + side + '" onclick="showPopup(\'popup-' + item.year + '\')"></div>');
                        section.append('<div class="event-content"></div>');
                        section.find('.event-content').append('<h2>' + item.year + '</h2>');
                        section.find('.event-content').append('<h3>' + item.title + '</h3>');
                        $('#timeline').append(section);

                        var modal = $('<div id="popup-' + item.year + '" class="popup" style="display:none;"></div>');
                        var modalContent = $('<div class="modal-content"></div>');
                        modalContent.append('<span class="close-btn" onclick="closePopup(\'popup-' + item.year + '\')">&times;</span>');
                        modalContent.append('<h2>' + item.title + '</h2>');
                        modalContent.append('<p>' + item.content + '</p>');
                        modal.append(modalContent);
                        $('#modal-popup').append(modal);
                    });
                } else {
                    $.each(data, function (index, item) {
                        var side = getSideByIndex(index);
                        var section = $('<div class="event ' + side + '" onclick="showPopup(\'popup-' + item.year + '\')"></div>');
                        section.append('<div class="event-content"></div>');
                        section.find('.event-content').append('<h2>' + item.year + '</h2>');
                        section.find('.event-content').append('<h3>' + item.title + '</h3>');
                        section.find('.event-content').append('<p>' + item.content + '</p>');
                        $('#timeline').append(section);

                        var modal = $('<div id="popup-' + item.year + '" class="popup" style="display:none;"></div>');
                        var modalContent = $('<div class="modal-content"></div>');
                        modalContent.append('<span class="close-btn" onclick="closePopup(\'popup-' + item.year + '\')">&times;</span>');
                        modalContent.append('<h2>' + item.title + '</h2>');
                        modalContent.append('<p>' + item.content + '</p>');
                        modalContent.append('<audio controls><source src="../audio/soundtest.mp3" type="audio/mpeg"></audio>');
                        modal.append(modalContent);
                        $('#modal-popup').append(modal);
                    });
                }
            }).fail(function () {
                alert("Lỗi tải dữ liệu từ file JSON.");
            });
        }



        function showPopup(popupId) {
            document.getElementById(popupId).style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        // Close popup
        function closePopup() {
            const popups = document.querySelectorAll('.popup');
            popups.forEach(popup => popup.style.display = 'none');
            document.getElementById('overlay').style.display = 'none';
        }


    </script>
    <script src="../js/main.js"></script>

</body>

</html>