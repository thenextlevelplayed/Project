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


$(window).on("scroll touchmove", function () {
    if ($(document).scrollTop() < 450) {
        $('.menu-btn span').addClass('change').attr('data-content','bar');
        $('.menu-btn span').css('border-color', 'rgb(255, 255, 255)');
        $('.menu-btn span').childcss('border-color', 'rgb(255, 255, 255)');

    }
    else{
        $('.menu-btn span').css('border-color', 'rgb(35, 35, 35)');

    }
})



