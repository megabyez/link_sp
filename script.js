document.getElementById('linkForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const link = document.getElementById('link').value;

    // Gửi yêu cầu AJAX tới file PHP
    fetch(`/your_php_script.php?link=${encodeURIComponent(link)}`)
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            document.getElementById('result').innerHTML = `Link của bạn: <a href="${data.link}" target="_blank">${data.link}</a>`;
        } else {
            document.getElementById('result').innerHTML = `<span style="color: red;">${data.message}</span>`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('result').innerHTML = `<span style="color: red;">Có lỗi xảy ra, vui lòng thử lại.</span>`;
    });
});
