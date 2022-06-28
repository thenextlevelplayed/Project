var img = document.querySelector("#img");
console.log(img.style.clipPath)

window.addEventListener("scroll",function(){
    var scroll = window.scrollY;

    img.style.clipPath = "circle("+scroll+" px at center)"
})