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

// Nhận mã rút gọn từ URL
if (isset($_GET['code'])) {
    $short_code = $_GET['code'];

    // Kiểm tra mã rút gọn có tồn tại không
    if (array_key_exists($short_code, $url_mapping)) {
        // Tạo URL đầy đủ với mã affiliate
        $redirect_url = $url_mapping[$short_code] . '?aff=' . $aff_code;

        // Trả về URL đầy đủ để JavaScript xử lý chuyển hướng
        echo $redirect_url;
    } else {
        echo "Mã rút gọn không hợp lệ.";
    }
}
?>
