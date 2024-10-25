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
    </style>
</head>
<body>
    <h1>Chuyển đổi link affiliate</h1>
    
    <!-- Form không có action hoặc method để tránh tải lại trang -->
    <form id="convertForm" onsubmit="event.preventDefault(); convertText();">
        <label for="text">Nhập đoạn văn bản:</label>
        <textarea id="text" name="text" rows="10" cols="50" placeholder="Nhập đoạn văn bản có chứa các link affiliate"></textarea>
        <button type="submit">Chuyển đổi</button>
    </form>

    <!-- Kết quả sẽ hiển thị ngay dưới form này -->
    <div id="result"></div>

    <script>
        // Hàm chuyển đổi link mà không tải lại trang
        function convertText() {
            const text = document.getElementById("text").value;
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "convert.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Hiển thị kết quả trong div #result ngay dưới form
                    document.getElementById("result").innerHTML = xhr.responseText;

                    // Thêm sự kiện copy vào nút copy (nếu cần)
                    addCopyEventListeners();
                }
            };
            xhr.send("text=" + encodeURIComponent(text));
        }

        // Hàm để thêm sự kiện copy (nếu có nút copy)
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
