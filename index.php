<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển đổi link affiliate</title>
    <link rel="stylesheet" href="style.css"> <!-- Liên kết đến file CSS nếu có -->
</head>
<body>
    <h1>Chuyển đổi link affiliate</h1>
    
    <!-- Form gửi đoạn văn bản đến convert.php -->
    <form action="convert.php" method="POST">
        <label for="text">Nhập đoạn văn bản:</label>
        <textarea id="text" name="text" rows="10" cols="50" placeholder="Nhập đoạn văn bản có chứa các link affiliate"></textarea>
        <button type="submit">Chuyển đổi</button>
    </form>

    <h2>Kết quả chuyển đổi:</h2>
    <div id="result">
        <!-- Kết quả sẽ được hiển thị từ convert.php -->
    </div>
</body>
</html>
