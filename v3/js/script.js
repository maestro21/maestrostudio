$(document).ready(function() {

        $('.teaser h1').hide().fadeIn(2000);


    	$('.hamburger').click(function() {
            $('.menu').toggleClass('responsive');
        });

        var anchors = [];
        $.each($('.menu li'), function() {
           anchors.push($(this).data('menuanchor')); 
        });
        console.log(anchors);


        $('.gal').slick({
        dots: true,
        infinite: true,
        speed: 500,
       // autoplay: true
    });
/*
        $('.fullpage').fullpage({ 
            menu: '.menu',
            anchors: anchors
        }); */


        var sections = $('.section');
        var container = window;
        var section = 0;

        $(container).on('scroll', scrollHandler);
        function scrollHandler() { 
            var _sec = 0;
            var screen_mid = $(container).scrollTop() + ($(container).height() / 2.0);
            for (var i = 0; i < sections.length; ++i) {
                var _section = sections[i];
                // Pick the the last section which passes the middle line of the screen.
                if (_section.offsetTop <= screen_mid)
                {
                    _sec = i;
                }
            }
            if(_sec != section) {
                section = _sec;
                gotoSection($('.section')[section].id);
            }
        }
    }
);


function gotoSection(sid) {
    // scroll
    var el = $('#' + sid);
   // el[0].scrollIntoView();
    console.log(sid);
    // update menu
    $('.menu a').removeClass('active');
    $(".menu").find("[href='#" + sid + "']").addClass('active');
}


function closest (num, arr) {
    var curr = arr[0];
    var diff = Math.abs (num - curr);
    for (var val = 0; val < arr.length; val++) {
        var newdiff = Math.abs (num - arr[val]);
        if (newdiff < diff) {
            diff = newdiff;
            curr = arr[val];
        }
    }
    return curr;
}