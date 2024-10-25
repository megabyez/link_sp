<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển đổi link affiliate</title>
    <link rel="stylesheet" href="style.css"> <!-- Liên kết tới file CSS nếu có -->
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
        #copyAllBtn {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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

    <!-- Nút để copy tất cả -->
    <button id="copyAllBtn" onclick="copyAllText()" style="display: none;">Copy tất cả</button>

    <!-- Vùng hiển thị kết quả chuyển đổi -->
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

                    // Hiển thị nút Copy tất cả khi có kết quả
                    document.getElementById("copyAllBtn").style.display = "block";
                }
            };
            xhr.send("text=" + encodeURIComponent(text)); // Gửi dữ liệu
        }

        // Hàm sao chép toàn bộ kết quả vào clipboard
        function copyAllText() {
            const result = document.getElementById("result").innerText;
            const textarea = document.createElement("textarea");
            textarea.value = result;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);
            alert("Đã copy");
        }
    </script>
</body>
</html>
