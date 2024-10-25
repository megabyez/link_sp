<?php
// Mã affiliate của bạn
$aff_code = '17396870089'; // Mã affiliate

// Kiểm tra xem có mã code trong URL không
if (isset($_GET['code'])) {
    $code = $_GET['code']; // Lấy mã rút gọn từ URL

    // Tạo URL Shopee gốc dựa trên mã rút gọn
    $original_url = "https://vn.shp.ee/$code"; // Đảm bảo URL này là chính xác

    // Thêm mã affiliate vào URL
    $separator = (strpos($original_url, '?') === false) ? '?' : '&';
    $url_with_aff = $original_url . $separator . 'aff=' . $aff_code;

    // Chuyển hướng đến link Shopee với mã affiliate
    header("Location: " . $url_with_aff);
    exit();
} else {
    echo "Không có mã rút gọn.";
}
?>
