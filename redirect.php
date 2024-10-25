<?php
// Mã affiliate của bạn
$aff_code = '4pxrPwE7wK';

// Mảng ánh xạ giữa mã rút gọn và link gốc
$url_mapping = [
    "5c47e" => "https://example.com/product/12345",
    "Jnqh1" => "https://example.com/product/67890"
    // Bạn có thể thêm nhiều mã khác
];

// Nhận mã rút gọn từ URL
if (isset($_GET['code'])) {
    $short_code = $_GET['code'];

    // Kiểm tra xem mã rút gọn có tồn tại trong bảng ánh xạ không
    if (array_key_exists($short_code, $url_mapping)) {
        // Tạo URL đầy đủ với mã affiliate
        $redirect_url = $url_mapping[$short_code] . '?aff=' . $aff_code;

        // Chuyển hướng người dùng đến URL gốc kèm mã affiliate
        header("Location: $redirect_url");
        exit;
    } else {
        echo "Mã rút gọn không hợp lệ.";
    }
} else {
    echo "Vui lòng cung cấp mã rút gọn.";
}
?>
