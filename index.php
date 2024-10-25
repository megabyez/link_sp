<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển đổi link affiliate</title>
    <link rel="stylesheet" href="style.css"> <!-- Liên kết đến style.css -->
</head>
<body>

    <h1>Chuyển đổi link affiliate</h1>

    <!-- Form nhập link gốc -->
    <form id="convertForm" onsubmit="event.preventDefault(); convertText();">
        <label for="text">Nhập đoạn văn bản có chứa các link:</label>
        <textarea id="text" name="text" placeholder="Nhập đoạn văn bản..."></textarea>
        <button type="submit">Chuyển đổi</button>
    </form>

    <!-- Kết quả hiển thị trong khung -->
    <div id="result" class="result-box" style="display: none;"></div>

    <!-- Nút Copy tất cả -->
    <button id="copyAllBtn" onclick="copyAll()" style="display: none;">Copy tất cả</button>
    <p id="copyMessage" style="display: none;">Đã sao chép vào clipboard!</p>

    <script>
        function convertText() {
            const text = document.getElementById("text").value;
            fetch("convert.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `text=${encodeURIComponent(text)}`
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById("result").innerHTML = data;
                document.getElementById("result").style.display = "block"; // Hiển thị khung kết quả
                document.getElementById("copyAllBtn").style.display = "block"; // Hiển thị nút Copy tất cả
            });
        }

        function copyAll() {
            const resultText = document.getElementById("result").innerText;
            navigator.clipboard.writeText(resultText).then(() => {
                const message = document.getElementById("copyMessage");
                message.style.display = "block";
                setTimeout(() => {
                    message.style.display = "none";
                }, 2000); // Hiện thông báo trong 2 giây
            });
        }
    </script>

</body>
</html>
