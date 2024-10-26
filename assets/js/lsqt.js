function showCategory(category) {
    const imageDisplay = document.getElementById("imageDisplay");
    imageDisplay.innerHTML = ""; // Xóa nội dung cũ

    let images = [];
    if (category === "category1") {
        images = [
            { src: "../image/anhcovn.jpg", title: "Ảnh 1 - Category 1", description: "Đây là mô tả của ảnh 1 trong Category 1", video: "https://www.youtube.com/watch?v=gMRmuHtVElg" },
            { src: "../image/anhcovn.jpg", title: "Ảnh 2 - Category 1", description: "Đây là mô tả của ảnh 2 trong Category 1", video: "https://www.youtube.com/watch?v=6praEM_RDTc&t" },
            { src: "../image/anhcovn.jpg", title: "Ảnh 3 - Category 1", description: "Đây là mô tả của ảnh 3 trong Category 1", video: "https://www.youtube.com/watch?v=mIQM9wrErBQ" },
            { src: "../image/anhcovn.jpg", title: "Ảnh 4 - Category 1", description: "Đây là mô tả của ảnh 4 trong Category 1", video: "https://www.youtube.com/watch?v=819spKESC5w" },
            { src: "../image/anhcovn.jpg", title: "Ảnh 5 - Category 1", description: "Đây là mô tả của ảnh 5 trong Category 1", video: "https://www.youtube.com/watch?v=oSoZwZ-AqnQ" },
            { src: "../image/anhcovn.jpg", title: "Ảnh 5 - Category 1", description: "Đây là mô tả của ảnh 6 trong Category 1", video: "https://www.youtube.com/watch?v=RH7i8Fd__h4" }
        ];
    } else if (category === "category2") {
        images = [
            { src: "../image/chimhac.jpg", title: "Ảnh 1 - Category 2", description: "Đây là mô tả của ảnh 1 trong Category 2", video: "https://www.youtube.com/watch?v=gMRmuHtVElg" },
            { src: "../image/chimhac.jpg", title: "Ảnh 2 - Category 2", description: "Đây là mô tả của ảnh 2 trong Category 2", video: "https://www.youtube.com/watch?v=gMRmuHtVElg" }
        ];
    }

    images.forEach(image => {
        const imageContainer = document.createElement("div");
        imageContainer.classList.add("image-container");

        const img = document.createElement("img");
        img.src = image.src;
        img.alt = image.title;
        img.title = image.title;

        // Thêm sự kiện onclick cho ảnh để mở popup video
        img.onclick = () => {
            openPopup(image.video);
        };

        const description = document.createElement("p");
        description.innerText = image.description;

        imageContainer.appendChild(img);
        imageContainer.appendChild(description);
        imageDisplay.appendChild(imageContainer);
    });
}

function openPopup(videoSrc) {
    const videoPopup = document.getElementById("videoPopup");
    const popupVideo = document.getElementById("popupVideo");

    popupVideo.src = videoSrc; // Đặt nguồn video
    videoPopup.style.display = "flex"; // Hiển thị popup
}

function closePopup() {
    const videoPopup = document.getElementById("videoPopup");
    const popupVideo = document.getElementById("popupVideo");

    popupVideo.pause(); // Dừng video khi đóng popup
    popupVideo.src = ""; // Xóa nguồn video
    videoPopup.style.display = "none"; // Ẩn popup
}
