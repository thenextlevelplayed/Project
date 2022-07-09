$(function () {

    $('#active').on('click', function () {
        // console.log($('#active').prop('checked'));
        if ($('#active').prop('checked') == false) {
            $('.wapperContentWord a').css('left', '500px');
        } else {
            setTimeout(function () {
                $('.wapperContentWord a:nth-child(1)').css('left', '0px');
            }, 300);
            setTimeout(function () {
                $('.wapperContentWord a:nth-child(3)').css('left', '0px');
            }, 350);
            setTimeout(function () {
                $('.wapperContentWord a:nth-child(5)').css('left', '0px');
            }, 400);
            setTimeout(function () {
                $('.wapperContentWord a:nth-child(7)').css('left', '0px');
            }, 450);
        }
    })
})





