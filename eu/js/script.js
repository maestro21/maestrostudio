$(document).ready(function() {
    

    $('#menu a:first').addClass('active').click();
  

    $('.hamburger').click(function() {
        $('.menu').toggleClass('responsive');
    });

    var anchors = [];
    $.each($('.menu li'), function() {
       anchors.push($(this).data('menuanchor')); 
    });
    
    /**/
    $('.fullpage').pagepiling({
        direction: 'horizontal',
        menu: '#menu',
        anchors: anchors,
    });
    $('.fullpage .section:first *').hide().fadeIn(1000);

    $('.submit_msg').hide();
    $('.btn_submit').click(function(e) {
        e.preventDefault();
        $('.btn_submit').hide();
        $('.submit_msg').fadeIn(1000);
        $.post("msg.php", $("#contactForm").serialize())
        setTimeout(function() {
            $('.submit_msg').fadeOut(1000);
            setTimeout(function() {                
                $('.btn_submit').fadeIn(500);
            },1000);
        },3000);
    });

    /** Showcase **/

    function Timer(fn, t) {
        var timerObj = setInterval(fn, t);
    
        this.stop = function() {
            if (timerObj) {
                clearInterval(timerObj);
                timerObj = null;
            }
            return this;
        }
    
        // start timer using current settings (if it's not already running)
        this.start = function() {
            if (!timerObj) {
                this.stop();
                timerObj = setInterval(fn, t);
            }
            return this;
        }
    
        // start with new interval, stop current interval
        this.reset = function(newT) {
            t = newT;
            return this.stop().start();
        }
    }
    var timer;

    var gallery = {
        selector: '',
        elements: [],
        length: 0,
        counter: 0,
        ini: function(selector,items) {
            this.selector = selector;
            this.elements = items;
            this.length = items.length - 1;
            this.draw();
            timer = new Timer(this.next, 5000);            
            this.select(0);
        },
        prev: function() {
            gallery.counter--;
            if( gallery.counter < 0 )  {
                gallery.counter = gallery.length;
            }
            gallery.select(gallery.counter);
        }, 
        next: function() {
            gallery.counter++;
            if( gallery.counter > gallery.length )  {
                gallery.counter = 0;
            }
            gallery.select(gallery.counter); 
        },
        draw: function() {
            $(this.selector).html('<div class="gallery">' +
                '<div class="prev"><img src="' + BASE_URL + 'img/larr.png"></div>' +
                '<div class=items><div class=dots><div class="prev"><img src="' + BASE_URL + 'img/larr.png"></div></div></div>' +
                '<div class="next"><img src="' + BASE_URL + 'img/rarr.png"></div>' +
                '</div>');
            for(var i in this.elements) {
                $('<div data-i="'+i+'"><a href="' + this.elements[i].url +'" target="_blank">' +
                '<img src="' + BASE_URL + 'img/' + this.elements[i].img +'?v=2" alt="' + this.elements[i].url + '"><p><span>' +
                 this.elements[i].url.replace('http://', '') +'</span></p></a></div>').insertBefore('.dots');
                $(this.selector + ' .gallery .dots').append('<div class=dot data-i="' + i + '"></div>');
            }
            $(this.selector + ' .gallery .dots').append('<div class="next"><img src="' + BASE_URL + 'img/rarr.png"></div>');           
            $('.dot').click(function() {
                gallery.select($(this).data('i'));
            });
            $('.prev').click(function() {
                gallery.prev();
            });
            $('.next').click(function() {
                gallery.next();
            });
        },
        select: function(i) {
            timer.stop();
            this.counter = i;
            $(this.selector + ' .gallery .items div').hide();
            $(this.selector + ' .gallery .items div[data-i="' + i + '"]').fadeIn(2000);
            $(this.selector + ' .gallery .dots div').removeClass('active');
            $(this.selector + ' .gallery .dots div[data-i="' + i + '"]').addClass('active');
            timer.start();
        }
    }

    var showcase = [        
        {
            url: '#',
            img: 'showcase/showcase1.png',
        },
        {
            url: 'http://cassamala-ti.ch', 
            img: 'showcase/showcase2.png'
        },
        {
            url: 'http://139.162.160.65/luzern',
            img: 'showcase/showcase4.png',
        },
        {
            url: 'http://svetarobski.com',
            img: 'showcase/showcase3.png',
        },
    ];

    gallery.ini('.gal', showcase);
});


function gotoSection(sid) {
    // scroll
    $('.section *').hide();
    var el = $('#' + sid);
    el.find('*').fadeIn(2000);
    //el[0].scrollIntoView();
    $('html, body').animate({
            scrollTop: el.offset().top
        }, 1000);
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


