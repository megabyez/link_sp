<?php
// Mã affiliate của bạn
$aff_code = '17396870089'; // Mã affiliate

// Kiểm tra xem có đoạn văn bản nào được gửi tới không
if (isset($_POST['text'])) {
    $text = $_POST['text']; // Lấy đoạn văn bản từ request

    // Hàm chuyển đổi link
    $converted_text = preg_replace_callback(
        '/https?:\/\/[^\s]+/', // Tìm các link bắt đầu bằng http:// hoặc https://
        function($matches) use ($aff_code) {
            $original_url = $matches[0]; // Link gốc
            $separator = (strpos($original_url, '?') === false) ? '?' : '&';
            // Thêm mã affiliate vào link
            return $original_url . $separator . 'aff=' . $aff_code;
        },
        $text
    );

    // Trả về đoạn văn đã chuyển đổi
    echo nl2br(htmlspecialchars($converted_text));
} else {
    echo "Vui lòng nhập đoạn văn bản.";
}
?>
