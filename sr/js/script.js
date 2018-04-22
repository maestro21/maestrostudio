$(document).ready(function() {
    window.onscroll = changePos;

    function changePos() {
        if (window.pageYOffset > window.innerHeight) {
            $(".header").addClass('fixed');
        } else {
            $(".header").removeClass('fixed');
        }
    }

    $('.gal').slick({
        dots: true,
        infinite: true,
        speed: 500,
        autoplay: true
    });
});