// carosoule slider
$(document).ready(function(){
	$('.t-under').click(function () {
		$( "#gulp-sign-up" ).find(".close").trigger( "click" );
	});
	$('.sign-up').click(function () {
		$( "#gulp-login" ).find(".close").trigger( "click" );
		$( "#gulp-sign-up").modal('show');
	});
	$('.sign-in').click(function () {
		$( "#gulp-sign-up" ).find(".close").trigger( "click" );
		$( "#gulp-login" ).modal('show');
	});
});

jQuery(document).on('click','[data-toggle=modal]',function(){
  jQuery('[role*=dialog]').each(function(){
    switch(jQuery(this).css('display')){
      case('block'):{jQuery('#'+jQuery(this).attr('id')).modal('hide'); break;}
    }
  });
});

$('#media').carousel({
    pause: true,
    interval: false,
});

// counter
var a = 0;
$(window).scroll(function () {

    var oTop = $('#counter').offset().top - window.innerHeight;
    if (a == 0 && $(window).scrollTop() > oTop) {
        $('.counter-value').each(function () {
            var $this = $(this),
                countTo = $this.attr('data-count');
            $({
                countNum: $this.text()
            }).animate({
                countNum: countTo
            },

                {

                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $this.text(this.countNum);
                        //alert('finished');
                    }

                });
        });
        a = 1;
    }

});