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
                max: 23,
                values: [ 6, 8 ],
                slide: function( event, ui ) {

                    if(ui.values[ 0 ] < 12) {
                        ui.values[ 0 ] = ui.values[ 0 ] +" AM";
                    }

                    if(ui.values[ 1 ] >= 12) {
                        if(ui.values[ 1 ] != 12) {
                            ui.values[ 1 ] = parseFloat(ui.values[ 1 ] - 12);
                        }

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
                dateFormat:'yy-mm-dd',
                timeFormat: "hh:mm tt"
            });

        });
    });
      $( function() {

          $('.dateShowing').each(function () {
              var id = this.id;
              $( "#enddatepicker_"+id ).datetimepicker({
                  dateFormat:'yy-mm-dd',
                  timeFormat: "hh:mm tt"
              });

          });
  } );

      $(document).ready(function(){
        $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3
          });
});
$(document).ready(function(){
    $('.on-pending-btn li a').click(function(){
        $('.common-cls').hide();
        $('.on-pending-btn li a').removeClass('penon-active');
        var id = $(this).attr('data-penon');
        $(this).addClass('penon-active');
        $("#" + id).show();
    });
});

function hireme(id) {
    swal({
        title: 'Are You sure want to hire this service providers!',
        text: 'It will be close in 10 seconds.',
        timer: 10000,
        onOpen: function () {
            showConfirmButton: true
        },
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hire'
    }).then(
        function () {
            $.ajax({
                type    : "POST",
                url     : jssitebaseUrl+'users/hireservice',
                //async   : false,
                data    : {id:id},
                success : function(data){
                    alert(data);return false;
                    clearConsole();
                    if($.trim(data) == 'success')
                        alert('success');
                    else if($.trim(data) == 'error') {
                        alert('error');
                    }else {
                        alert('something wrong');
                    }
                },

            });return false;
        },
        // handling the promise rejection
        function (dismiss) {
            if (dismiss === 'timer') {
                console.log('I was closed by the timer')
            }
        }
    )
}

function filter(value) {
    alert($("div").find("[data-search='" + value + "']"));
}

$(document).ready(function(){
    function alignModal(){
        var modalDialog = $(this).find(".modal-dialog");

        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
    }
    $(".modal").on("shown.bs.modal", alignModal);

    $(window).on("resize", function(){
        $(".modal:visible").each(alignModal);
    });
});

function submitLogin() {
    $(".error").html('');
    var username = $("#username").val();
    var password = $("#password").val();

    if(username == '') {
        $("#userErr").addClass('error').html('Please enter your username');
        $("#username").focus();
        return false;
    }else if(password == '') {
        $("#passErr").addClass('error').html('Please enter your password');
        $("#password").focus();
        return false;
    }else {
        $.ajax({
            type    : "POST",
            url     : jssitebaseUrl+'users/customerLogin',
            data    : {username:username,password:password},
            success : function(data){
                if($.trim(data) == '1') {
                    window.location.reload();
                }else if($.trim(data) == '2') {
                    $("#loginErr").addClass('error').html('Your has been deactive.Please contact Admin');
                    return false;
                }else {
                    $("#loginErr").addClass('error').html('Invalid Login');
                    return false;
                }
            },

        });return false;
    }
}

function partnerSignup() {
    $(".error").html('');
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var location = $("#location").val();
    var username = $("#partner_username").val();
    var phone_number = $("#phone_number").val();
    var password = $("#partner_password").val();
    if(firstname == '') {
        $("#firstnameErr").addClass('error').html('Please enter your firstname');
        $("#firstname").focus();
        return false;

    }else if(lastname == '') {
        $("#lastnameErr").addClass('error').html('Please enter your lastname');
        $("#lastname").focus();
        return false;

    }else if(location == '') {
        $("#locationErr").addClass('error').html('Please enter your location');
        $("#location").focus();
        return false;

    }else if(phone_number == '') {
        $("#phoneErr").addClass('error').html('Please enter your mobile number');
        $("#phone_number").focus();
        return false;

    }else if(username == '') {
        $("#emailErr").addClass('error').html('Please enter your email id');
        $("#username").focus();
        return false;

    }else if (!validateEmail(username)) {
        $("#emailErr").addClass('error').html('Please enter valid email id');
        $("#username").focus();
        return false;

    }else if(password == '') {
        $("#partnerpassErr").addClass('error').html('Please enter your password');
        $("#password").focus();
        return false;

    }else {
        $.ajax({
            type    : "POST",
            url     : jssitebaseUrl+'users/partnerVerify',
            data    : {username:username},
            success : function(data){
                if($.trim(data) == '1') {
                    document.partner_signup.submit();
                }else if($.trim(data) == '2') {
                    $("#emailErr").addClass('error').html('Username already Exists');
                    $("#partner_username").focus();
                    return false;
                }
            }
        });return false;
    }

}

