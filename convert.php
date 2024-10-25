<?php
// Mã affiliate của bạn
$aff_code = '4pxrPwE7wK';

// Hàm tạo mã rút gọn
function generateShortCode($url) {
    return substr(md5($url), 0, 5);  // Tạo mã rút gọn từ hash MD5 của link
}

// Mảng tạm lưu trữ mã rút gọn và link gốc
$url_mapping = [];

// Kiểm tra xem người dùng có gửi đoạn văn bản hay không
if (isset($_POST['text'])) {
    $text = $_POST['text']; // Lấy đoạn văn bản

    // Tìm và thay thế các URL trong đoạn văn bản bằng cách sử dụng regex
    $converted_text = preg_replace_callback(
        '/https?:\/\/[^\s]+/',  // Regex để tìm URL
        function($matches) use (&$url_mapping, $aff_code) {
            $original_url = $matches[0];
            $short_code = generateShortCode($original_url);  // Tạo mã rút gọn từ URL

            // Lưu mã rút gọn và link gốc vào mảng tạm thời
            $url_mapping[$short_code] = $original_url;

            // Trả về link rút gọn với domain của bạn
            return "https://megabye.online/redirect.php?code=" . $short_code;
        },
        $text
    );

    // Hiển thị đoạn văn bản đã chuyển đổi
    echo nl2br(htmlspecialchars($converted_text));  // Hiển thị đoạn văn đã được rút gọn link
} else {
    echo "Vui lòng nhập đoạn văn bản.";
}
?>
