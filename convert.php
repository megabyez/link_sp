<?php
// Mã affiliate của bạn
$aff_code = '17396870089';

// Kiểm tra xem có đoạn văn bản nào được gửi tới không
if (isset($_POST['text'])) {
    $text = $_POST['text']; // Lấy đoạn văn bản từ request

    // Kiểm tra nếu file url_mapping.php đã tồn tại hoặc khởi tạo mảng ánh xạ trống
    $url_mapping = file_exists('url_mapping.php') ? include('url_mapping.php') : [];

    // Hàm chuyển đổi link
    $converted_text = preg_replace_callback(
        '/https?:\/\/[^\s]+/', // Tìm các link bắt đầu bằng http:// hoặc https://
        function($matches) use ($aff_code, &$url_mapping) {
            $original_url = $matches[0]; // Link gốc
            $short_code = substr(md5($original_url), 0, 6); // Tạo mã rút gọn
            $url_mapping[$short_code] = $original_url; // Lưu mã rút gọn và link gốc

            // Trả về link ngắn gọn
            return "https://megabye.online/" . $short_code;
        },
        $text
    );

    // Lưu ánh xạ mã rút gọn và link gốc vào tệp url_mapping.php để sử dụng trong `redirect.php`
    file_put_contents('url_mapping.php', "<?php return " . var_export($url_mapping, true) . ";");

    // Trả về đoạn văn đã chuyển đổi
    echo nl2br(htmlspecialchars($converted_text));
} else {
    echo "Vui lòng nhập đoạn văn bản.";
}
?>
