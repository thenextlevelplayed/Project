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

function reveal() {
  var reveals = document.querySelectorAll(".reveal");
  var show = document.querySelectorAll(".show");
  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 300;
    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}
window.addEventListener("scroll", reveal);

// To check the scroll position on page load
reveal();

$(window).on("scroll touchmove", function () {
  if ($(document).scrollTop() >= $("#Service01").position().top && $(document).scrollTop() < $("#Service02").position().top) {
    $('body').css('background-image', 'url(img/img_one.jpg)')
  };
  if ($(document).scrollTop() >= $("#two").position().top && $(document).scrollTop() < $("#three").position().top) {
    $('body').css('background-image', 'url(img/img_two.jpg)')
  };
  if ($(document).scrollTop() >= $("#three").position().top && $(document).scrollTop() < $("#four").position().top) {
    $('body').css('background-image', 'url(img/img_three.jpg)')
  };
  if ($(document).scrollTop() >= $("#four").position().top) {
    $('body').css('background-image', 'url(img/img_four.jpg)')
  };

});
