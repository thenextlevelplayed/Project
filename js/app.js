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

//主視覺動畫

let bg = document.querySelector("#animation-bg");
window.addEventListener('scroll', function () {
  let value = window.scrollY;
  
  bg.style.backgroundSize = 700 + value*50 +'px';
  
});
$('.overlay').hide();

$(window).scroll(function(){
  //首頁歡迎字樣消失
  if(($(document).scrollTop() == 0)){
    $('.h2intro').fadeIn();
  }else{
    $('.h2intro').fadeOut();
  }
  //首頁滾輪消失
  if(($(document).scrollTop() == 0)){
    $('.scroll-downs').fadeIn();
  }else{
    $('.scroll-downs').fadeOut();
  }

  if(($(document).scrollTop() > 600)){
    $('#animation-bg').fadeOut();
    $('.overlay').fadeIn();
  }else{
    $('#animation-bg').fadeIn();
    $('.overlay').hide();
  }
  })




//首頁圖片動畫

$(window).on("scroll touchmove", function () {

  // if ($(document).scrollTop() > 450){
  //   $('.menu-btn span').css('border-color','rgb(255, 255, 255)');
  //   $('.menu-btn:before').css('border-color','rgb(255, 255, 255)');
  //   $('.menu-btn:after').css('border-color','rgb(255, 255, 255)');
  // }

  if ($(document).scrollTop() < (($("#Service01").position().top)+1700)) {
    
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




