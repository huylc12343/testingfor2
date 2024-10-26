// function getData() {
//     const urlParams = new URLSearchParams(window.location.search);
//     const dataParam = urlParams.get('data');
//     let dataUrl;

//     // Xác định đường dẫn đến file JSON dựa vào tham số
//     if (dataParam === "lsvn") {
//         dataUrl = "../data/finaldatavn.json"; // Đường dẫn file JSON cho lịch sử Việt Nam
//         $("#headerline").append("<h1>Lịch sử Việt Nam</h1>");
//     } else if (dataParam === "lsqt") {
//         dataUrl = "../data/finaldatavn.json"; // Đường dẫn file JSON cho lịch sử Quảng Trị
//         $("#headerline").append("<h1>Lịch sử Quảng Trị</h1>");
//     } else {
//         alert("Không có dữ liệu phù hợp."); // Thông báo nếu không có tham số
//         return;
//     }

//     $.getJSON(dataUrl, function(data) {
//         // Gọi hàm để hiển thị dữ liệu
//         displayData(data);
//     }).fail(function() {
//         alert("Lỗi tải dữ liệu từ file JSON.");
//     });
// }

// Hàm đệ quy để hiển thị dữ liệu
// function displayData(data) {
//     for (const period in data) {
//         const periodData = data[period];

//         // Lặp qua các thời kỳ con
//         for (const subPeriod in periodData) {
//             const subPeriodData = periodData[subPeriod];

//             // Kiểm tra nếu là một mảng thì lặp qua từng mục
//             if (Array.isArray(subPeriodData)) {
//                 subPeriodData.forEach(item => {
//                     const year = item.year || "N/A"; // Xử lý nếu không có year
//                     const side = (year % 2 === 0) ? "right" : "left";
//                     const section = $('<div class="event ' + side + '" onclick="showPopup(\'popup-' + year + '\')"></div>');
                    
//                     section.append('<div class="event-content"></div>');
//                     section.find('.event-content').append('<h2>' + year + '</h2>');
//                     section.find('.event-content').append('<h3>' + item.title + '</h3>');
//                     section.find('.event-content').append('<p>' + item.content + '</p>');
//                     $('#timeline').append(section);

//                     const modal = $('<div id="popup-' + year + '" class="popup" style="display:none;"></div>');
//                     const modalContent = $('<div class="modal-content"></div>');
//                     modalContent.append('<span class="close-btn" onclick="closePopup()">&times;</span>');
//                     modalContent.append('<h2>' + item.title + '</h2>');
//                     modalContent.append('<p>' + item.content + '</p>');
//                     modal.append(modalContent);
//                     $('#modal-popup').append(modal);

//                     // Kiểm tra nếu có con
//                     if (item.children && Array.isArray(item.children)) {
//                         displayData({ [year]: item.children }); // Gọi đệ quy cho các con
//                     }
//                 });
//             } else {
//                 // Xử lý các phần không phải là mảng nếu cần
//                 // Có thể bổ sung thêm logic ở đây
//             }
//         }
//     }
// }

function goBack() {
    window.history.back();
}