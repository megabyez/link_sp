<?php
// Chuyển hướng từ megabye.online sang www.megabye.online nếu cần
if ($_SERVER['HTTP_HOST'] == 'megabye.online') {
    header("Location: https://www.megabye.online".$_SERVER['REQUEST_URI'], true, 301);
    exit();
}

// Giao diện HTML để nhập link
echo '
<html>
<head>
    <title>Affiliate Link Converter</title>
</head>
<body>
    <h1>Welcome to my affiliate link converter!</h1>
    <form action="your_php_script.php" method="GET">
        <label for="link">Enter your affiliate link:</label>
        <input type="text" id="link" name="link" required>
        <input type="submit" value="Convert Link">
    </form>
</body>
</html>
';
?>
