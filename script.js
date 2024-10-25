// Hàm gửi đoạn văn qua AJAX tới convert.php và hiển thị kết quả
function convertText() {
    const text = document.getElementById("text").value;
    fetch("/convert.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `text=${encodeURIComponent(text)}`
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("result").innerHTML = data;
    });
}
