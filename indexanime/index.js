window.addEventListener('load', () => {
    const kaimau = document.querySelector('.kaimau');
    const kaimauTitle = document.querySelector('.kaimau__title');
    const kaimauCover = document.querySelector('.kaimau__cover');

    let kaimauHeight = kaimau.clientHeight;
    let scaleRatio = Math.pow(500, 1/kaimauHeight);

    window.addEventListener('scroll', () => {
        let scrollPosition = window.scrollY;
        let scaleAmount = Math.pow(scaleRatio, scrollPosition);
        
        // console.log(scrollPosition);
        if(scrollPosition > 0) {
            kaimauCover.classList.add('hidden');
        } else {
            kaimauCover.classList.remove('hidden');
        }

        if(scaleAmount < 200) {  
            kaimauTitle.style.transform = `scale(${scaleAmount})`;
        } else {
            kaimauTitle.style.transform = `scale(500)`;
        }
    });
});

// let k = document,querySelector('#k');
// window.addEventListener('scroll',function(){
//     let value = window.scrollY;
//     k.style.backgroundSize = 100 + value*2 + "px";
// )}