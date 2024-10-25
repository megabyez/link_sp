<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển đổi link affiliate</title>
    <link rel="stylesheet" href="style.css"> <!-- Liên kết tới file CSS nếu có -->
</head>
<body>
    <h1>Chuyển đổi link affiliate</h1>
    
    <!-- Form gửi đoạn văn bản đến convert.php -->
    <form action="convert.php" method="POST">
        <label for="text">Nhập đoạn văn bản:</label>
        <textarea id="text" name="text" rows="10" cols="50" placeholder="Nhập đoạn văn bản có chứa các link affiliate"></textarea>
        <button type="submit">Chuyển đổi</button>
    </form>

    <h2>Kết quả chuyển đổi:</h2>
    <div id="result">
        <!-- Kết quả sẽ được hiển thị từ convert.php -->
    </div>

    <!-- Thêm JavaScript để xử lý khi người dùng click vào link -->
    <script>
        // Thêm sự kiện click vào tất cả các link rút gọn
        document.addEventListener('click', function(e) {
            if (e.target.tagName === 'A' && e.target.dataset.code) {
                e.preventDefault(); // Ngăn không cho link chuyển hướng

                const code = e.target.dataset.code; // Lấy mã code từ link
                const xhr = new XMLHttpRequest();

                // Gửi yêu cầu Ajax tới redirect.php mà không chuyển trang
                xhr.open('GET', 'redirect.php?code=' + code, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Khi nhận phản hồi từ redirect.php, thực hiện chuyển hướng
                        window.location.href = xhr.responseText; // Đặt URL được trả về từ redirect.php
                    }
                };
                xhr.send();
            }
        });
    </script>
</body>
</html>
