<?php
// Mã affiliate của bạn
$aff_code = '17396870089'; // Mã affiliate

// Kiểm tra xem có mã code trong URL không
if (isset($_GET['code'])) {
    $code = $_GET['code']; // Lấy mã rút gọn từ URL

    // Tạo danh sách các tên miền có thể chứa mã rút gọn
    $domains = [
        "mikichan.mobi",
        "anotherdomain.com",
        "yetanotherdomain.net"
    ];

    // Lặp qua danh sách tên miền để tìm mã rút gọn hợp lệ
    $original_url = null;
    foreach ($domains as $domain) {
        $temp_url = "https://$domain/$code";

        // Gửi yêu cầu HEAD để kiểm tra sự tồn tại của mã rút gọn này
        $headers = @get_headers($temp_url);
        if ($headers && strpos($headers[0], '200')) {
            $original_url = $temp_url;
            break; // Tìm thấy URL hợp lệ
        }
    }

    // Nếu không tìm thấy URL hợp lệ
    if (!$original_url) {
        echo "Mã rút gọn không hợp lệ.";
        exit();
    }

    // Thêm mã affiliate và chuyển hướng
    $separator = (strpos($original_url, '?') === false) ? '?' : '&';
    $url_with_aff = $original_url . $separator . 'aff=' . $aff_code;
    header("Location: " . $url_with_aff);
    exit();
} else {
    echo "Không có mã rút gọn.";
}
?>