function validateEmail(sEmail) {
    var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}

function partnerLogin() {
    $(".error").html('');
    var username = $("#sp_username").val();
    var password = $("#sp_password").val();
    if(username == '') {
        $("#spuserErr").addClass('error').html('Please enter your username');
        $("#sp_username").focus();
        return false;
    }else if(password == '') {
        $("#sppassErr").addClass('error').html('Please enter your password');
        $("#sp_password").focus();
        return false;
    }else {
        $.ajax({
            type    : "POST",
            url     : jssitebaseUrl+'partners/partnerLogin',
            data    : {username:username,password:password},
            success : function(data){
                if($.trim(data) == '1') {
                    window.location.href = jssitebaseUrl+'partners/dashboard';
                }else if($.trim(data) == '2') {
                    $("#spuserErr").addClass('error').html('Your has been deactive.Please contact Admin');
                    return false;
                }else {
                    $("#spuserErr").addClass('error').html('Invalid Login');
                    return false;
                }
            },

        });return false;
    }
}

function saveProfile() {
    $(".error").html('');
    var firstname = $("#profile_firstname").val();
    var lastname = $("#profile_lastname").val();
    var username = $("#profile_username").val();
    var location = $("#profile_location").val();
    var phone_number = $("#profile_phone").val();
    var editId = $("#editId").val();

    if(firstname == '') {
        $("#spFirstErr").addClass('error').html('Please enter your firstname');
        $("#profile_firstname").focus();
        return false;

    }else if(lastname == '') {
        $("#spLastErr").addClass('error').html('Please enter your lastname');
        $("#profile_lastname").focus();
        return false;

    }else if(location == '') {
        $("#spaddressErr").addClass('error').html('Please enter your location');
        $("#profile_location").focus();
        return false;

    }else if(phone_number == '') {
        $("#spPhoneErr").addClass('error').html('Please enter your mobile number');
        $("#profile_phone").focus();
        return false;

    }else if(username == '') {
        $("#spUserErr").addClass('error').html('Please enter your email id');
        $("#profile_username").focus();
        return false;

    }else if (!validateEmail(username)) {
        $("#spUserErr").addClass('error').html('Please enter valid email id');
        $("#username").focus();
        return false;
    }else {
        $.ajax({
            type    : "POST",
            url     : jssitebaseUrl+'users/partnerVerify',
            data    : {username:username,editId:editId},
            success : function(data){
                if($.trim(data) == '1') {
                    document.partner_contact.submit();
                }else if($.trim(data) == '2') {
                    $("#emailErr").addClass('error').html('Username already Exists');
                    $("#partner_username").focus();
                    return false;
                }
            }
        });return false;
    }
}
function changePassword() {
    $(".error").html('');
    var oldpassword = $("#oldpassword").val();
    var newpassword = $("#newpassword").val();
    var confirmpassword = $("#confirmpassword").val();

    if(oldpassword == '') {
        $("#oldpassErr").addClass('error').html('Please enter your old password');
        $('#oldpassword').focus();
        return false;
    }else if(newpassword == '') {
        $("#newpassErr").addClass('error').html('Please enter your new password');
        $('#newpassword').focus();
        return false;

    }else if(confirmpassword == '') {
        $("#confirmpassErr").addClass('error').html('Please enter your confirm password');
        $('#confirmpassword').focus();
        return false;

    }else if(newpassword != confirmpassword) {
        $("#newpassErr").addClass('error').html('Your new password and confirm password mismatch');
        $('#newpassword').focus();
        return false;
    }else {
        $.ajax({
            type    : "POST",
            url     : jssitebaseUrl+'partners/verifyPassword',
            data    : {password:oldpassword,newpassword:newpassword},
            success : function(data){
                if($.trim(data) == '1') {
                    window.location.reload();
                }else if($.trim(data) == '2') {
                    $("#oldpassErr").addClass('error').html('Required fields Missing');
                    $("#oldpassword").focus();
                    return false;
                }else if($.trim(data) == '3') {
                    $("#oldpassErr").addClass('error').html('Old password wrong');
                    $("#oldpassword").focus();
                    return false;
                }
            }
        });return false;
    }
}