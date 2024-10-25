<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển đổi link affiliate</title>
    <link rel="stylesheet" href="style.css"> <!-- Nếu có file CSS -->
    <style>
        .copy-btn {
            margin-left: 10px;
            cursor: pointer;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }
        .copy-btn:active {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Chuyển đổi link affiliate</h1>
    
    <!-- Form để nhập văn bản -->
    <form id="convertForm" onsubmit="event.preventDefault(); convertText();">
        <label for="text">Nhập đoạn văn bản:</label>
        <textarea id="text" name="text" rows="10" cols="50" placeholder="Nhập đoạn văn bản có chứa các link affiliate"></textarea>
        <button type="submit">Chuyển đổi</button>
    </form>

    <!-- Vùng hiển thị kết quả chuyển đổi ngay bên dưới form -->
    <div id="result"></div>

    <script>
        // Hàm gửi dữ liệu qua AJAX mà không tải lại trang
        function convertText() {
            const text = document.getElementById("text").value; // Lấy nội dung trong textarea
            const xhr = new XMLHttpRequest(); // Tạo đối tượng XMLHttpRequest
            xhr.open("POST", "convert.php", true); // Gửi yêu cầu tới convert.php
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Hiển thị kết quả trong div #result
                    document.getElementById("result").innerHTML = xhr.responseText;

                    // Thêm sự kiện copy vào nút (nếu cần)
                    addCopyEventListeners();
                }
            };
            xhr.send("text=" + encodeURIComponent(text)); // Gửi dữ liệu
        }

        // Hàm thêm sự kiện copy cho các link
        function addCopyEventListeners() {
            const copyButtons = document.querySelectorAll(".copy-btn");
            copyButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const link = this.previousElementSibling.textContent;
                    copyToClipboard(link);
                    alert("Đã copy: " + link);
                });
            });
        }

        // Hàm sao chép link vào clipboard
        function copyToClipboard(text) {
            const textarea = document.createElement("textarea");
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);
        }
    </script>
</body>
</html>
