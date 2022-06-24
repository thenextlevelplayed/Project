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

$(window).on("scroll touchmove", function () {
  if ($(document).scrollTop() < (($("#Service01").position().top)+1800)) {
    console.log($("#Service01").position().top);
    $('#indexImg').attr('src', '../img/index/index01.png');
  }

  if ($(document).scrollTop() > ($("#Service01").position().top+1800) && $(document).scrollTop() < ($("#Service02").position().top+1800)) {
    console.log($("#Service02").position().top);
    $('#indexImg').attr('src', '../img/index/index02.png');
    $('#Service01').css('opacity', '1')
  }else{
    $('#Service01').css('opacity', '0.2');
  };
  if ($(document).scrollTop() > ($("#Service02").position().top+1800) && $(document).scrollTop() < ($("#Service03").position().top+1800)) {
    $('#indexImg').attr('src', '../img/index/index03.png');
    $('#Service02').css('opacity', '1')
  }else{
    $('#Service02').css('opacity', '0.2');
  };

  if ($(document).scrollTop() > ($("#Service03").position().top+1800) && $(document).scrollTop() < ($("#Service04").position().top+1800)) {
    $('#indexImg').attr('src', '../img/index/index04.png');
    $('#Service03').css('opacity', '1')
  }else{
    $('#Service03').css('opacity', '0.2');
  };

  if ($(document).scrollTop() > ($("#Service04").position().top+1800) && $(document).scrollTop() < ($("#Service05").position().top+1800)) {
    $('#indexImg').attr('src', '../img/index/index05.png');
    $('#Service04').css('opacity', '1')
  }else{
    $('#Service04').css('opacity', '0.2');
  };

  if ($(document).scrollTop() > ($("#Service05").position().top+1800) && $(document).scrollTop() < ($("#Service06").position().top+1800)) {
    $('#indexImg').attr('src', '../img/index/index06.png');
    $('#Service05').css('opacity', '1')
  }else{
    $('#Service05').css('opacity', '0.2');
  };

  if ($(document).scrollTop() > ($("#Service06").position().top+1800)) {
    $('#indexImg').attr('src', '../img/index/index07.png');
    $('#Service06').css('opacity', '1')
  }else{
    $('#Service06').css('opacity', '0.2');
  };

  
  }

);
