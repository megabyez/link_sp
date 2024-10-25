<?php
// Mã affiliate của bạn
$aff_code = '17396870089';

// Kiểm tra xem có đoạn văn bản nào được gửi tới không
if (isset($_POST['text'])) {
    $text = $_POST['text']; // Lấy đoạn văn bản từ request

    // Hàm chuyển đổi link
    $converted_text = preg_replace_callback(
        '/https:\/\/vn\.shp\.ee\/[^\s]+/', // Tìm các link Shopee bắt đầu bằng https://vn.shp.ee/
        function($matches) use ($aff_code) {
            $original_url = $matches[0]; // Link gốc Shopee

            // Thêm mã affiliate vào link Shopee
            $separator = (strpos($original_url, '?') === false) ? '?' : '&';
            $url_with_aff = $original_url . $separator . 'aff=' . $aff_code;

            // Tạo mã rút gọn cho link có mã affiliate
            $short_code = substr(md5($url_with_aff), 0, 6); // Tạo mã rút gọn 6 ký tự

            // Trả về link rút gọn hoàn chỉnh với mã affiliate đã được thêm vào URL Shopee
            return "https://megabye.online/" . $short_code;
        },
        $text
    );

    // Trả về đoạn văn đã chuyển đổi
    echo nl2br(htmlspecialchars($converted_text));
} else {
    echo "Vui lòng nhập đoạn văn bản.";
}
?>
