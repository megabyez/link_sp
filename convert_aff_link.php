<?php
header('Content-Type: text/html; charset=utf-8'); // Đảm bảo nội dung trả về là HTML

if(isset($_GET['link'])){
    $link = $_GET['link'];
    $aff_code = '4pxrPwE7wK'; // Mã aff của bạn

    // Phân tích link gốc
    $parsed_url = parse_url($link);

    if ($parsed_url === false || !isset($parsed_url['host'])) {
        echo "<div class='alert alert-danger'>URL không hợp lệ. Vui lòng kiểm tra lại.</div>";
        exit;
    }

    // Lấy các thành phần của URL
    $scheme = isset($parsed_url['scheme']) ? $parsed_url['scheme'] : 'https';
    $host = isset($parsed_url['host']) ? $parsed_url['host'] : '';
    $path = isset($parsed_url['path']) ? $parsed_url['path'] : '';
    $query = isset($parsed_url['query']) ? $parsed_url['query'] : '';

    // Tìm và thay thế mã aff hiện tại bằng mã của bạn
    parse_str($query, $query_params);
    $query_params['aff'] = $aff_code; // Thay thế mã aff bằng mã của bạn
    $new_query = http_build_query($query_params);

    // Tạo URL mới với mã aff
    $aff_link = $scheme . '://' . $host . $path . '?' . $new_query;

    // Kiểm tra xem URL rút gọn có trả về hợp lệ không
    $shortened_link = @file_get_contents('https://tinyurl.com/api-create.php?url=' . urlencode($aff_link));

    if ($shortened_link === false) {
        echo "<div class='alert alert-danger'>Không thể rút gọn link. Vui lòng thử lại sau.</div>";
    } else {
        echo "<div class='alert alert-success'>Link của bạn: <a href='" . htmlspecialchars($shortened_link) . "' target='_blank'>" . htmlspecialchars($shortened_link) . "</a></div>";
    }
} else {
    echo "<div class='alert alert-danger'>Hãy nhập link của bạn!</div>";
}
?>
