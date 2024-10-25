<?php
// Mã affiliate của bạn
$aff_code = '4pxrPwE7wK';

// Hàm tạo mã rút gọn từ URL
function generateShortCode($url) {
    return substr(md5($url), 0, 5);  // Lấy 5 ký tự đầu từ hash MD5 của link
}

// Kiểm tra xem người dùng có gửi dữ liệu qua POST không
if (isset($_POST['text'])) {
    $text = $_POST['text']; // Lấy văn bản từ request

    // Sử dụng preg_replace_callback để tìm và thay thế URL bằng mã rút gọn
    $converted_text = preg_replace_callback(
        '/https?:\/\/[^\s]+/',  // Regex để tìm URL
        function($matches) use ($aff_code) {
            $original_url = $matches[0];
            $short_code = generateShortCode($original_url);  // Tạo mã rút gọn từ URL

            // Trả về link ngắn gọn
            return "<span>https://megabye.online/" . $short_code . "</span><button class='copy-btn'>Copy</button>";
        },
        $text
    );

    // Trả kết quả đã chuyển đổi về cho trang chính
    echo nl2br($converted_text);  // Dùng nl2br để giữ lại định dạng xuống dòng
} else {
    echo "Vui lòng nhập đoạn văn bản.";
}
?>
