<?php
// Mã affiliate của bạn
$aff_code = '4pxrPwE7wK';

// Hàm tạo mã rút gọn
function generateShortCode($url) {
    return substr(md5($url), 0, 5);  // Tạo mã rút gọn từ hash MD5
}

// Mảng lưu trữ mã rút gọn và link gốc
$url_mapping = [];

// Nhận đoạn văn bản từ input
if (isset($_GET['text'])) {
    $text = $_GET['text'];

    // Tìm và thay thế các URL trong đoạn văn bản
    $converted_text = preg_replace_callback(
        '/https?:\/\/[^\s]+/', // Biểu thức regex để tìm URL
        function($matches) use (&$url_mapping, $aff_code) {
            $original_url = $matches[0];
            $short_code = generateShortCode($original_url); // Tạo mã rút gọn

            // Lưu mã rút gọn và link gốc vào mảng
            $url_mapping[$short_code] = $original_url;

            // Trả về link rút gọn trên domain của bạn
            return "https://megabye.online/redirect.php?code=" . $short_code;
        },
        $text
    );

    // Trả về đoạn văn đã chuyển đổi với các link rút gọn
    echo nl2br(htmlspecialchars($converted_text)); // Chuyển đổi ký tự HTML và giữ xuống dòng
} else {
    echo "Vui lòng nhập đoạn văn bản.";
}
?>
