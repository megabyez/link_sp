<?php
// Mã affiliate của bạn
$aff_code = '17396870089'; // Mã affiliate mới

// Kiểm tra xem có URL gốc trong tham số hay không
if (isset($_GET['url'])) {
    $original_url = $_GET['url']; // Lấy link gốc từ tham số

    // Kiểm tra xem URL đã có tham số ? hoặc chưa
    $separator = (strpos($original_url, '?') === false) ? '?' : '&';

    // Tạo link với mã affiliate
    $url_with_aff = $original_url . $separator . 'aff=' . $aff_code;

    // Chuyển hướng đến link có mã affiliate
    header("Location: " . $url_with_aff);
    exit();
} else {
    echo "Không có URL gốc.";
}
?>
