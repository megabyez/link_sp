<?php
if (isset($_GET['link'])) {
    $link = $_GET['link'];
    header("Location: https://s.shopee.vn/" . $link . "?aff=4pxrPwE7wK");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chuyển đổi link Aff Shopee</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main role="main">
        <div class="container-fluid">
            <h3 class="mt-5">Chuyển đổi link Aff Shopee</h3>
            <div class="row my-4">
                <div class="col-md">
                    <a href="index.html" class="btn btn-dark">Home</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h4>Chuyển đổi đoạn văn chứa link</h4>
                    <form id="convertForm" method="get" action="">
                        <div class="form-group">
                            <label for="text">Nhập đoạn văn của bạn:</label>
                            <textarea class="form-control" id="text" name="text" rows="4" placeholder="Nhập đoạn văn" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4>Đầu ra</h4>
                    <div id="result"></div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
