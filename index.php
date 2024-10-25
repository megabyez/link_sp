<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển đổi link affiliate</title>
    <style>
        #result { margin-top: 20px; }
        .copy-btn {
            margin-top: 10px;
            padding: 8px 15px;
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

    <!-- Form để người dùng nhập URL -->
    <form id="convertForm" onsubmit="event.preventDefault(); convertLink();">
        <label for="url">Nhập link gốc:</label>
        <input type="url" id="url" name="url" placeholder="Nhập URL cần chuyển đổi" required>
        <button type="submit">Chuyển đổi</button>
    </form>

    <!-- Kết quả hiển thị link đã chuyển đổi -->
    <div id="result"></div>

    <script>
        // Hàm chuyển đổi link qua redirect.php
        function convertLink() {
            const url = document.getElementById("url").value;
            const redirectUrl = `https://megabye.online/redirect.php?url=${encodeURIComponent(url)}`;
            document.getElementById("result").innerHTML = `
                <p>Link chuyển đổi của bạn:</p>
                <p><a href="${redirectUrl}" target="_blank">${redirectUrl}</a></p>
                <button class="copy-btn" onclick="copyLink()">Copy link</button>
            `;
        }

        // Hàm sao chép link
        function copyLink() {
            const copyText = document.createElement("textarea");
            copyText.value = document.querySelector("#result a").href;
            document.body.appendChild(copyText);
            copyText.select();
            document.execCommand("copy");
            document.body.removeChild(copyText);
            alert("Đã copy link vào clipboard!");
        }
    </script>
</body>
</html>
