// $(function () { 
//     $(window).scroll(function () {
//         if ($(this).scrollTop() < 1000) { 
//             $('.indeximg img').attr('src','../img/index/index-02.png');
//         }
//         if ($(this).scrollTop() > 1600) { 
//             $('.indeximg img').attr('src','../img/index/index-03.png');
//         }
//     })
// });


//首頁圖片動畫

$(window).on("scroll touchmove", function () {
  if ($(document).scrollTop() < (($("#Service01").position().top)+1700)) {
    console.log($("#Service01").position().top);
    $('#indexImg').attr('src', '../img/index/index01.png');
  }

  if ($(document).scrollTop() > ($("#Service01").position().top+1700) && $(document).scrollTop() < ($("#Service02").position().top+1700)) {
    console.log($("#Service02").position().top);
    $('#indexImg').attr('src', '../img/index/index02.png');
    $('#Service01').css('opacity', '1')
  }else{
    $('#Service01').css('opacity', '0.2');
  };
  if ($(document).scrollTop() > ($("#Service02").position().top+1700) && $(document).scrollTop() < ($("#Service03").position().top+1700)) {
    $('#indexImg').attr('src', '../img/index/index03.png');
    $('#Service02').css('opacity', '1')
  }else{
    $('#Service02').css('opacity', '0.2');
  };

  if ($(document).scrollTop() > ($("#Service03").position().top+1700) && $(document).scrollTop() < ($("#Service04").position().top+1700)) {
    $('#indexImg').attr('src', '../img/index/index04.png');
    $('#Service03').css('opacity', '1')
  }else{
    $('#Service03').css('opacity', '0.2');
  };

  if ($(document).scrollTop() > ($("#Service04").position().top+1700) && $(document).scrollTop() < ($("#Service05").position().top+1700)) {
    $('#indexImg').attr('src', '../img/index/index05.png');
    $('#Service04').css('opacity', '1')
  }else{
    $('#Service04').css('opacity', '0.2');
  };

  if ($(document).scrollTop() > ($("#Service05").position().top+1700) && $(document).scrollTop() < ($("#Service06").position().top+1700)) {
    $('#indexImg').attr('src', '../img/index/index06.png');
    $('#Service05').css('opacity', '1')
  }else{
    $('#Service05').css('opacity', '0.2');
  };

  if ($(document).scrollTop() > ($("#Service06").position().top+1700)) {
    $('#indexImg').attr('src', '../img/index/index07.png');
    $('#Service06').css('opacity', '1')
  }else{
    $('#Service06').css('opacity', '0.2');
  };

  
  }

);

//navbar動畫


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