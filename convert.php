<?php
// Kiểm tra xem có link nào được gửi đến không
if (isset($_GET['link'])) {
    $link = $_GET['link'];

    // Logic chuyển đổi link
    // Đây chỉ là ví dụ - bạn có thể điều chỉnh logic này theo yêu cầu
    $converted_link = str_replace("shopee.vn", "megabye.online", $link);

    // Trả về link đã chuyển đổi
    echo $converted_link;
} else {
    echo "Vui lòng nhập link.";
}
?>
