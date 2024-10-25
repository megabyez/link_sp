// Hàm gửi link qua AJAX tới convert.php và hiển thị kết quả
function convertLink() {
    const url = document.getElementById("url").value;
    fetch(`/convert.php?url=${encodeURIComponent(url)}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById("result").innerHTML = data;
        });
}
