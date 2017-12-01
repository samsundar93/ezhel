(function( $ ) {

    //Function to animate slider captions 
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	
	//Variables on page load 
	var $myCarousel = $('#carousel-example-generic'),
		$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
		
	//Initialize carousel 
	$myCarousel.carousel();
	
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);
	
	//Pause carousel  
	$myCarousel.carousel('pause');
	
	
	//Other slides to be animated on carousel slide event 
	$myCarousel.on('slide.bs.carousel', function (e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
	});  
    $('#carousel-example-generic').carousel({
        interval:3000,
        pause: "false"
    });
	
})(jQuery);	
// JavaScript Document
/*$(document).ready(function(){
	$('.next-btn').click(function(){
		$('.common-childpage').hide();
		$('.child-page2').show();
	})
});*/

  $( function() {
      $('.timingSlider').each(function () {
          var id = this.id;
          $( "#slider-range_"+id ).slider({
              range: true,
              min: 1,
              max: 24,
              values: [ 6, 8 ],
              slide: function( event, ui ) {

                  if(ui.values[ 0 ] < 12) {
                      ui.values[ 0 ] = ui.values[ 0 ] +" AM";
                  }

                  if(ui.values[ 1 ] >= 12) {
                      ui.values[ 1 ] = ui.values[ 1 ] +" PM";
                  }
                  if(ui.values[ 1 ] < 12) {
                      ui.values[ 1 ] = ui.values[ 1 ] +" AM";
                  }
                  $( "#amount_"+id ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
              }
          });

          $( "#amount_"+id ).val($( "#slider-range_"+id ).slider( "values", 0 ) +
              " AM - " + $( "#slider-range_"+id ).slider( "values", 1 ) +' AM' );
      })

  });

  $( function() {
      $('.timingSlider').each(function () {
          var id = this.id;
          $( "#slider-range-amount_"+id ).slider({
              range: true,
              min: 0,
              max: 50,
              values: [ 0, 25 ],
              slide: function( event, ui ) {
                  $( "#pay_range_"+id ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
              }
          });
          $( "#pay_range_"+id ).val( "" + $( "#slider-range-amount_"+id ).slider( "values", 0 ) +
              " -$" + $( "#slider-range-amount_"+id ).slider( "values", 1 ) );
      });

  });



  $(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".date-time").not(targetBox).hide();
        $(targetBox).show();
    });
});
    $( function() {
        $('.dateShowing').each(function () {
            var id = this.id;
            $( "#startdatepicker_"+id ).datetimepicker({
                timeFormat: "hh:mm tt"
            });

        });
    });
      $( function() {

          $('.dateShowing').each(function () {
              var id = this.id;
              $( "#enddatepicker_"+id ).datetimepicker({
                  timeFormat: "hh:mm tt"
              });

          });
  } );