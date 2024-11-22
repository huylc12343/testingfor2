<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echoes Of The Past</title>
    <link rel="stylesheet" href="/file_php/HKTK/public/css/access.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Thêm jQuery nếu chưa có -->
</head>

<body>

    <div class="timeline">
        <a id="logoutButton" href="?controller=logout">Đăng xuất</a>

        <div class="section lsvn"
        style="background-image: url(/file_php/HKTK/public/media/image/1.jpg); width:100%;height:auto; background-position: center; background-repeat: no-repeat;">
            <a href="?controller=lsvn&data=lsvn" class="dir">
                <div class="video-cover">
                    <video src="/file_php/HKTK/public/media/video/lsvn.mp4" class="appear" muted loop playsinline preload="metadata">
                    </video>
                </div>
            </a>
        </div>


        <div class="section lsqt"
            style="background-image: url(/file_php/HKTK/public/media/image/2.jpg); width:100%;height:auto; background-position: center; background-repeat: no-repeat;">
            <a class="dir" href="?controller=lsqt">
                <div class="video-cover">
                    <video src="/file_php/HKTK/public/media/video/lsqt.mp4" class="appear" muted loop playsinline preload="metadata">
                    </video>
                </div>
            </a>
        </div>

        <div class="section tlls"
            style="background-image: url(/file_php/HKTK/public/media/image/3.jpg); width:100%;height:auto; background-position: center; background-repeat: no-repeat;">
            <a class="dir" href="?controller=tlls">
                <div class="video-cover">
                    <video src="/file_php/HKTK/public/media/video/tlls.mp4" class="appear" muted loop playsinline preload="metadata">
                    </video>
                </div>
            </a>
        </div>

        <div class="section shop"
            style="background-image: url(/file_php/HKTK/public/media/image/4.jpg); width:100%;height:auto; background-position: center; background-repeat: no-repeat;">
            <a class="dir" href="?controller=shop">
                <div class="video-cover">
                    <video src="/file_php/HKTK/public/media/video/store.mp4" class="appear" muted loop playsinline preload="metadata">
                    </video>
                </div>
            </a>
        </div>
    </div>
    <script>
        // Xử lý tự động phát video khi hover vào section
        document.querySelectorAll('.section').forEach(section => {
            const video = section.querySelector('video');

            section.addEventListener('mouseenter', () => {
                if (video) {
                    video.play(); // Phát video khi hover
                }
            });

            section.addEventListener('mouseleave', () => {
                if (video) {
                    video.pause(); // Dừng video khi không hover
                    video.currentTime = 0; // Reset về thời gian ban đầu
                }
            });
        });

    </script>
</body>

</html>