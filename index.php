<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển đổi link affiliate</title>
    <link rel="stylesheet" href="style.css"> <!-- Liên kết tới file CSS nếu cần -->
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
        // Đợi nội dung trang được tải xong
        document.addEventListener('DOMContentLoaded', function() {
            // Thêm sự kiện click vào tất cả các link chứa mã code
            document.addEventListener('click', function(e) {
                // Kiểm tra xem mục người dùng click có phải là link chứa mã code
                if (e.target.tagName === 'A' && e.target.dataset.code) {
                    e.preventDefault(); // Ngăn chặn hành động mặc định của link (chuyển trang)

                    const code = e.target.dataset.code; // Lấy mã code từ thuộc tính data
                    const xhr = new XMLHttpRequest();

                    // Gửi yêu cầu Ajax tới redirect.php mà không chuyển trang
                    xhr.open('GET', 'redirect.php?code=' + code, true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Nhận phản hồi từ redirect.php và chuyển hướng nội bộ
                            const responseURL = xhr.responseText;
                            window.location.href = responseURL; // Thực hiện chuyển hướng nội bộ
                        }
                    };
                    xhr.send(); // Gửi yêu cầu
                }
            });
        });
    </script>
</body>
</html>
