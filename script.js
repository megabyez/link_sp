$(document).ready(function(){
    $('#convertForm').submit(function(event){
        event.preventDefault(); // Ngăn không cho form submit tự động

        var text = $('#text').val();
        var urlPattern = /https:\/\/s\.shopee\.vn\/\S+/g;
        var affCode = '4pxrPwE7wK'; // Mã aff của bạn

        var convertedText = text.replace(urlPattern, function(url) {
            var shortLink = url.split('https://s.shopee.vn/')[1];
            return `https://megabye.online/redirect.php?link=${shortLink}&aff_code=${affCode}`;
        });

        $('#result').html('<p>' + convertedText + '</p><button class="btn btn-secondary mt-2" onclick="copyToClipboard()">Sao chép</button>');
    });
});

function copyToClipboard() {
    var copyText = $('#result p').text();
    var tempInput = $('<textarea>');
    $('body').append(tempInput);
    tempInput.val(copyText).select();
    document.execCommand('copy');
    tempInput.remove();

    // Hiển thị thông báo sao chép
    $('#copyAlert').fadeIn().delay(2000).fadeOut();
}
