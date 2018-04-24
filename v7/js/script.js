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

	toastr.options = {
		"positionClass": "toast-bottom-center"
	}
	
    $('.submit_msg').hide();
    $('.btn_submit').click(function(e) {
        e.preventDefault();
       // $('.btn_submit').hide();
        //$('.submit_msg').fadeIn(1000);
        toastr.success($('.submit_msg').html());
		$.post("msg.php", $("#contactForm").serialize())
        /*setTimeout(function() {
            $('.submit_msg').fadeOut(1000);
            setTimeout(function() {                
                $('.btn_submit').fadeIn(500);
            },1000);
        },3000); */
    });

    // tabs
    $('.tabs .dot').click(function() {
		var tab = $(this).data('tab');		
		selTab(this,tab);
    });
	$('.tabs .dot[data-tab=0]').addClass('active');
	
});

function selTab(obj,id){ console.log(obj);
	$(obj).closest('.tabs').find('.dot').removeClass('active');	
	$(obj).closest('.tabs').find('.dot[data-tab=' + id + ']').addClass('active');
	$(obj).closest('.tabs').find('.tab').hide();			
	$(obj).closest('.tabs').find('.tab_' + id).show();
}


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


