<?php
// Mã affiliate của bạn
$aff_code = '17396870089';

// Lấy mã rút gọn từ URL
if (isset($_GET['code'])) {
    $short_code = $_GET['code'];

    // Tải mảng ánh xạ mã rút gọn từ `url_mapping.php`
    $url_mapping = include('url_mapping.php');

    // Kiểm tra xem mã rút gọn có tồn tại không
    if (isset($url_mapping[$short_code])) {
        $original_url = $url_mapping[$short_code];

        // Kiểm tra nếu URL đã có tham số ? hoặc chưa
        $separator = (strpos($original_url, '?') === false) ? '?' : '&';

        // Tạo URL đầy đủ với mã affiliate nhưng không hiển thị rõ ràng
        $redirect_url = $original_url . $separator . 'aff=' . $aff_code;

        // Chuyển hướng người dùng đến URL đầy đủ
        header("Location: " . $redirect_url);
        exit();
    } else {
        echo "Mã rút gọn không hợp lệ.";
    }
} else {
    echo "Không có mã rút gọn.";
}
?>
