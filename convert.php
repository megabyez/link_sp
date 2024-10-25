<?php
// Mã affiliate của bạn
$aff_code = '4pxrPwE7wK';

// Kiểm tra xem có link nào được gửi đến không
if (isset($_GET['link'])) {
    $link = $_GET['link'];

    // Tạo mã nhận diện rút gọn
    $short_code = substr(md5($link), 0, 5); // Tạo mã rút gọn từ hash MD5

    // Lưu trữ liên kết giữa mã rút gọn và link gốc vào tạm thời (hoặc database nếu cần)
    // Giả sử chúng ta lưu trữ thông tin này vào một mảng tạm thời
    $url_mapping = [
        $short_code => $link
    ];

    // Trả về link rút gọn của bạn
    echo "Link rút gọn của bạn: https://megabye.online/redirect.php?code=" . $short_code;
} else {
    echo "Vui lòng nhập link.";
}
?>
