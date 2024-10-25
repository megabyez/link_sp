<?php
// Mã affiliate của bạn
$aff_code = '4pxrPwE7wK';

// Mảng ánh xạ mã rút gọn với link gốc
$url_mapping = [
    "be25e" => "https://mikichan.mobi/Jnqh1",
    "3b2c1" => "https://mikichan.mobi/OEsQ",
    "90ded" => "https://mikichan.mobi/UROY",
    "25a51" => "https://mikichan.mobi/3uwX"
];

// Kiểm tra đường dẫn để xử lý mã rút gọn
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
if (array_key_exists($path, $url_mapping)) {
    $redirect_url = $url_mapping[$path] . '?aff=' . $aff_code;
    header("Location: $redirect_url");
    exit;
}

// Nếu không có mã rút gọn, hiển thị trang chính
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển đổi link affiliate</title>
    <link rel="stylesheet" href="style.css"> <!-- Liên kết tới file CSS nếu có -->
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
