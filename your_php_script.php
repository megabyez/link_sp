<?php
header('Content-Type: application/json; charset=utf-8');

if (isset($_GET['link'])) {
    $link = $_GET['link'];
    $aff_code = '4pxrPwE7wK'; // Mã affiliate của bạn

    // Phân tích link gốc
    $parsed_url = parse_url($link);

    if ($parsed_url === false || !isset($parsed_url['host'])) {
        echo json_encode(['status' => 'error', 'message' => 'URL không hợp lệ. Vui lòng kiểm tra lại.']);
        exit;
    }

    // Lấy các thành phần của URL
    $scheme = isset($parsed_url['scheme']) ? $parsed_url['scheme'] : 'https';
    $host = isset($parsed_url['host']) ? $parsed_url['host'] : '';
    $path = isset($parsed_url['path']) ? $parsed_url['path'] : '';
    $query = isset($parsed_url['query']) ? $parsed_url['query'] : '';

    // Thay thế mã affiliate bằng mã của bạn
    parse_str($query, $query_params);
    $query_params['aff'] = $aff_code; // Thay thế mã affiliate
    $new_query = http_build_query($query_params);

    // Tạo URL mới
    $aff_link = $scheme . '://' . $host . $path . '?' . $new_query;

    // Rút gọn link bằng TinyURL
    $shortened_link = @file_get_contents('https://tinyurl.com/api-create.php?url=' . urlencode($aff_link));

    if ($shortened_link === false) {
        echo json_encode(['status' => 'error', 'message' => 'Không thể rút gọn link. Vui lòng thử lại sau.']);
    } else {
        echo json_encode(['status' => 'success', 'link' => $shortened_link]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Hãy nhập link của bạn!']);
}
?>
