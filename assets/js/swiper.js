const swiper = new Swiper('.swiper', {
    autoHeight: true,
    loop: true,

    pagination: {
        el: '.swiper-pagination',
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    
    });

    function nextSlide() {
    swiper.slideNext(); 
}
setInterval(nextSlide, 6000);