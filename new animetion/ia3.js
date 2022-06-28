let bg = document.querySelector("#bg");
window.addEventListener('scroll', function () {
  let value = window.scrollY;
  
  bg.style.backgroundSize = 700 + value*120 +'px';
});