<?php
// Mã affiliate của bạn
$aff_code = '4pxrPwE7wK';

// Mảng lưu trữ mã rút gọn và link gốc
$url_mapping = [
    "OEsQ" => "https://example.com/product/12345",
    "Jnqh1" => "https://example.com/product/67890"
    // Thêm các mã khác vào đây nếu cần
];

// Nhận mã rút gọn từ URL
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Kiểm tra xem mã rút gọn có tồn tại trong mảng không
    if (array_key_exists($code, $url_mapping)) {
        // Tạo URL đầy đủ với mã affiliate
        $redirect_url = $url_mapping[$code] . '?aff=' . $aff_code;

        // Chuyển hướng đến URL gốc kèm mã affiliate
        header("Location: $redirect_url");
        exit;
    } else {
        echo "Mã rút gọn không hợp lệ.";
    }
} else {
    echo "Vui lòng cung cấp mã rút gọn.";
}
?>
