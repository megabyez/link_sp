<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển đổi link affiliate</title>
</head>
<body>
    <h1>Chuyển đổi link affiliate trong đoạn văn</h1>

    <form id="convertForm" onsubmit="event.preventDefault(); convertText();">
        <label for="text">Nhập đoạn văn bản:</label>
        <textarea id="text" name="text" rows="10" cols="50" placeholder="Nhập đoạn văn bản có chứa các link"></textarea>
        <button type="submit">Chuyển đổi</button>
    </form>

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
