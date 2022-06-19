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