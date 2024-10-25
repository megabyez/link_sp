<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển đổi link affiliate</title>
    <link rel="stylesheet" href="style.css"> <!-- Liên kết tới tệp style.css -->
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
            });
        }
    </script>

</body>
</html>
