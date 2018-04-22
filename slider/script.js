var section = 0;
var sections = null;


function recalc(sid) {
    var menu = $(".menu").find("[data-menuanchor='" + sid + "']");
    var submenus = $(".fullpage").find("[data-menu='" + sid + "']");
    var checked = true;
    if(submenus.length > 0) {
        var checkedmenus = $(".fullpage").find("[data-menu='" + sid + "'].checked");
        if(checkedmenus.length != submenus.length) {
            checked = false;
            var done = (checkedmenus.length / submenus.length);
            bars[sid].set(done);
        }
    }
    if(checked) {
        menu.find('.progressCircle').html('&#10004;').addClass('completed');
    }
    var total = Math.round($('.section.checked').length / $('.section').length * 100);
    $('.progresstext').text(total + '% durchgeführt');
    $('.progress-bar').width(total + '%');
}

function gotoSection(sid) {

    // scroll
    var el = $('#' + sid);
    el[0].scrollIntoView();

    // mark as checked
    if(!el.hasClass('checked')){
        el.addClass('checked');
    }

    // update menu
    if($('#' + sid).data('menu')) {
        sid = $('#' + sid).data('menu');
    }
    $('li').removeClass('active');
    var menu = $(".menu").find("[data-menuanchor='" + sid + "']");
    menu.addClass('active');

    // calculate
    recalc(sid);
}

var bars = [];


$(document).ready(function() {
    $('.menu li').each(function() {
        var anchorname = $(this).data('menuanchor');
        $(this).click(function() {
            gotoSection(anchorname);
        });

        var id = '#' + anchorname + '_progress';
        console.log(id);
        var bar = new ProgressBar.Circle(id, {
            strokeWidth: 10,
            easing: 'easeInOut',
            duration: 1400,
            color: '#ff8200',
            trailColor: 'lightgray',
            trailWidth: 6,
            svgStyle: null
        });
        bars[anchorname] = bar;
    });


    sections = $('.section');

    $(window).on('scroll', scrollHandler);
    function scrollHandler() {
        var _sec = 0;
        var screen_mid = $(window).scrollTop() + ($(window).height() / 2.0);
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


    $('.arrow.left').click(function () {
        if(section > 0) section--;
        gotoSection($('.section')[section].id);
    });

    $('.arrow.right').click(function () {
        if(section < sections.length - 1) section++;
        gotoSection($('.section')[section].id);;
    });

    var _sid = $($('.menu li')[0]).data('dataanchor');
    recalc(_sid);


    // Content switch
    $('#section1_2 .success').hide();
    $('#checkbox_1_1').click(function() {
        $('#section1_2 .success').show();
    });

    $('.stage2').hide();
    $('#section2_1 .stage1 .btn').click(function() {
        $('#section2_1 .stage1').hide();
        $('#section2_1 .stage2').show();
    });
    $('#section2_2 .stage1 .btn').click(function() {
        $('#section2_2 .stage1').hide();
        $('#section2_2 .stage2').show();
    });

    $('.btn-cancel').click(function() {
        $('.section-cancel').show();

        var menu =  $($('.section')[section]).data('menu');
        menu = $(".menu").find("[data-menuanchor='" + menu + "']");
        menu.find('.progressCircle').html('&times;').addClass('canceled');
    });

    setTimeout(function(){ $(window).scrollTop(0); }, 100);
});


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