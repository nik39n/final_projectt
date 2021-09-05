let menuBtn = document.querySelector('.classy-navbar-toggler');
let menuBtnL = document.querySelector('.classy-menu');
let closer = document.querySelector('.classycloseIcon');
console.log(menuBtnL);
menuBtn.addEventListener('click', function(){
    menuBtnL.style.left = '0px';

});
closer.addEventListener('click', function(){
    menuBtnL.style.left = '-310px';
});