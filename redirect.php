<?php
// Mã affiliate của bạn
$aff_code = '17396870089'; // Mã affiliate

// Kiểm tra xem có mã code trong URL không
if (isset($_GET['code'])) {
    $code = $_GET['code']; // Lấy mã rút gọn từ URL

    // Xác định link gốc bằng cách kiểm tra tên miền khác nhau dựa vào mã rút gọn
    $domains = [
        "mikichan.mobi",
        "anotherdomain.com", // Thêm các tên miền khác vào đây
        "yetanotherdomain.net"
    ];

    // Lặp qua các tên miền để kiểm tra xem mã rút gọn có thuộc tên miền nào không
    $original_url = null;
    foreach ($domains as $domain) {
        // Tạo URL gốc giả định với tên miền hiện tại
        $temp_url = "https://$domain/$code";

        // Kiểm tra xem URL này có tồn tại bằng cách gửi một yêu cầu HEAD
        $headers = @get_headers($temp_url);
        if ($headers && strpos($headers[0], '200')) {
            $original_url = $temp_url;
            break; // Thoát vòng lặp nếu tìm thấy URL hợp lệ
        }
    }

    // Nếu không tìm thấy URL hợp lệ
    if (!$original_url) {
        echo "Mã rút gọn không hợp lệ.";
        exit();
    }

    // Kiểm tra nếu URL đã có tham số ? hoặc chưa
    $separator = (strpos($original_url, '?') === false) ? '?' : '&';

    // Tạo URL với mã affiliate
    $url_with_aff = $original_url . $separator . 'aff=' . $aff_code;

    // Chuyển hướng đến link gốc với mã affiliate
    header("Location: " . $url_with_aff);
    exit();
} else {
    echo "Không có mã rút gọn.";
}
?>
