<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Link Converter</title>
    <link rel="stylesheet" href="style.css"> <!-- Đường dẫn tới tệp CSS -->
</head>
<body>
    <div class="container">
        <h1>Chuyển đổi link affiliate</h1>
        
        <form id="linkForm" method="GET">
            <label for="link">Nhập link của bạn:</label>
            <input type="text" id="link" name="link" placeholder="Nhập link của bạn..." required>
            <button type="submit">Chuyển đổi</button>
        </form>

        <div id="convertedLink"></div> <!-- Hiển thị link đã chuyển đổi -->

    </div>

    <script>
    // Xử lý form khi submit
    document.getElementById('linkForm').onsubmit = function(event) {
        event.preventDefault();  // Ngăn form tải lại trang

        const link = document.getElementById('link').value;

        // Gửi yêu cầu tới PHP để xử lý chuyển đổi link
        fetch('convert.php?link=' + encodeURIComponent(link))
            .then(response => response.text())
            .then(data => {
                // Hiển thị link đã chuyển đổi và nút sao chép
                document.getElementById('convertedLink').innerHTML = `
                    <input type="text" value="${data}" id="resultLink" readonly>
                    <button onclick="copyToClipboard()">Copy Link</button>
                    <span id="copyMessage" style="display: none; color: green;">Link đã được sao chép!</span>
                `;
            });
    }

    // Hàm sao chép link
    function copyToClipboard() {
        const resultLink = document.getElementById('resultLink');
        resultLink.select();
        document.execCommand("copy");

        // Hiển thị thông báo "đã sao chép"
        const message = document.getElementById("copyMessage");
        message.style.display = "inline";

        // Ẩn thông báo sau 2 giây
        setTimeout(() => {
            message.style.display = "none";
        }, 2000);
    }
    </script>
</body>
</html>
