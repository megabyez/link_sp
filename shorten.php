<?php
if (isset($_GET['code'])) {
    // Lấy mã rút gọn từ URL
    $code = $_GET['code'];

    // Giải mã và chuyển hướng đến URL gốc
    $original_link = base64_decode($code);

    if ($original_link) {
        header("Location: $original_link");
        exit;
    } else {
        echo "URL không hợp lệ hoặc không tìm thấy!";
    }
} else {
    echo "Không có mã URL!";
}
?>
