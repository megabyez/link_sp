<?php
// Mã affiliate của bạn
$aff_code = '17396870089'; // Mã affiliate

// Kiểm tra xem có đoạn văn bản nào được gửi tới không
if (isset($_POST['text'])) {
    $text = $_POST['text']; // Lấy đoạn văn bản từ request

    // Hàm chuyển đổi link
    $converted_text = preg_replace_callback(
        '/https:\/\/s\.shopee\.vn\/[^\s]+/', // Tìm các link Shopee
        function($matches) use ($aff_code) {
            $original_url = $matches[0]; // Link gốc Shopee

            // Tạo mã rút gọn cho link
            $short_code = substr(md5($original_url), 0, 6); // Tạo mã rút gọn 6 ký tự

            // Tạo link mới với mã affiliate
            $new_url = "https://megabye.online/" . $short_code;

            return $new_url; // Trả về link rút gọn
        },
        $text
    );

    // Trả về đoạn văn đã chuyển đổi
    echo nl2br(htmlspecialchars($converted_text));
} else {
    echo "Vui lòng nhập đoạn văn bản.";
}
?>
