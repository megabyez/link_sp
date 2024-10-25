<?php
// Mã affiliate của bạn
$aff_code = '17396870089'; // Mã affiliate mới

// Kiểm tra xem có mã code trong URL không
if (isset($_GET['code'])) {
    $code = $_GET['code']; // Lấy mã rút gọn từ URL

    // Tra cứu link gốc dựa trên mã rút gọn
    $original_url = lookupOriginalUrl($code); // Hàm giả định để tra cứu link gốc từ mã rút gọn

    if ($original_url) {
        // Thêm mã affiliate vào URL gốc
        $url_with_aff = $original_url . '?aff=' . $aff_code;

        // Chuyển hướng người dùng đến URL gốc với mã affiliate
        header("Location: " . $url_with_aff);
        exit();
    } else {
        echo "Không tìm thấy URL gốc.";
    }
} else {
    echo "Không có mã rút gọn.";
}

// Hàm giả định để tra cứu link gốc từ mã rút gọn
function lookupOriginalUrl($code) {
    // Ví dụ về cách bạn có thể tra cứu mã rút gọn từ một cơ sở dữ liệu hoặc danh sách tĩnh
    $url_mapping = [
        'be25e' => 'https://mikichan.mobi/Jnqh1',
        '3b2c1' => 'https://mikichan.mobi/OEsQ',
        '90ded' => 'https://mikichan.mobi/UROY',
        '25a51' => 'https://mikichan.mobi/3uwX',
        // Thêm nhiều mã khác vào đây nếu cần
    ];

    return isset($url_mapping[$code]) ? $url_mapping[$code] : null;
}
?>
