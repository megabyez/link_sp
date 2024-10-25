<?php
// Kiểm tra xem có link được gửi đến không
if (isset($_GET['link'])) {
    $link = $_GET['link'];

    // Chuyển đổi link (áp dụng logic tùy chỉnh của bạn)
    // Ở đây là ví dụ, bạn có thể điều chỉnh theo yêu cầu
    $converted_link = str_replace("shopee.vn", "megabye.online", $link);

    // Trả về link đã chuyển đổi
    echo $converted_link;
} else {
    echo "Vui lòng nhập link.";
}
?>
