<?php
// Mảng chứa nhiều đoạn văn khác nhau với các link cần chuyển đổi
$texts = [
    "🌸   CPD: 
    ◼️  DASACH21H giảm 100k từ 350k áp 3 Shop bên dưới   https://mikichan.mobi/Jnqh1
    ►    Áp Loreal https://mikichan.mobi/OEsQ 
    ►    Áp Maybeline https://mikichan.mobi/UROY 
    ►    Áp Ganier https://mikichan.mobi/3uwX",

    "Khuyến mãi mùa hè:
    ◼️  Mua 1 tặng 1 tại shop bên dưới   https://mikichan.mobi/abc123
    ►    Ưu đãi Maybelline https://mikichan.mobi/def456"
];

// Chức năng để chuyển đổi các URL trong từng đoạn văn
function convert_links($text) {
    // Mảng các URL cần chuyển đổi và URL mới sau chuyển đổi
    $url_mapping = [
        "https://mikichan.mobi/Jnqh1" => "https://megabye.online/Jnqh1",
        "https://mikichan.mobi/OEsQ" => "https://megabye.online/OEsQ",
        "https://mikichan.mobi/UROY" => "https://megabye.online/UROY",
        "https://mikichan.mobi/3uwX" => "https://megabye.online/3uwX",
        "https://mikichan.mobi/abc123" => "https://megabye.online/abc123",
        "https://mikichan.mobi/def456" => "https://megabye.online/def456"
    ];

    // Thay thế các URL trong đoạn văn
    foreach ($url_mapping as $old_url => $new_url) {
        $text = str_replace($old_url, $new_url, $text);
    }

    return $text;
}

// Lặp qua từng đoạn văn và chuyển đổi các link
foreach ($texts as $index => $text) {
    $converted_text = convert_links($text);

    // Hiển thị đoạn văn đã chuyển đổi và thêm nút "Copy"
    echo nl2br($converted_text); // Hiển thị đoạn văn đã chuyển đổi
    echo '<br><br>';
    
    // Tạo một input chứa link để sao chép
    echo '<textarea id="link-' . $index . '" readonly>' . $converted_text . '</textarea>';
    echo '<button onclick="copyToClipboard(\'link-' . $index . '\')">Copy</button>';
    echo '<span id="copy-message-' . $index . '" style="display: none; color: green;">Link đã được sao chép!</span>';
    echo '<br><br>';
}
?>

<script>
// Hàm sao chép nội dung từ textarea
function copyToClipboard(elementId) {
    var copyText = document.getElementById(elementId);

    // Chọn và sao chép nội dung của textarea
    copyText.select();
    copyText.setSelectionRange(0, 99999); // Cho thiết bị di động
    document.execCommand("copy");

    // Hiển thị thông báo đã sao chép
    var messageElement = document.getElementById("copy-message-" + elementId.split('-')[1]);
    messageElement.style.display = "inline";
    
    // Ẩn thông báo sau 2 giây
    setTimeout(function() {
        messageElement.style.display = "none";
    }, 2000);
}
</script>
