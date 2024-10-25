<?php
// Mã affiliate của bạn
$aff_code = '4pxrPwE7wK';

// Bảng ánh xạ mã rút gọn và link gốc
$url_mapping = [
    "5c47e" => "https://mikichan.mobi/Jnqh1",
    // Bạn có thể thêm các mã rút gọn khác vào đây
];

// Nhận mã rút gọn từ URL
if (isset($_GET['code'])) {
    $short_code = $_GET['code'];

    // Kiểm tra mã rút gọn có tồn tại trong mảng
    if (array_key_exists($short_code, $url_mapping)) {
        // Tạo URL đầy đủ với mã affiliate
        $redirect_url = $url_mapping[$short_code] . '?aff=' . $aff_code;

        // Thực hiện chuyển hướng
        header("Location: $redirect_url");
        exit;
    } else {
        echo "Mã rút gọn không hợp lệ.";
    }
} else {
    echo "Vui lòng cung cấp mã rút gọn.";
}
?>
