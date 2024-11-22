<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery with Popup</title>
    <link rel="stylesheet" href="/file_php/HKTK/public/css/museum.css">
</head>

<body>
        
    <div id="headerline">
        <a href="?controller=access" class="back-button">
            <img src="/file_php/HKTK/public/media/svg/return-svgrepo-com.svg" alt="" style="height: 20px;">
        </a>
    </div>
    <h1 style="text-align: center;">MUSEUM</h1>
    <div class="gallery-container">
        <div class="column">
            <div class="image-card" onclick="openPopup('https://vnmh.egal.vn/tours/vietnamthoitiensu/')">
                <img src="/file_php/HKTK/public/media/image/anhcovn.jpg" alt="Việt Nam thời tiền sử">
                <h3>Việt Nam thời tiền sử</h3>
                <p>Explore the prehistoric times of Vietnam.</p>
            </div>
            <div class="image-card" onclick="openPopup('https://vnmh.egal.vn/tours/ngodinhtienlelytran/')">
                <img src="/file_php/HKTK/public/media/image/anhcovn.jpg" alt="Triều Ngô - Đinh - Tiền Lê - Lý, Trần">
                <h3>Triều Ngô - Đinh - Tiền Lê - Lý, Trần</h3>
                <p>Learn about the dynasties of Ngô, Đinh, Tiền Lê, Lý, Trần.</p>
            </div>
            <div class="image-card" onclick="openPopup('https://vnmh.egal.vn/tours/nghethuatchampa/')">
                <img src="/file_php/HKTK/public/media/image/anhcovn.jpg" alt="Nghệ thuật Champa">
                <h3>Nghệ thuật Champa</h3>
                <p>Discover the art of Champa.</p>
            </div>
            <div class="image-card" onclick="openPopup('https://vnmh.egal.vn/tours/trungbayngoaitroi/')">
                <img src="/file_php/HKTK/public/media/image/anhcovn.jpg" alt="Trưng bày ngoài trời">
                <h3>Trưng bày ngoài trời</h3>
                <p>Explore the outdoor exhibitions.</p>
            </div>
        </div>

        <div class="column">
            <div class="image-card" onclick="openPopup('https://vnmh.egal.vn/tours/dongson/')">
                <img src="/file_php/HKTK/public/media/image/anhcovn.jpg" alt="Văn hóa Đông Sơn">
                <h3>Văn hóa Đông Sơn</h3>
                <p>Discover the Đông Sơn culture.</p>
            </div>
            <div class="image-card" onclick="openPopup('https://vnmh.egal.vn/tours/Oceo-Phunam/')">
                <img src="/file_php/HKTK/public/media/image/anhcovn.jpg" alt="Óc Eo - Phù Nam">
                <h3>Óc Eo - Phù Nam</h3>
                <p>Explore the Óc Eo and Phù Nam cultures.</p>
            </div>
            <div class="image-card" onclick="openPopup('https://vnmh.egal.vn/tours/hodennguyen/')">
                <img src="/file_php/HKTK/public/media/image/anhcovn.jpg" alt="Việt Nam từ triều Hồ đến triều Nguyễn">
                <h3>Việt Nam từ triều Hồ đến triều Nguyễn</h3>
                <p>Learn about Vietnam from the Hồ to Nguyễn dynasties.</p>
            </div>
        </div>

    </div>

    <!-- Popup Container -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <iframe id="popupIframe" style="width: 100%; height: 100%; border: none;"></iframe>
        </div>
    </div>

    <script src="/file_php/HKTK/public/media/js/museum.js"></script>

    <script>
        function openPopup(src) {
            var iframe = document.getElementById('popupIframe');
            iframe.src = src;
            var popup = document.getElementById('popup');
            popup.style.display = "block";
        }

        function closePopup() {
            var popup = document.getElementById('popup');
            popup.style.display = "none";
            var iframe = document.getElementById('popupIframe');
            iframe.src = ""; // Reset iframe src to stop the content
        }
        document.addEventListener('keydown', function(event) {
            // Kiểm tra xem phím có phải là mũi tên lên, xuống, trái, phải không
            if (event.key === "ArrowUp" || event.key === "ArrowDown" || event.key === "ArrowLeft" || event.key === "ArrowRight") {
                event.preventDefault(); // Chặn sự kiện mặc định của phím
            }
        });
        
    </script>
    <script src="../js/main.js"></script>

</body>

</html>