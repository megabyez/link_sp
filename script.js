// Gửi yêu cầu AJAX để chuyển đổi link qua convert.php
fetch(`/convert.php?link=${encodeURIComponent(link)}`)
    .then(response => response.text())
    .then(data => {
        // Hiển thị kết quả nhận được
        document.getElementById("result").innerHTML = data;
    });
