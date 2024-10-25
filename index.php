<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển đổi link affiliate</title>
    <link rel="stylesheet" href="style.css"> <!-- Sử dụng tệp style.css -->
</head>
<body>

    <h1>Chuyển đổi link affiliate</h1>

    <!-- Form để người dùng nhập URL -->
    <form id="convertForm" onsubmit="event.preventDefault(); convertText();">
        <label for="text">Nhập đoạn văn bản có chứa các link:</label>
        <textarea id="text" name="text" placeholder="Nhập đoạn văn bản..."></textarea>
        <button type="submit">Chuyển đổi</button>
    </form>

    <!-- Kết quả hiển thị link đã chuyển đổi -->
    <div id="result"></div>

    <script src="script.js"></script>

</body>
</html>
