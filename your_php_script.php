<?php
header('Content-Type: application/json; charset=utf-8');

if (isset($_GET['link'])) {
    $link = $_GET['link'];
    $aff_code = '4pxrPwE7wK'; // Mã affiliate của bạn

    // Kiểm tra và thêm http:// nếu URL không có scheme
    if (!preg_match("~^(?:f|ht)tps?://~i", $link)) {
        $link = "http://" . $link;
    }

    // Phân tích URL và thay thế mã affiliate
    $parsed_url = parse_url($link);
    if ($parsed_url === false || !isset($parsed_url['host'])) {
        echo json_encode(['status' => 'error', 'message' => 'URL không hợp lệ. Vui lòng kiểm tra lại.']);
        exit;
    }

    // Tạo mã affiliate URL
    $scheme = isset($parsed_url['scheme']) ? $parsed_url['scheme'] : 'https';
    $host = isset($parsed_url['host']) ? $parsed_url['host'] : '';
    $path = isset($parsed_url['path']) ? $parsed_url['path'] : '';
    $query = isset($parsed_url['query']) ? $parsed_url['query'] : '';
    
    parse_str($query, $query_params);
    $query_params['aff'] = $aff_code;
    $new_query = http_build_query($query_params);
    $aff_link = $scheme . '://' . $host . $path . '?' . $new_query;

    // Mã hóa link affiliate
    $short_code = base64_encode($aff_link);

    // Tạo URL rút gọn trên megabye.online
    $shortened_link = 'https://megabye.online/shorten.php?code=' . urlencode($short_code);

    echo json_encode(['status' => 'success', 'link' => $shortened_link]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Hãy nhập link của bạn!']);
}
?>
