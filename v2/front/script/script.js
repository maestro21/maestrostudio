$(document).ready(function() {

<<<<<<< HEAD
        var anchors = [];
        $.each($('.menu li'), function() {
           anchors.push($(this).data('menuanchor')); 
        });
        console.log(anchors);

        $('.fullpage').fullpage({ 
            menu: '.menu',
            anchors: anchors
=======
        $('.fullpage').fullpage({
            anchors: ['home', 'uber-uns', 'leistungen', 'preise', 'referenzen', 'kontakten', 'impressum'],
            menu: '#menu',
           // scrollOverflow: true,
            autoScroll: false,
>>>>>>> 0ab4909665910f69f2b4d5f3a174d5dcf2aa0410
        });

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