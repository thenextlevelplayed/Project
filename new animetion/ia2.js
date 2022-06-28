var img = document.querySelector(".kaimau-image");
window.addEventListener("scroll",function(){
    var scroll = window.scrollY;
    img.style.clipPath = "circle("+scroll+" px at center)"
})