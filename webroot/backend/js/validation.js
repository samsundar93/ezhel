//--------------------------------------- Site Settings -----------------------------------------------
//site seeting
function siteSeetingValidation1()
{
	alert('commeee');die();
	$("#errormsg").removeClass('successmsg');
	var admin_name        = $.trim($("#admin_name").val());
	var admin_email       = $.trim($("#admin_email").val());
	var site_name         = $.trim($("#sitename").val());
	var image_name        = $.trim($("#sitelogo").val());
	var page_user_side    = $.trim($("#user_page").val());
	var page_admin_side   = $.trim($("#admin_page").val());
	var host_name 		  = $.trim($("#host_name").val());
	var port_address 	  = $.trim($("#port_address").val());
	var smtp_email 		  = $.trim($("#smtp_email").val());
	var smtp_password 	  = $.trim($("#smtp_password").val());
	var currencyimg		  = $.trim($("#currencyimg").val());
	var currency_sym	  = $.trim($("#currency_sym").val());
	var site_address	  = $.trim($("#site_address").val());
    var howmuch_cont      = $.trim($("#howmuch_cont").val());
	var site_fav_icon	  = $.trim($("#site_fav_icon").val());
    var fb_appID	      = $.trim($("#fb_appID").val());
    var fb_appScrect      = $.trim($("#fb_appScrect").val());
    var google_api        = $.trim($("#google_api").val());
    var captcha_sitekey   = $.trim($("#captcha_sitekey").val());
    var captcha_secretkey = $.trim($("#captcha_secretkey").val());
    
    
    //SMS Info
    var sms_auth_id     = $.trim($("#sms_auth_id").val());
    var sms_auth_token  = $.trim($("#sms_auth_token").val());
    var sms_from_no     = $.trim($("#sms_from_no").val());

    // Offline Status
    var offline_notes   = $.trim($("#offline_notes").val());
    
    
	if(admin_name == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Admin Name");
		$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
		$("#admin_name").focus();
		return false;
	}
	if(admin_email == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Admin Email Id");
		$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
		$("#admin_email").focus();
		return false;
	}
	
	var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
	var valid = emailRegex.test(admin_email);
	if(!valid){
		$("#errormsg").addClass('errormsg').html("Please Enter the Valid Email Id");
		$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
		$("#admin_email").focus();
		return false;
	}		
	if(site_name == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Site Name");
		$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
		$("#sitename").focus();
		return false;
	}
	if(image_name != ''){	
		var ext = $('#sitelogo').val().split('.').pop().toLowerCase();
		
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
			 {$("#errormsg").addClass('errormsg').html("Please Select the Valid Image Type");
			  $('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
				$("#sitelogo").focus();
				return false;
			 }				
	}
    if(fb_appID == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Facebook App ID");
		$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
		$("#fb_appID").focus();
		return false;
	}
    if(fb_appScrect == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Facebook App Secret ID");
		$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
		$("#fb_appScrect").focus();
		return false;
	}
	if(google_api == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Google Api key");
		$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
		$("#google_api").focus();
		return false;
	}
	if(captcha_sitekey == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Google recaptcha_sitekey");
		$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
		$("#captcha_sitekey").focus();
		return false;
	}
	if(captcha_secretkey == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Google recaptcha secretkey");
		$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
		$("#captcha_secretkey").focus();
		return false;
	}
	if(page_user_side == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Page in User Side");
		$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
		$("#user_page").focus();
		return false;
	}
	
	if($('.mail_option:checked').val() == 'smtp')
	{
		if(host_name == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the host name");
			$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
			$("#host_name").focus();
			return false;
		}
		if(port_address == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Port address");
			$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
			$("#port_address").focus();
			return false;
		}
		if(smtp_email == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the SMTP Email");
			$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
			$("#smtp_email").focus();
			return false;
		}else if(smtp_email != ''){
			var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
			var valid = emailRegex.test(smtp_email);
			if(!valid){
				$("#errormsg").addClass('errormsg').html("Please Enter the Valid SMTP Email");
				$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
				$("#smtp_email").focus();
				return false;
			}	
		}
		if(smtp_password == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the SMTP Password");
			$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
			$("#smtp_password").focus();
			return false;
		}
	}
	if(site_address == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the site address");
		$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
		$("#site_address").focus();
		return false;
	}	
    if(howmuch_cont == '')
    {
        $("#errormsg").addClass('errormsg').html("Please Enter the No. of contractor will get leads");
        $('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
		$("#howmuch_cont").focus();
		return false; 
    }
	
	if(site_fav_icon != ''){
			var ext = $('#site_fav_icon').val().split('.').pop().toLowerCase();
			
			if($.inArray(ext, ['ico']) == -1)
			{$("#errormsg").addClass('errormsg').html("Please select Fav Icon as .ico Format");
		$('.nav-tabs > li').find('a[href="#site_setting_tab1"]').trigger('click');	
				$("#site_fav_icon").focus();
				return false;
			}	
	}
    
    //SMS Info
   	var sms_enable   = ($('#sms_enable:checked').val() == undefined ? 'NO' : $('#sms_enable:checked').val());	
    if(sms_enable == 'YES' && sms_enable != undefined)
    {
        if(sms_auth_id == '')
        {
            $("#errormsg").addClass('errormsg').html("SMS Setting--->Please Enter AUTH ID");
            $('.nav-tabs > li').find('a[href="#site_setting_tab6"]').trigger('click');
    		$("#sms_auth_id").focus();
    		return false; 
        }
        if(sms_auth_token == '')
        {
            $("#errormsg").addClass('errormsg').html("SMS Setting--->Please Enter AUTH TOKEN");
            $('.nav-tabs > li').find('a[href="#site_setting_tab6"]').trigger('click');
    		$("#sms_auth_token").focus();
    		return false; 
        }
        if(sms_from_no == '')
        {
            $("#errormsg").addClass('errormsg').html("SMS Setting--->Please Enter From SMS Number");
            $('.nav-tabs > li').find('a[href="#site_setting_tab6"]').trigger('click');
    		$("#sms_from_no").focus();
    		return false; 
        }
    }
    // Offline Info
    var offline_status_yes   = ($('#offline_status_yes:checked').val() == undefined ? 'NO' : $('#offline_status_yes:checked').val());	
    if(offline_status_yes == 'Y' && offline_status_yes != undefined)
    {
        if(offline_notes == '')
        {
            $("#errormsg").addClass('errormsg').html("Offline Info--->Please Enter Offline Notes");
            $('.nav-tabs > li').find('a[href="#site_setting_tab2"]').trigger('click');
    		$("#offline_notes").focus();
    		return false; 
        }
    }

    // Currency Info
    if(document.getElementById("currency_display_img").checked == true){
		var cur_option 	= $.trim($("#currency_display_img").val());
	}else if(document.getElementById("currency_display_sym").checked == true){ 
		var cur_option 	= $.trim($("#currency_display_sym").val());
	}
	
	if(cur_option == 'img'){
		if(currencyimg != ''){	
			var ext = $('#currencyimg').val().split('.').pop().toLowerCase();
			
			if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
			{$("#errormsg").addClass('errormsg').html("Currency Info--->Please Select the Valid currency Type");
			$('.nav-tabs > li').find('a[href="#site_setting_tab5"]').trigger('click');
				$("#currencyimg").focus();
				return false;
			}				
		}
	}
	if(cur_option == 'sym'){
		if(currency_sym == ''){
			$("#errormsg").addClass('errormsg').html("Currency Info--->Please Enter the currency code");
			$('.nav-tabs > li').find('a[href="#site_setting_tab5"]').trigger('click');
			$("#currency_sym").focus();
			return false;
		}
	}

    
}

// Stripe payment Update 
function paymentSettingValidationForStripe()
{   
    $("#errormsg_stripe").removeClass('successmsg');
	var stripe_enable         = ($('#stripe_enable:checked').val() == undefined ? 'NO' : $('#stripe_enable:checked').val());	
	var stripe_payment_mode   = $('.radiobotton1_stripe:checked').val();	
	var stripe_apikey_live    = $.trim($("#stripe_apikey_live").val());
	var stripe_apikey_test    = $.trim($("#stripe_apikey_test").val());
    var publisher_key_live    = $.trim($("#publisher_key_live").val());
    var publisher_key_test    = $.trim($("#publisher_key_test").val());

    if(stripe_enable == 'YES' && stripe_enable != undefined)
    {
        if(stripe_payment_mode == 'Live'){
    		if(stripe_apikey_live == ''){
    			$("#errormsg_stripe").addClass('errormsg').html("Please Enter Live Secret Key");
                $("#stripe_apikey_live").focus();
    			return false;
    		}        
            if(publisher_key_live == ''){
                $("#errormsg_stripe").addClass('errormsg').html("Please Enter Live Publisher Key");
                $("#publisher_key_live").focus();
    			return false;
            }            
    	}	
    	else if(stripe_payment_mode == 'Test'){	
            
    		if(stripe_apikey_test == ''){
    			$("#errormsg_stripe").addClass('errormsg').html("Please Enter Test Secret Key");
                $("#stripe_apikey_test").focus();
    			return false;
    		}
            if(publisher_key_test == ''){
                $("#errormsg_stripe").addClass('errormsg').html("Please Enter Test Publisher Key");
                $("#publisher_key_test").focus();
    			return false;
            }
    	}	
    	if(stripe_payment_mode != '')
    	{		
    		// alert(stripe_payment_mode);
    		$.post('adminAjaxFile.php',{"stripe_enable":stripe_enable,"stripe_payment_mode":stripe_payment_mode, "stripe_apikey_live":stripe_apikey_live, "stripe_apikey_test":stripe_apikey_test,'publisher_key_live':publisher_key_live,'publisher_key_test':publisher_key_test,"action":"editUpdatePaymentSetting_stripe"},function(response){		     
    			if(response == "updated_success"){
    				$("#errormsg_stripe").removeClass('errormsg');
    				$("#errormsg_stripe").addClass('successmsg').html("Stripe Payment setting has been updated successfully");
    				return false;
    			}
    			else{
    				$("#errormsg_stripe").html('');
    			}
    	  });
    	  return false; 
    	}
    }else{
        // alert(stripe_payment_mode);
    		$.post('adminAjaxFile.php',{"stripe_enable":stripe_enable,"action":"editUpdatePaymentSetting_stripe"},function(response){		     
    			if(response == "updated_success"){
    				$("#errormsg_stripe").removeClass('errormsg');
    				$("#errormsg_stripe").addClass('successmsg').html("Stripe Payment setting has been updated successfully");
    				return false;
    			}
    			else{
    				$("#errormsg_stripe").html('');
    			}
    	  });
    	  return false; 
    }
	
}

//trademen validation
function trademenAddValidation()
{    
    var fields = $("input[name='trad_skilltrade[]']").serializeArray();
    if (fields.length == 0)
    {
        $("#errormsg").addClass('errormsg').html("Service Category Info --> Must select at least one Skills & Business");
        $('.nav-tabs > li').find('a[href="#membershipinfo"]').trigger('click');	
    	return false;
    }
	
	//Services area
	var service_area    = $.trim($("#service_area").val());
	var service_miles   = $.trim($("#service_distance").val());
	
	if( service_area == ''){
		$("#errormsg").addClass('errormsg').html("Service Area Info --> Please Enter Service Area");
		$('.nav-tabs > li').find('a[href="#seriveareainfo"]').trigger('click');	
		$("#service_area").focus();
		return false;
	}	
	if( service_miles == ''){
		$("#errormsg").addClass('errormsg').html("Service Area Info --> Please Enter Service Miles");
		$('.nav-tabs > li').find('a[href="#seriveareainfo"]').trigger('click');	
		$("#service_distance").focus();
		return false;
	}
	if(isNaN(service_miles)){
		$("#errormsg").addClass('errormsg').html("Service Area Info --> Please Enter Valid Miles");
		$('.nav-tabs > li').find('a[href="#seriveareainfo"]').trigger('click');	
		$("#service_distance").focus();
		return false;
	}
	
	//contact details	
	var trade_logo      =   $("#trad_logo").val();
	var trad_firstname	=	$.trim($("#trad_firstname").val());
	var trad_lastname	=	$.trim($("#trad_lastname").val());
	var trad_mobile		=	$.trim($("#trad_mobile").val());
	var trad_email		=	$.trim($("#trad_email").val());
	var trade_name		=	$.trim($("#trade_name").val());
	var trad_address	=	$.trim($("#trad_address").val());
    var location        =   $.trim($.trim($("#location").val()));
	var trad_password	=	$.trim($("#trad_pwd").val());
    var userid          =   $("#userid").val();
	
    var regUrl =  new RegExp(/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/);
	
	if(trade_logo !=""){
	    if (!/(\.(gif|jpg|jpeg|png))$/i.test(trade_logo)){
			$("#errormsg").addClass('errormsg').html("Contact Info --> Logo format should be (gif,jpg,jpeg,png)");
			$('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');	
		    return false;
	    }
	}
   
	if(trad_firstname == ''){
		$("#errormsg").addClass('errormsg').html("Contact Info --> Please Enter First Name");
		$('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');	
		$("#trad_firstname").focus();
		return false;
	}
	if(trad_lastname == ''){
		$("#errormsg").addClass('errormsg').html("Contact Info -->  Please Enter Last Name");
		$('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');	
		$("#trad_lastname").focus();
		return false;
	}
	if(trad_mobile == ''){
		$("#errormsg").addClass('errormsg').html("Contact Info --> Please Enter Mobile No");
		$('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');	
		$("#trad_mobile").focus();
		return false;
	}
	if(trade_name == ''){
		$("#errormsg").addClass('errormsg').html("Contact Info --> Please Enter tradename");
		$('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');	
		$("#trade_name").focus();
		return false;
	}	
	if(trad_address == ''){
		$("#errormsg").addClass('errormsg').html("Contact Info --> Please Enter the Address.");
	   $('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');	
		$("#trad_address").focus();
		return false;
	}
	if(location == ''){
		$("#errormsg").addClass('errormsg').html("Contact Info -->Please Select the Location");
		$('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');	
		$("#location").focus();
		return false;
	}    
	if(trad_email == ''){
		$("#errormsg").addClass('errormsg').html("Contact Info --> Please Enter Email id");
		$('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');	
		$("#trad_email").focus();
		return false;
	}
	if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(trad_email))){
	   	$("#errormsg").addClass('errormsg').html("Contact Info --> Please Enter Valid Email id");
		$('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');	
		$("#trad_email").focus();
		return false;
    }
    else if(trad_password == '' && userid == ''){
		$("#errormsg").addClass('errormsg').html("Contact Info --> Please Enter the Password.");
		$('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');	
		$("#trad_pwd").focus();
		return false;
	}
	if(trad_password.length<8 && userid == ''){
		$("#errormsg").addClass('errormsg').html("Contact Info --> Password Length should be Eight character.");
        $('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');	
		$("#trad_pwd").focus();
		return false;
	}	
	if(trad_email != '' && trade_name != '')
    {        
		$.post('adminAjaxFile.php',{'email':trad_email,'trade_name':trade_name,'userid':userid,'action':'userAddEditValidation'},function(data){		
			if(data == 'exist'){
				$("#errormsg").addClass('errormsg').html("Contact Info --> This Email Id Already Exist");
                $(".siteSettingTab a").removeClass("active"); $(".siteSettingTabContent").hide(); $("#contactinfo").addClass("active"); $('#contactinfo_content').show();
				$("#user_emailid").focus();
				return false;			
			}
			else if(data == 'tradename'){
				$("#errormsg").addClass('errormsg').html("Contact Info --> tradename Already Exist");
                $(".siteSettingTab a").removeClass("active"); $(".siteSettingTabContent").hide(); $("#contactinfo").addClass("active"); $('#contactinfo_content').show();
				$("#trade_name").focus();
				return false;
			}					
			else{
				document.trademeninfo.submit();
			}			
		});
		return false;
	}
}
//................................................................................................................
//delete work image
function deleteWorkPhoto(imageid){	
	if(imageid != ''){
		$.post('adminAjaxFile.php',{'imageid':imageid,'action':'deleteworkimage'},function(data){
				if(data == '1'){
					location.reload();
					return false;
				}			
			});
	}
}
//delete work image
function deleteJobPhoto(imageid){
	// alert(imageid)
	if(imageid != ''){
		$.post('adminAjaxFile.php',{'imageid':imageid,'action':'deletejobphoto'},function(data){
				// alert(data);
                if(data == '1'){
					location.reload();
					return false;
				}			
			});
	}
}

//delete work image
function deleteContWorkPhoto(imageid){
	// alert(imageid)
	if(imageid != ''){
		$.post('adminAjaxFile.php',{'imageid':imageid,'action':'deleteContWorkPhoto'},function(data){
				// alert(data);
                if(data == '1'){
					location.reload();
					return false;
				}			
			});
	}
}
//Form filed add edit validation
function formFieldAddEditValidation()
	{
		var subcatid     = $.trim($("#ffid").val());
		var dis_txt_name = $.trim($("#dis_txt_name").val());
		var field_type   = $.trim($("#field_type").val());
        
        //alert($("#field_type option:selected").text());
		
		if(subcatid == ''){
			$("#errormsg").addClass('errormsg').html("Please select category");
			$("#ffid").focus();
			return false;
		}		
		if(dis_txt_name == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Text to display");
			$("#dis_txt_name").focus();
			return false;
		}
		if(field_type == ''){
			$("#errormsg").addClass('errormsg').html("Please Select Field type");
			$("#field_type").focus();
			return false;
		}
        if($("#field_type option:selected").text() == 'checkbox' || $("#field_type option:selected").text() == 'radio' || $("#field_type option:selected").text() == 'select')
            {
                 var count_val = false;
                
                $('#categoryquestansadd input[id="textval"]').each(function(){                        
                    if($(this).val() != ''){count_val = true; }                       
                             
                 });                     
                 if(count_val == false)
                  {
                    $("#errormsg").addClass('errormsg').html("Please Enter option value");
        			$("#field_type").focus();
        			return false
                  }
            }
	}
// get the radio button value
function getRadioValue(id,optval){
	$("#val"+id).val(optval);
	//alert(optval);
}	
//get the check box value
function getCheckValue(id){	
	var check_val = $('#'+id+ ' input:checkbox:checked').map(function () {
		  return this.value;
		}).get();
	$("#val"+id).val(check_val);
}
//add new projects 
function addNewProject()
    {
		var userid			=   $.trim($("#homeownerid").val());
		var projecttitle	=   $.trim($("#projecttitle").val());
		var jobmain		    =	$.trim($("#jobmain").val());
		var categoryid		=	$.trim($("#jobcategory").val());
		var payper_leadprice=	$.trim($("#payper_leadprice").val());
		var jobdescrpt		=	$.trim($("#job_descpt").val());
        var apro_status	    =	$.trim($("#sel_aprostatus").val());
        var completion_time	=	$.trim($("#sel_completion").val());
        var address     	=	$.trim($("#address").val());
        var location        =   $.trim($("#location").val());    
		
		if(userid == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter HomeOwner Email id");
			$("#homeownerid").focus();
			return false;
		}if(userid != ''){
    		  if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(userid))){
                $("#errormsg").addClass('errormsg').html("Please Enter valid Email id");
    			$("#homeownerid").focus();
    			return false;
    		  }
		}
		if(projecttitle == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Project title");
			$("#projecttitle").focus();
			return false;
		}
		if(jobmain == ''){
			$("#errormsg").addClass('errormsg').html("Please Select the Main Category");
			$("#jobmain").focus();
			return false;
		}
		if(categoryid == ''){
			$("#errormsg").addClass('errormsg').html("Please Select the Category Name");
			$("#jobcategory").focus();
			return false;
		}
        
        var qus_div_id = $('#formfielddiv div').map(function () {
		  return this.id;
		}).get();	
		
		for(i=0;i<qus_div_id.length;i++){
			
			if($('#req'+qus_div_id[i]).val() != '' && $('#req'+qus_div_id[i]).val() != 'undefined')
			{
				if($('#val'+qus_div_id[i]).val() == ''){
						$("#errormsg").addClass('errormsg').html("Answer required for category questions");						
						return false;						
					}	
			}
		}
        	
		if(payper_leadprice == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Payper lead price");
			$("#payper_leadprice").focus();
			return false;
		}if(isNaN(payper_leadprice) || payper_leadprice<0)
        {   $("#errormsg").addClass('errormsg').html("Please Enter the Valid Payper Lead price");
			$("#payper_leadprice").focus();
			return false;
        }
        
		if(jobdescrpt == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Project description");
			$("#job_descpt").focus();
			return false;
		}
        if(apro_status == ''){
			$("#errormsg").addClass('errormsg').html("Please Select the Appropriate Status");
			$("#sel_aprostatus").focus();
			return false;
		}
        if(completion_time == ''){
			$("#errormsg").addClass('errormsg').html("Please Select the Request Completion Time Frame ");
			$("#sel_completion").focus();
			return false;
		}
       	if(address == '')
       	{
			$("#errormsg").addClass('errormsg').html("Please Enter your address");
			$("#address").focus();
			return false;
		}
		if(location == '')
       	{
			$("#errormsg").addClass('errormsg').html("Please Enter your State/ City/ Zipcode");
			$("#location").focus();
			return false;
		}
    
	}
//***************************************************************************************************************************	
	//post project edit validation
	function editProject(){
	    var projecttitle 	   =	$.trim($("#projecttitle").val());
	    var payper_leadprice   =	$.trim($("#payper_leadprice").val());
		var jobdescipt	       =	$.trim($("#job_descpt").val());
        var apro_status	       =	$.trim($("#sel_aprostatus").val());
        var completion_time	   =	$.trim($("#sel_completion").val());
		
		if(projecttitle == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Project title");
			$("#projecttitle").focus();
			return false;
		}
		if(payper_leadprice == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the PayPer lead price");
			$("#payper_leadprice").focus();
			return false;
		}
		if(isNaN(payper_leadprice) || payper_leadprice<0)
        {   $("#errormsg").addClass('errormsg').html("Please Enter the valid Payper Lead price");
			$("#payper_leadprice").focus();
			return false;
        }
        
        if(jobdescipt == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Project description");
			$("#job_descpt").focus();
			return false;
		}
         if(apro_status == ''){
			$("#errormsg").addClass('errormsg').html("Please Select the Appropriate Status");
			$("#sel_aprostatus").focus();
			return false;
		}
        if(completion_time == ''){
			$("#errormsg").addClass('errormsg').html("Please Select the Request Completion Time Frame ");
			$("#sel_completion").focus();
			return false;
		}
        
	}
 //***************************************************************************************************************************
    //Lead Edit in admin side
    function validateLeadPrice()
    {
        var payper_price = $.trim($("#payper_price").val());
        
        if(payper_price == '')
        {
            $("#error").addClass('errormsg').html("Please Enter the PayPer Lead Price");
			$("#payper_price").focus();
			return false;
            
        }else{
            $("#error").removeClass('errormsg').html("");
        }
        if(isNaN(payper_price) || (payper_price < 0))
        {
            $("#error").addClass('errormsg').html("PayPer Lead Price value Should be valid");
			$("#payper_price").focus();
			return false;
        }else{
            $("#error").removeClass('errormsg').html("");
        }
       
    }
//***************************************************************************************************************************
//--------------------------------------- MainCategory -----------------------------------------------
	//add main main catogry name
	function addMainCategory()
	{
	   //alert("hi");
		var new_catename          = $.trim($("#maincatename").val());
        var payper_lead_price     = $.trim($("#payper_lead_price").val());
       
        
        if(new_catename == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Main Category Name");
			$("#maincatename").focus();
			return false;		
		}
       if(payper_lead_price == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Pay Per Lead Price");
			$("#payper_lead_price").focus();
			return false;		
		}
        if((isNaN(payper_lead_price)) || (payper_lead_price<0)){
			$("#errormsg").addClass('errormsg').html("Please Enter the Valid Pay Per Lead Price ");
			$("#payper_lead_price").focus();
			return false;		
		}
        
       
         if(new_catename != ''){
			$.post('adminAjaxFile.php',{"new_catename":new_catename,"payper_lead_price":payper_lead_price,"action":"checkNewCateName"},function(response){
			//alert(response);
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("Main Category Name Already Exist");
					$("#maincatename").focus();
					return false;
				}else if(response == "insert"){
					window.location.href = "categoryManage.php";
					return false;
				}
				else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
		}
		return false;
	
	}
	
	//Edit maincategory
	function editMainCategory()
	{
		var catename              = $.trim($("#maincatename").val());
        var payper_lead_price     = $.trim($("#payper_lead_price").val());
        
		var eid                   = $("#eid").val();
		
		if(catename == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Main Category Name");
			$("#maincatename").focus();
			return false;		
		}
        if(payper_lead_price == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Pay Per Lead Price");
			$("#payper_lead_price").focus();
			return false;		
		}
        if((isNaN(payper_lead_price)) || (payper_lead_price<0)){
			$("#errormsg").addClass('errormsg').html("Please Enter the Valid Pay Per Lead Price ");
			$("#payper_lead_price").focus();
			return false;		
		}
        
       
         if(catename != ''){
			
			$.post('adminAjaxFile.php',{"catename":catename,"eid":eid,"payper_lead_price":payper_lead_price,"action":"checkEditCateName"},function(response){
			//alert(response);
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("Main Category Name Already Exist");
					$("#maincatename").focus();
					return false;
				}else if(response == "update"){
					window.location.href = "categoryManage.php";
					return false;
				}
				else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
		}
	}
//**************************************************Package************************************************************************
function addNewPackage(){
		
		var packagename	=	$.trim($('#packagename').val());
		var leadspermon	=	$.trim($('#leadspermonth').val());
		var packageamt	=	$.trim($('#packageamount').val());
		var packagedesc	=	$.trim($('#package_desc').val());
		
		if(packagename == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Package Name");
			$("#packagename").focus();
			return false;
		}
		if(leadspermon == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter No Of Leads");
			$("#leadspermonth").focus();
			return false;
		}
		else if(isNaN(leadspermon) || leadspermon<0){
			$("#errormsg").addClass('errormsg').html("Please enter Valid No of Leads");
			$("#leadspermonth").focus();			
			return false;
		}	
		if(packageamt == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Package Amount");
			$("#packageamount").focus();
			return false;
		}
        else if(isNaN(packageamt) || packageamt < 0 ){
			$("#errormsg").addClass('errormsg').html("Please Enter Valid Package Amount");
			$("#packageamount").focus();
			return false;
		}
		if(packagedesc == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Package Description");
			$("#package_desc").focus();
			return false;
		}		
		if(packagename != ''){
		
			$.post('adminAjaxFile.php',{"packagename":packagename,'leadspermon':leadspermon,'packageamt':packageamt,'packagedesc':packagedesc,"action":"checkAddPackage"},function(response){
			//alert(response);
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("Package Name Already Exist");
					$("#packagename").focus();
					return false;
				}else if(response == "insert"){
					window.location.href = "packageManage.php";
					return false;
				}
				else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
		}
	}
    //*******************************************************************************************************************************	
	//Edit package 
	function editPackage(){
		var packagename	=	$.trim($('#packagename').val());
		var leadspermon	=	$.trim($('#leadspermonth').val());
		var packageamt	=	$.trim($('#packageamount').val());
		var packagedesc	=	$.trim($('#package_desc').val());
		var packageid	=	$.trim($('#pckid').val());
		
		if(packagename == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Package Name");
			$("#packagename").focus();
			return false;
		}
		if(leadspermon == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter No Of Leads");
			$("#leadspermonth").focus();
			return false;
		}
		else if(isNaN(leadspermon) || leadspermon < 0){
			$("#errormsg").addClass('errormsg').html("Please Enter Valid No Of Leads");
			$("#leadspermonth").focus();			
			return false;
		}	
		if(packageamt == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Package Amount");
			$("#packageamount").focus();
			return false;
		}
        else if(isNaN(packageamt) || (packageamt < 0)) {
			$("#errormsg").addClass('errormsg').html("Please Enter the Package Amount");
			$("#packageamount").focus();
			return false;
		}
		if(packagedesc == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Package Description");
			$("#package_desc").focus();
			return false;
		}		
		if(packagename != ''){
		
			$.post('adminAjaxFile.php',{"packagename":packagename,'leadspermon':leadspermon,'packageamt':packageamt,'packagedesc':packagedesc,'packageid':packageid,"action":"checkEditPackage"},function(response){
			//alert(response);
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("Package Name Already Exist");
					$("#packagename").focus();
					return false;
				}else if(response == "update"){
					window.location.href = "packageManage.php";
					return false;
				}
				else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
		}
	}
 //*****************************************************************************************************************************************
//ADd and Edit package in admin side.
function addEditPackage()
{
    	var pack_name  = $.trim($('#pack_name').val());
		var pack_price = $.trim($('#pack_price').val());
	//	var followers_url  = $.trim($('#followers_url').val());	
        if(pack_name == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter Package name");
			$("#pack_name").focus();
			return false;
		}
        if(pack_price == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Package price");
			$("#pack_price").focus();
			return false;
		}
        if(isNaN(pack_price)){
			$("#errormsg").addClass('errormsg').html("Please Enter the valid Package price");
			$("#pack_price").focus();
			return false;
		}
}
//--------------------------------------- Followers  -----------------------------------------------
	//Add New cuisine
	function addNewfollowers(){
		
		var followers_name  = $.trim($('#followers_name').val());
		var followers_logo = $.trim($('#followers_logo').val());
		var followers_url  = $.trim($('#followers_url').val());	
	    //var regUrl         = /^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,3}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/;
		
        if(followers_name == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Follower Name");
			$("#followers_name").focus();
			return false;
		}
		
        if(followers_logo == ''){
            $("#errormsg").addClass('errormsg').html("Please Select the Logo (gif,jpg,jpeg)");
			$("#followers_logo").focus();
			return false;
        }
		if(followers_logo != ''){	
			var ext = $('#followers_logo').val().split('.').pop().toLowerCase();
			
			if($.inArray(ext, ['gif','jpg','jpeg','png']) == -1){
				$("#errormsg").addClass('errormsg').html("Please Select the Valid Photo Format (gif,jpg,jpeg)");
					$("#followers_logo").focus();
					return false;
			}				
		}
		
		if(followers_url == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Follower Url");
			$("#followers_url").focus();
			return false;
		}
        
        if(followers_url != ''){
            if (!(/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,3}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/.test(followers_url)) || ((followers_url.indexOf('http://') == -1) && (followers_url.indexOf('https://') == -1))){
                $("#errormsg").addClass('errormsg').html("Please Enter the Valid Follower Url(Ex:http://www.domainname.com)");
                $("#followers_url").focus();
                return false;
            }
        }
        
        if(followers_name != '' && followers_url != ''){
            $.post('adminAjaxFile.php',{"followers_name":followers_name, "followers_url":followers_url, "action":"checkFollowers"},function(response){
			//alert(response);
			if(response == "name")
			{
			    $("#errormsg").addClass('errormsg').html("This Follower Name is Already Exist");
                $("#followers_name").focus();
                return false;
			}else if(response == "url"){
			    $("#errormsg").addClass('errormsg').html("This Follower URL is Already Exist");
                $("#followers_url").focus();
                return false;
			}
            else if(response == "suc"){
                document.addNewCuisine.submit();
			}
			else
			{
				$("#errormsg").html('');
			}
		  });
		  return false; 
        }
	
	}
	//Edit cuisine name
	function editFollowersName(){
		
		var followers_name  = $.trim($('#followers_name').val());
		var followers_logo = $.trim($('#followers_logo').val());
		var followers_url  = $.trim($('#followers_url').val());	
		var cusid         = $.trim($('#cusid').val());	
		
		
		if(followers_name == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Follower Name");
			$("#followers_name").focus();
			return false;
		}
		
		if(followers_logo != ''){	
			var ext = $('#followers_logo').val().split('.').pop().toLowerCase();
			
			if($.inArray(ext, ['gif','jpg','jpeg','png']) == -1){
				$("#errormsg").addClass('errormsg').html("Please Select the Valid Photo Format (gif,jpg,jpeg)");
					$("#followers_logo").focus();
					return false;
			}				
		}
		
		if(followers_url == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Follower Url");
			$("#followers_url").focus();
			return false;
		}
        if(followers_url != ''){
            if (!(/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,3}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/.test(followers_url)) || ((followers_url.indexOf('http://') == -1) && (followers_url.indexOf('https://') == -1)))
            {
                $("#errormsg").addClass('errormsg').html("Please Enter the Valid Follower Url(Ex:http://www.domainname.com)");
                $("#followers_url").focus();
                return false;
            }
        }
        if(followers_name != '' && followers_url != ''){
            $.post('adminAjaxFile.php',{"followers_name":followers_name, "followers_url":followers_url,"id":cusid, "action":"checkFollowers"},function(response){
			//alert(response);
			if(response == "name")
			{
			    $("#errormsg").addClass('errormsg').html("This Follower Name is Already Exist");
                $("#followers_name").focus();
                return false;
			}else if(response == "url"){
			    $("#errormsg").addClass('errormsg').html("This Follower URL is Already Exist");
                $("#followers_url").focus();
                return false;
			}
            else if(response == "suc"){
			    document.addNewCuisine.submit();
			}
			else
			{
				$("#errormsg").html('');
			}
		  });
		  return false; 
        }
		
	}
    
 //--------------------------------------Review---------------------------------------------
 
 //Edit Review
 function editReviews(){
    
    var rating      = $("#rating").val();
    var rating_desc = $("#rating_desc").val();
    
    if(rating == ''){       
            $("#errormsg").addClass('errormsg').html("Please select the Rating");
			$("#rating").focus();
			return false;
    }
    if(rating_desc == ''){       
            $("#errormsg").addClass('errormsg').html("Please enter the Description");
			$("#rating_desc").focus();
			return false;
    }
 }
//--------------------------------------- FAQ -----------------------------------------------
	//addNewFaqManage  Validation
	function addNewfaqManage()
	{	
		$("#errormsg").removeClass('successmsg');
		
		var question   	= $.trim($("#question").val());
        var title  	    = $.trim($("#site_metatag_title").val());
        var keyword   	= $.trim($("#site_metatag_keyword").val());
        var description = $.trim($("#site_metatag_desc").val());
			
        if(title == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter the Meta tag Title");
			$("#site_metatag_title").focus();
			return false;
		}
        if(keyword == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter the Meta tag Keyword");
			$("#site_metatag_keyword").focus();
			return false;
		}
        if(description == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter the Meta tag Description");
			$("#site_metatag_desc").focus();
			return false;
		}
        if(question == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter the Question");
			$("#question").focus();
			return false;
		}
			
		/*else if(answer == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter answer");
			$("#answer").focus();
			return false;
		}
		
	   	else
		{
			$.post('adminAjaxFile.php',{"question":question, "answer":answer, "action":"addFaqManage"},function(response){
					
			if(response == "insert")
			{
				$("#errormsg").removeClass('errormsg');
				$("#errormsg").addClass('successmsg').html("Question and answer insert successfully");
				return false;
			}
			else
			{
				$("#errormsg").html('');
			}
			
		  });
		  return false; 
		}*/
	}
	//---------------------------------------------------------------------------------
	//editFaqManage  Validation............
	function editfaqManage()
	{	
		$("#errormsg").removeClass('successmsg');
	
		var question   	= $.trim($("#question").val());
	
		var title  	    = $.trim($("#site_metatag_title").val());
        var keyword   	= $.trim($("#site_metatag_keyword").val());
        var description = $.trim($("#site_metatag_desc").val());
			
        if(title == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter the Meta tag Title");
			$("#site_metatag_title").focus();
			return false;
		}
        if(keyword == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter the Meta tag Keyword");
			$("#site_metatag_keyword").focus();
			return false;
		}
        if(description == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter the Meta tag Description");
			$("#site_metatag_desc").focus();
			return false;
		}	
		if(question == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter question");
			$("#question").focus();
			return false;
		}
			
		/*else if(answer == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter answer");
			$("#answer").focus();
			return false;
		}
		
	   	else
		{
			$.post('adminAjaxFile.php',{"question":question, "answer":answer, "faq_id":faq_id, "action":"updateFaqManage"},function(response){
			
			if(response == "update")
			{
				window.location.href = "faqManage.php";
			}
			else
			{
				$("#errormsg").html('');
			}
		  });
		  return false; 
		}*/	
	}
//--------------------------------------- Content -----------------------------------------------
	/*Add new content
	function addNewContent(){
		var title   			= $.trim($("#title").val());
		//var content   			= $.trim($("#content").val());
		var Metatagtitle   		= $.trim($("#mettitle").val());
		var Metatagdescription	= $.trim($("#metdes").val());
		var Metatagkeyword   	= $.trim($("#metkey").val());
		
		if(title == ''){
			$("#errormsg").addClass('errormsg').html("Please enter Title");
			$("#title").focus();
			return false;
		}
		if(Metatagtitle == ''){
			$("#errormsg").addClass('errormsg').html("Please enter Metatag Title");
			$("#mettitle").focus();
			return false;
		}
		if(Metatagdescription == ''){
			$("#errormsg").addClass('errormsg').html("Please enter Metatag Description");
			$("#metdes").focus();
			return false;
		}
		if(Metatagkeyword == ''){
			$("#errormsg").addClass('errormsg').html("Please enter MetatagKeyword");
			$("#metkey").focus();
			return false;
		}
		/*
		if(content == ''){
			$("#errormsg").addClass('errormsg').html("Please enter Content");
			$("#content").focus();
			return false;
		}*/
		/*if(title != ''){		
			$.post('adminAjaxFile.php',{"title":title,"content":content,"Metatagtitle":Metatagtitle,"Metatagdescription":Metatagdescription,"Metatagkeyword":Metatagkeyword,"action":"checkContentAdd"},function(response){
			//alert(response);
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("Content Title Already Exist");
					$("#addons_name").focus();
					return false;
				}else if(response == "insert"){
					window.location.href = "contentManage.php";
					return false;
				}else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
		}
	}
	
	//Edit content
	function editContent(){
		
		var title   			= $.trim($("#title").val());
		//var content   			= $.trim($("#content").val());
		var Metatagtitle   		= $.trim($("#mettitle").val());
		var Metatagdescription	= $.trim($("#metdes").val());
		var Metatagkeyword   	= $.trim($("#metkey").val());
		var conid				= $.trim($("#conid").val());
		
		if(title == ''){
			$("#errormsg").addClass('errormsg').html("Please enter Title");
			$("#title").focus();
			return false;
		}
		if(Metatagtitle == ''){
			$("#errormsg").addClass('errormsg').html("Please enter Metatag Title");
			$("#mettitle").focus();
			return false;
		}
		if(Metatagdescription == ''){
			$("#errormsg").addClass('errormsg').html("Please enter Metatag Description");
			$("#metdes").focus();
			return false;
		}
		if(Metatagkeyword == ''){
			$("#errormsg").addClass('errormsg').html("Please enter MetatagKeyword");
			$("#metkey").focus();
			return false;
		}
		/*
		if(content == ''){
			$("#errormsg").addClass('errormsg').html("Please enter Content");
			$("#content").focus();
			return false;
		}
		if(title != ''){		
			$.post('adminAjaxFile.php',{"title":title,"content":content,"Metatagtitle":Metatagtitle,"Metatagdescription":Metatagdescription,"Metatagkeyword":Metatagkeyword,"conid":conid,"action":"checkContentEdit"},function(response){
			//alert(response);
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("Content Title Already Exist");
					$("#addons_name").focus();
					return false;
				}else if(response == "update"){
					window.location.href = "contentManage.php";
					return false;
				}else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
		}
		
	} */
//-------------------------------------------------------------------------------------------------
//Template add
    function addNewTemplate(){
        var subject	    = $.trim($("#subject").val());
		var template   	= $.trim($("#template").val());
        if(subject == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Subject");
			$("#subject").focus();
			return false;
		}else{
		  $("#errormsg").addClass('errormsg').html("");
		}
        if(template == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Template");
			$("#template").focus();
			return false;
		}else{
		  $("#errormsg").addClass('errormsg').html("");
		}
    }
//--------------------------------------- State -----------------------------------------------
	//Add new state
	function addNewState()
	{
		var statecode   = $.trim($("#statecode").val());
		var statename   = $.trim($("#statename").val());
		var letters     = /^[A-Za-z]+$/;
		var nameRegex 	= /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
		
		if(statecode == ''){
			$("#errormsg").addClass('errormsg').html("Please enter the state code");
			$("#statecode").focus();
			return false;
		}				
		if(!(statecode.match(letters))){
			$("#errormsg").addClass('errormsg').html("State code must be alphabates");
			$("#statecode").focus();
			return false;
		}
				
		if(statename == ''){
			$("#errormsg").addClass('errormsg').html("Please enter the state name");
			$("#statename").focus();
			return false;
		}
		else if(!statename.match(nameRegex)) {
			$("#errormsg").addClass('errormsg').html("State name must be alphabates");
			$("#statename").focus();
			return false;
		}
		/*if(!(statename.match(letters))){
			$("#errormsg").addClass('errormsg').html("State Name must be Alphabates");
			$("#statename").focus();
			return false;
		}*/	
		if(statecode != '' && statename != ''){		
			$.post('adminAjaxFile.php',{"statecode":statecode,"statename":statename,"action":"checkAddStateName"},function(response){			
				//alert(response);
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("StateCode and StateName Already Exist");
					$("#statecode").focus();
					return false;
				}else if(response == "insert"){
					window.location.href = "stateManage.php";
					return false;
				}else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
			}
	}
	//Edit state
	function editState(){
		
		var statecode   = $.trim($("#statecode").val());
		var statename   = $.trim($("#statename").val());
		var stateid     = $.trim($("#stateid").val());
		var letters     = /^[A-Za-z]+$/;	
		var nameRegex 	= /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
		
		if(statecode == ''){
			$("#errormsg").addClass('errormsg').html("Please enter the state code");
			$("#statecode").focus();
			return false;
		}				
		if(!(statecode.match(letters))){
			$("#errormsg").addClass('errormsg').html("State code must be alphabates");
			$("#statecode").focus();
			return false;
		}			
		if(statename == ''){
			$("#errormsg").addClass('errormsg').html("Please enter the state name");
			$("#statename").focus();
			return false;
		}
		else if(!statename.match(nameRegex)) {
			$("#errormsg").addClass('errormsg').html("State name must be alphabates");
			$("#statename").focus();
			return false;
		}
		/*if(!(statename.match(letters))){
			$("#errormsg").addClass('errormsg').html("State Name must be Alphabates");
			$("#statename").focus();
			return false;
		}*/
		if(statecode != '' && statename != ''){		
			$.post('adminAjaxFile.php',{"statecode":statecode,"statename":statename,"stateid":stateid,"action":"checkEditStateName"},function(response){						//	alert(response);
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("StateCode and StateName Already Exist");
					$("#statecode").focus();
					return false;
				}else if(response == "update"){
					window.location.href = "stateManage.php";
					return false;
				}else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
			}
	}
//--------------------------------------- City -----------------------------------------------
	//Add new City
	function addNewCityValidate()
	{
		var statename   = $.trim($("#statename").val());
		var cityname    = $.trim($("#cityname").val());
		var letters     = /^[A-Za-z]+$/;
		var nameRegex 	= /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
		
		var stecode  = $("#stecode").val();
		
		if(stecode == ''){
			if(statename == ''){
				$("#errormsg").addClass('errormsg').html("Please enter the state Name");
				$("#statename").focus();
				return false;
			}
			else if(!statename.match(nameRegex)) {
				$("#errormsg").addClass('errormsg').html("State name must be alphabates");
				$("#statename").focus();
				return false;
			}	
		}
		if(cityname == ''){
			$("#errormsg").addClass('errormsg').html("Please enter the city Name");
			$("#cityname").focus();
			return false;
		}
		else if(!cityname.match(nameRegex)) {
			$("#errormsg").addClass('errormsg').html("City name must be alphabates");
			$("#cityname").focus();
			return false;
		}
		
		if(cityname != ''){		
			$.post('adminAjaxFile.php',{"statename":statename,"cityname":cityname,"stecode":stecode,"action":"checkAddCityName"},function(response){			
				//alert(response);
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("City Name Already Exist");
					$("#cityname").focus();
					return false;
				}else if(response == "insert"){
					if(stecode != ''){
						window.location.href = "cityManage.php?sc="+stecode;
					}else{
						window.location.href = "cityManage.php";
					}
					return false;
				}else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
		}
	}
	//Edit City
	function editCityValidate(){
		
		var statename   = $.trim($("#statename").val());
		var cityname    = $.trim($("#cityname").val());
		var letters     = /^[A-Za-z]+$/;
		var nameRegex 	= /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
		
		var cityid   = $("#cityid").val();
		var stecode  = $("#stecode").val();
		
		if(stecode == ''){
			if(statename == ''){
				$("#errormsg").addClass('errormsg').html("Please enter the state name");
				$("#statename").focus();
				return false;
			}
			else if(!statename.match(nameRegex)) {
				$("#errormsg").addClass('errormsg').html("State name must be alphabates");
				$("#statename").focus();
				return false;
			}	
		}
		
		if(cityname == ''){
			$("#errormsg").addClass('errormsg').html("Please enter the city name");
			$("#cityname").focus();
			return false;
		}
		else if(!cityname.match(nameRegex)) {
			$("#errormsg").addClass('errormsg').html("City name must be alphabates");
			$("#cityname").focus();
			return false;
		}
		
		if(cityname != ''){		
			$.post('adminAjaxFile.php',{"statename":statename,"cityname":cityname,"cityid":cityid,"stecode":stecode,"action":"checkEditCityName"},function(response){	
				//alert(response);	
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("CityName Already Exist");
					$("#cityname").focus();
					return false;
				}else if(response == "update"){
					if(stecode != ''){
						window.location.href = "cityManage.php?sc="+stecode;
					}else{
						window.location.href = "cityManage.php";
					}
					return false;
				}else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
		}
	}
//--------------------------------------- Zip code -----------------------------------------------
	//Add new zipcode
	function addNewZipcode(){
		
		var statename  = $.trim($("#state").val());
		var cityname   = $.trim($("#city").val());
		var zipcode    = $.trim($("#zipcode").val());		
		var numbers    = /^[0-9]+$/;  
		var letters    = /^[A-Za-z]+$/;	
		var nameRegex  = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
		
		if(statename == ''){		
			$("#errormsg").addClass('errormsg').html("Please enter the State Name");
			$("#state").focus();
			return false;			
		}
		else if(!statename.match(nameRegex)) {
			$("#errormsg").addClass('errormsg').html("State Name must be alphabates");
			$("#state").focus();
			return false;
		}		
		if(cityname == ''){
			$("#errormsg").addClass('errormsg').html("Please enter the City Code");
			$("#city").focus();
			return false;
		}
		/*else if(!cityname.match(nameRegex)) {
			$("#errormsg").addClass('errormsg').html("City name must be alphabates");
			$("#city").focus();
			return false;
		}*/	
        if(isNaN(cityname)){
			$("#errormsg").addClass('errormsg').html("City code must be numeric");
			$("#cityname").focus();
			return false;
		} 	
		if(zipcode == ''){		
			$("#errormsg").addClass('errormsg').html("Please enter the zipcode");
			$("#zipcode").focus();
			return false;			
		}
		if(isNaN(zipcode)){
			$("#errormsg").addClass('errormsg').html("Zipcode must be numeric");
			$("#zipcode").focus();
			return false;
		} 		
		
		if(zipcode != '' && statename != '' && cityname != ''){		
			$.post('adminAjaxFile.php',{"statename":statename,"cityname":cityname,"zipcode":zipcode,"action":"checkAddZipcode"},function(response){				
				//alert(response);		
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("Zipcode for City and State Already Exist");
					$("#state").focus();
					return false;
				}else if(response == "insert"){					
						window.location.href = "zipcodeManage.php";
						return false;					
				}else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
			}
	}
	//Edit zipcode
	function editZipcode(){
		
		var statename  = $.trim($("#state").val());
		var cityname   = $.trim($("#city").val());
		var zipcode    = $.trim($("#zipcode").val());		
		var numbers    = /^[0-9]+$/;  
		var letters    = /^[A-Za-z]+$/;	
		var nameRegex  = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
		
		var zipid = $("#zipid").val();
		
		if(statename == ''){		
			$("#errormsg").addClass('errormsg').html("Please enter the State Name");
			$("#state").focus();
			return false;			
		}
		else if(!statename.match(nameRegex)) {
			$("#errormsg").addClass('errormsg').html("State Name must be alphabates");
			$("#state").focus();
			return false;
		}		
		if(cityname == ''){
			$("#errormsg").addClass('errormsg').html("Please enter the City name");
			$("#city").focus();
			return false;
		}
        if(isNaN(cityname)){
			$("#errormsg").addClass('errormsg').html("City code must be numeric");
			$("#cityname").focus();
			return false;
		} 
		/*else if(!cityname.match(nameRegex)) {
			$("#errormsg").addClass('errormsg').html("City name must be alphabates");
			$("#city").focus();
			return false;
		}*/	
        	
		if(zipcode == ''){		
			$("#errormsg").addClass('errormsg').html("Please enter the zipcode");
			$("#zipcode").focus();
			return false;			
		}
		if(isNaN(zipcode)){
			$("#errormsg").addClass('errormsg').html("Zipcode must be numeric");
			$("#zipcode").focus();
			return false;
		} 		
		
		if(zipcode != '' && statename != '' && cityname != '' ){	
			$.post('adminAjaxFile.php',{"statename":statename,"cityname":cityname,"zipcode":zipcode,"zipid":zipid,"action":"checkEditZipcode"},function(response){		
				//alert(response);	
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("Zipcode for City and State Already Exist");
					$("#state").focus();
					return false;
				}else if(response == "update"){					
					window.location.href = "zipcodeManage.php";					
					return false;
				}else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
		}
	}

//------------------------------------------------------------------------------------------------------
//---------------------Admin site user add- Edit-------------------------------------------------------
//Add and Edit  user
function addEditHomeowner(){
	var firstname		= $.trim($("#firstname").val());
	var lastname 		= $.trim($("#lastname").val()); 
    var location        = $.trim($("#location").val());
	var mobile   		= $.trim($("#mobile").val());
	var address 		= $.trim($("#address").val());
	var emailid			= $.trim($("#user_emailid").val());
	var password		= $.trim($("#user_pwd").val());	
	var userid			= $.trim($("#homeownid").val());	

	if(firstname == ''){
		$("#errormsg").addClass('errormsg').html("Please enter the First Name");
		$("#firstname").focus();
		return false;
	}
	if(lastname == ''){
		$("#errormsg").addClass('errormsg').html("Please enter the Last Name");
		$("#lastname").focus();
		return false;
	}
    
	if(mobile == ''){
		$("#errormsg").addClass('errormsg').html("Please enter the Mobile No");
		$("#mobile").focus();
		return false;
	}
	if(address == ''){
		$("#errormsg").addClass('errormsg').html("Please enter the Address");
		$("#address1").focus();
		return false;
	}
	if(location == ''){
		$("#errormsg").addClass('errormsg').html("Please select location");
		$("#location").focus();
		return false;
	}
	if(emailid == ''){
		$("#errormsg").addClass('errormsg').html("Please enter the Email Id");
		$("#user_emailid").focus();
		return false;
	}
	if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailid))){
	   	$("#errormsg").addClass('errormsg').html("Please enter the Valid Email Id");
		$("#user_emailid").focus();
		return false;
    }
    if(userid == ''){
    	if(password == ''){
			$("#errormsg").addClass('errormsg').html("Please enter the password");
			$("#user_pwd").focus();
			return false;
		}
		if(password.length<8){
			$("#errormsg").addClass('errormsg').html("Password length should be min 8 character");
			$("#user_pwd").focus();
			return false;
		}
    }
	
	
	if(emailid != '' ){
		$.post('adminAjaxFile.php',{'email':emailid,'userid':userid,'action':'userAddEditValidation'},function(data){
				// alert(data);//return false;
				if(data == 'exist'){
					$("#errormsg").addClass('errormsg').html("This Email Id Already Exist");
					$("#user_emailid").focus();
					return false;			
				}
				else if(data == 'exist1'){
					$("#errormsg").addClass('errormsg').html("This Public User Name Already Exist");
					$("#publicname").focus();
					return false;
				}else if(data != ''){
					$("#errormsg").addClass('errormsg').html(data);
					return false;
				}
				else if(data == ''){
					document.homeowner.submit();
				}			
			});
			return false;
	}
}

function addEditReference(){
    
    var contractorid    = $("#contractorid").val();
    var ref_cusname		= $("#trad_cusname").val();
	var ref_cusemail	= $("#trad_cusemail").val();
	var ref_cusphone	= $("#trad_cusphone").val();
	var ref_cusaltphone	= $("#trad_cusaltphone").val();
	var ref_custrade	= $("#trad_cusbest").val();
	var ref_workdesc	= $("#trad_cusworkdesc").val();
	var ref_workcaryout	= $("#trad_cusworkcarry").val();
    var userid          = $("#userid").val();
    
   
        if(contractorid == ''){	
		$("#errormsg").addClass('errormsg').html("Please Enter the Contractor Mail id");
		$("#contractorid").focus();
		return false;
	   }
       if(contractorid != ''){	
           if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(contractorid))){
            $("#errormsg").addClass('errormsg').html("Please Enter the valid Mail id");
    		$("#contractorid").focus();
    		return false;
           }
	   }
    
    
    if(ref_cusname == ''){	
		$("#errormsg").addClass('errormsg').html("Please Enter the Reference Customer Name");
		$("#trad_cusname").focus();
		return false;
	}if(ref_cusemail == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Reference Customer Email");
		$("#trad_cusemail").focus();
		return false;
	}
	if(ref_cusemail != ''){
		if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(ref_cusemail))){
		   	$("#errormsg").addClass('errormsg').html("Please Enter the Valid Reference Customer Email");
			$("#trad_cusemail").focus();
			return false;
	    }
	}    
	if(ref_cusphone == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Reference Customer phone");
		$("#trad_cusphone").focus();
		return false;
	} 
	if(ref_custrade == ''){
		$("#errormsg").addClass('errormsg').html("Please Select the Customer Trade");
		$("#trad_cusbest").focus();
		return false;
	}
	if(ref_workdesc == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Reference Work Description");
		$("#trad_cusworkdesc").focus();
		return false;
	}
	if(ref_workcaryout == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter when the Reference Carried Out");
		$("#trad_cusworkcarry").focus();
		return false;
	}

    if(ref_cusemail != ''){
		$.post('adminAjaxFile.php',{'email':ref_cusemail,'action':'referenceUserAddValidation'},function(data){
				//alert(data);
				if(data == 'already'){
					$("#errormsg").addClass('errormsg').html("This User mail id Already in justmail.Please give the Non Customer of user id");
					$("#user_emailid").focus();
					return false;			
				}
                else if(data == 'already_ref'){
                    $("#errormsg").addClass('errormsg').html("This User Already added in Reference List");
					$("#user_emailid").focus();
					return false;	
                }
				else{
					document.reference.submit();
				}			
			});
			return false;
	}

}

function editReference(){
    
    var contractorid    = $("#contractorid").val();
    var ref_cusname		= $("#trad_cusname").val();
	var ref_cusemail	= $("#trad_cusemail").val();
	var ref_cusphone	= $("#trad_cusphone").val();
	var ref_cusaltphone	= $("#trad_cusaltphone").val();
	var ref_custrade	= $("#trad_cusbest").val();
	var ref_workdesc	= $("#trad_cusworkdesc").val();
	var ref_workcaryout	= $("#trad_cusworkcarry").val();
    var userid          =$("#userid").val();
    var con_id          =$("#con_id").val();
    
    if(userid == '')
    { 
        if(contractorid == ''){	
		$("#errormsg").addClass('errormsg').html("Please Enter the Contractor Mail id");
		$("#contractorid").focus();
		return false;
	   }
       if(contractorid != ''){	
           if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(contractorid))){
            $("#errormsg").addClass('errormsg').html("Please Enter the valid Mail id");
    		$("#contractorid").focus();
    		return false;
           }
	   }
    }
    
    if(ref_cusname == ''){	
		$("#errormsg").addClass('errormsg').html("Please Enter the Reference Customer Name");
		$("#trad_cusname").focus();
		return false;
	}if(ref_cusemail == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Reference Customer Email");
		$("#trad_cusemail").focus();
		return false;
	}
	if(ref_cusemail != ''){
		if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(ref_cusemail))){
		   	$("#errormsg").addClass('errormsg').html("Please Enter the Valid Reference Customer Email");
			$("#trad_cusemail").focus();
			return false;
	    }
	}    
	if(ref_cusphone == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Reference Customer phone");
		$("#trad_cusphone").focus();
		return false;
	} 
	if(ref_custrade == ''){
		$("#errormsg").addClass('errormsg').html("Please Select the Customer Trade");
		$("#trad_cusbest").focus();
		return false;
	}
	if(ref_workdesc == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Reference Work Description");
		$("#trad_cusworkdesc").focus();
		return false;
	}
	if(ref_workcaryout == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter when the Reference Carried Out");
		$("#trad_cusworkcarry").focus();
		return false;
	}
    if(ref_cusemail != ''){
		$.post('adminAjaxFile.php',{'email':ref_cusemail,'con_id':con_id,'action':'referenceUserEditValidation'},function(data){
				//alert(data);
				if(data == 'already'){
					$("#errormsg").addClass('errormsg').html("This User mail id Already in justmail.Please give the Non Customer of user id");
					$("#user_emailid").focus();
					return false;			
				}
                else if(data == 'already_ref'){
                    $("#errormsg").addClass('errormsg').html("This User Already added in Reference List");
					$("#user_emailid").focus();
					return false;	
                }
				else{
					document.reference.submit();
				}			
			});
			return false;
	}
}

//Add new testmonial in admin side
function addEditTestimonial(){

    var userid      = $("#userid").val();
    var testimonial = $("#testimonial").val();
    var title  	    = $.trim($("#site_metatag_title").val());
    var keyword   	= $.trim($("#site_metatag_keyword").val());
    var description = $.trim($("#site_metatag_desc").val());

       if(title == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter the Meta tag Title");
			$("#site_metatag_title").focus();
			return false;
		}
        if(keyword == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter the Meta tag Keyword");
			$("#site_metatag_keyword").focus();
			return false;
		}
        if(description == '')
		{
			$("#errormsg").addClass('errormsg').html("Please enter the Meta tag Description");
			$("#site_metatag_desc").focus();
			return false;
		}
        if(userid == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter the User Email ID");
    		$("#userid").focus();
    		return false;
        }
        if(userid != ''){
       	    if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(userid))){
       	        $("#errormsg").addClass('errormsg').html("Please Enter Valid Email ID");
        		$("#userid").focus();
        		return false;
       	    }
            
        }
        if(testimonial == ''){
            $("#errormsg").addClass('errormsg').html("Please enter the Testimonial");
    		$("#testimonial").focus();
    		return false;
        }
}
//Delete Reference in trademen addEdit in admin side
function deleteReference(refid)
{
    //alert(refid);
    if(refid)
    {
      $.post('adminAjaxFile.php',{'action':'deletereference','refid':refid},function(data)
        {		
            //alert(data);
            if(data == 'suc')
                {
                    alert("your Reference Deleted Successfully");
                    window.location.reload();
    				return false;
                }
            else
                {
                    alert("Error");   
                    window.location.reload();                 
    				return false;
                }							
		});	 
    }
}
//--------------------------------------------------------------------------------------------------
//AJAX START----------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------
function getXMLHTTP() { //fuction to return the xml http object                                     
		var xmlhttp=false;	                                                                        
		try{                                                                                        
			xmlhttp=new XMLHttpRequest();                                                           
		}                                                                                           
		catch(e)	{		                                                                        
			try{			                                                                        
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");                                    
			}                                                                                       
			catch(e){                                                                               
				try{                                                                                
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");                                      
				}                                                                                   
				catch(e1){                                                                          
					xmlhttp=false;                                                                  
				}                                                                                   
			}                                                                                       
		}                                                                                                                                                         
		return xmlhttp;                                                                             
	}                                                                                               
var req = getXMLHTTP(); 

//Get Show Sub Addons
function showSubaddons(aid){
	
	req.onreadystatechange = function(){
		
    	if (req.readyState == 4){
		 	if (req.status == 200){
		 		//alert(req.responseText);
		    	document.getElementById('subaddonsList').innerHTML=req.responseText;
		 	}else {
	   	   		$.prompt("There was a problem while using XMLHTTP:\n" + req.statusText);
		 	}
      	}
	}
   	req.open("GET", "adminAjaxAction.php?aid="+aid+"&action=showSubaddonsList", true);
   	req.send(null);
}
//Get Show City
function getShowCityList(statecode){
	
	req.onreadystatechange = function(){
		
    	if (req.readyState == 4){
		 	if (req.status == 200){
		 		//alert(req.responseText);
		    	document.getElementById('showcityList').innerHTML=req.responseText;
		 	}else {
	   	   		$.prompt("There was a problem while using XMLHTTP:\n" + req.statusText);
		 	}
      	}
	}
   	req.open("GET", "adminAjaxAction.php?statecode="+statecode+"&action=showcityList", true);
   	req.send(null);
}
//--------------------------------------------------------------------------------------------------
//AJAX END------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------

$(document).ready(function(){ 
	
	$("#membtn").click(function(){
		document.memberinfo.submit();
	});
	
    //add the option field text field	
	$(".addformTxt").click(function(){
		$(".addformTxtInner").append('<div class="form-group"><label class="col-md-3 control-label">&nbsp;</label><div class="col-md-9"><div class="col-md-6 no-padding"><input type="text" name="option_name[]" class="form-control" id="textval"></div><span class="removeformTxt" title="Remove"></span></div></div>');
        
        $(".removeformTxt").click(function(){    	   
    		$(this).parent().parent().remove();
    	});
	});
    
    $(".removeformTxt").click(function(){	    
		$(this).parent().parent().remove();
	});
	
});	

//Remove the opton filed text field
/*function removesize(){
	$(".removeformTxt").click(function(){
	    //alert("hi");
		$(this).parent().remove();
	});
}*/
//------------------------------------------------------------------------------
//-----------------POP UP---------------------------------------------------
// view profile details
function viewProfileDetailsPopup(conid){	

        openPopup('#viewprofiledetails','#maska');
		
		if(conid != ''){			
			$.post('adminAjaxFile.php',{'conid':conid,'action':'profiledetails'},function(data){				
				//alert(data);			
				if(data != ''){
					var profdet = data.split("^^^");						
					$("#tradmename").text(profdet[0]);
					$("#profdesc").text(profdet[1]);
					$("#workdesc").text(profdet[2]);
					$("#qufydesc").text(profdet[3]);													
					return false;			
				}
				});
				return false;
	}	
		
}
//close membership popup
function closeViewProfilePopup(){
	$("#viewprofiledetails").hide();
	$("#maska").hide();
}
//------------------------------------------------------------------------------------------------------------
// view Insurance details
function viewInsuranceDetailsPopup(insid){	
        openPopup('#viewinsurancedet','#maska');
		
		if(insid != ''){			
			$.post('adminAjaxFile.php',{'insid':insid,'action':'viewinsurance'},function(data){				
				//alert(data);			
				if(data != ''){
					var profdet = data.split("^^^");						
					$("#heading").text(profdet[0]);
					$("#insuredname").text(profdet[1]);
					if(profdet[2] == ''){
					   $("#tradename").text("---------");
                    }
                    else{$("#tradename").text(profdet[2]);}
                    
					$("#insurer").text(profdet[3]);	
					$("#policyno").text(profdet[4]);
					$("#validfrom").text(profdet[5]);
					$("#validto").text(profdet[6]);
					$("#publicind").text(profdet[7]);
					$("#empindm").text(profdet[8]);												
					return false;			
				}
				});
				return false;
	}	
		
}
//close membership popup
function closeInsurancePopup(){
	$("#viewinsurancedet").hide();
	$("#maska").hide();
}
//------------------------------------------------------------------------------------------------------------
// view Reference details
function viewReferencePopup(refid)
{	
    //openPopup('#viewreferencedet','#maska');		
	$("#viewreferencedet").modal('show');
	if(refid != '')
        {			
    		$.post('adminAjaxFile.php',{'refid':refid,'action':'viewreference'},function(data){   					
    			if(data != '')
                    {
        				var profdet = data.split("^^^");						
        				$("#refheading").text(profdet[0]);
        				$("#refname").text(profdet[1]);
        				$("#refemail").text(profdet[2]);
        				$("#refphone").text(profdet[3]);	
        				if(profdet[4] == ''){
        				    $("#alterph").text("-------");
                        }
                        else{$("#alterph").text(profdet[4]);}
                        
        				$("#bestrade").text(profdet[5]);
        				$("#workdesc").text(profdet[6]);
        				$("#workcout").text(profdet[7]);
        				//$("#qufydesc").text(profdet[8]);												
        				return false;			
        			}
    			});
    			return false;
       }		
}
//close membership popup
function closeReferencePopup(){
	$("#viewreferencedet").modal('hide');
}
//---------------------------------------------------------------------------------------------
//Edit Lead price
function editLeadPrice(postid)
    {
		$("#editLeadPrice_open").modal('show');
    	if(postid != '')
		{			
			$('#loading-image').show();			
			$.post('adminAjaxAction.php',{'postid':postid,'action':'editLeadPrice'},function(data){	
				 $("#editLeadPrice").html(data);
				 $("#postid").val(postid);
				 $('#loading-image').hide();			
				});
			return false;
		}	
    }
//----------------------------------------------------------------------------------------------    
function closeeditLeadPricePopup()
    {
    	$("#editLeadPrice_open").modal('hide');
    }

//view project details
function viewPostProjectDetails(postid)
    {		
    	$('#loading-image').show();			
    	$("#viewprojectdetail_open").modal('show');
    	if(postid != '')
            {
              $("#viewprojectdetail").load('adminAjaxAction.php',{'postid':postid,'action':'viewpostproject'},function(){}); 
    		}		
		$('#loading-image').hide();			
    }
//close membership popup
function closePostpjtPopup()
    {
    	$("#viewprojectdetail").hide();
    	$("#maska").hide();
    }
    
//view Homeoner user details
function viewHomeOwnerDetails(userid)
    {		
    	$('#loading-image').show();
		$("#viewHomeownerdetail_open").modal('show');
    	if(userid != '')
            {
              $("#viewHomeownerdetail").load('adminAjaxAction.php',{'userid':userid,'action':'viewHomeownerproject'},function(){
        			
        		  });              
    		}	
    		$('#loading-image').hide();		
    }
//-------------------------------------------------------------------------------------------------
//close membership popup
function closeHomeOwnerpjtPopup()
    {
    	$("#viewHomeownerdetail").hide();
    	$("#maska").hide();
    }
//--------------------------------------------------------------------------------------------------
//view map
function viewMap()
    {
        var service_area = $("#service_area").val();
        var service_miles = $("#service_radius").val();
    			
    	trademen_gmap_service_area(service_area, service_miles);
    }
 
//---------------------------------------------------------------------------------------------------------   
    function validateRefundCancelReason()
        {
        
            var reason  =$("#reason").val();
            if(reason == ''){
                $("#error").addClass('errormsg').html("Enter the Refund Request Decliend Reason");
                $("#reason").focus();
                return false;
                
            }
        }
    
    //delete Reference in trademenAddEdit
    function deleteReference_new()
    {
        var checkedvar = $('.case').is(':checked');
        if(checkedvar == true){
            var str = 'Are you sure want to Delete?';
        }
        if( confirm(str) )
        {
		    	var checkedvalues = $('input:checkbox:checked.case').map(function () {
				  return this.value;
				}).get();
				
        }
        if(checkedvalues)
        {
          $.post('adminAjaxFile.php',{'action':'deletereference_new','refid':checkedvalues},function(data)
            {	//alert(data);
                if(data == 'suc')
                    {
                        alert("your Reference Deleted Successfully");
                        window.location.reload();
        				return false;
                    }
                else
                    {
                        alert("Error");   
                        window.location.reload();                 
        				return false;
                    }							
    		});	 
        }
    }
    
//-------------------------------------------------------------------------------
    
    //Add New Sales Person for SalesPerson Management
    function addNewSalesPerson(){
        
        var name       = $.trim($("#name").val());
        var email      = $.trim($("#email").val());
        var password   = $.trim($("#psw").val());
        var type       =  $('.radiobotton:checked').val();

        if(name == ''){
           	$("#errormsg").addClass('errormsg').html("Please Enter the Name");
    		$("#name").focus();
    		return false;
        }else{
            $("#errormsg").addClass('errormsg').html("");
        }
        if(type == undefined){
            $("#errormsg").addClass('errormsg').html("Please Select the Person Type");
    		$("#perType").focus();
    		return false;
        }else{
             $("#errormsg").addClass('errormsg').html("");
        }
        if(email == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter the email id");
    		$("#email").focus();
    		return false;
        }else{
           $("#errormsg").addClass('errormsg').html(""); 
        }
        if(email != ''){
            if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))){
    		   	$("#errormsg").addClass('errormsg').html("Please Enter the Valid Email");
    			$("#email").focus();
    			return false;
	       }else{
	           $("#errormsg").addClass('errormsg').html("");
	       }
        }
        if(password == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter the Password");
    		$("#psw").focus();
    		return false;
        }else{
            $("#errormsg").addClass('errormsg').html("");
        }
        if(email != ''){
            $.post('adminAjaxFile.php',{'action':'validateSalesPersonEmail','email':email},function(data)
            {
                if(data == 'already')
                    {
                        $("#errormsg").addClass('errormsg').html("Sales Person Email Id Already Exist");
                        $("#email").focus();
        				return false;
                    }
                else if(data == 'ok')
                    {  
                        window.addNewCuisine.submit();                 
        				return false;
                    }else{
                        return false;
                    }							
    		});	 
            return false;
        }  
    }
    
    //Edit SalesPerson for salesPersonAddEdit Management
    function editSalesPerson(){

        var name       = $.trim($("#name").val());
        var email      = $.trim($("#email").val());
        var password   = $.trim($("#psw").val());
        var type       = $('.radiobotton:checked').val();
        var id         = $.trim($("#id").val());

        if(name == ''){
           	$("#errormsg").addClass('errormsg').html("Please Enter the Name");
    		$("#name").focus();
    		return false;
        }else{
            $("#errormsg").addClass('errormsg').html("");
        }
        if(type == undefined){
            $("#errormsg").addClass('errormsg').html("Please Select the Person Type");
    		$("#perType").focus();
    		return false;
        }else{
             $("#errormsg").addClass('errormsg').html("");
        }
        if(email == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter the email id");
    		$("#email").focus();
    		return false;
        }else{
           $("#errormsg").addClass('errormsg').html(""); 
        }
        if(email != ''){
            if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))){
    		   	$("#errormsg").addClass('errormsg').html("Please Enter the Valid Email");
    			$("#email").focus();
    			return false;
	       }else{
	           $("#errormsg").addClass('errormsg').html("");
	       }
        }
        if(password == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter the Password");
    		$("#psw").focus();
    		return false;
        }else{
            $("#errormsg").addClass('errormsg').html("");
        }
        if(email != ''){
            $.post('adminAjaxFile.php',{'action':'validateSalesPersonEmail','email':email,'id':id},function(data)
            {
                if(data == 'already')
                    {
                        $("#errormsg").addClass('errormsg').html("Sales Person Email Id Already Exist");
                        $("#email").focus();
                        return false;
                    }
                else if(data == 'ok')
                    {  
                        window.addNewCuisine.submit();                 
        				return false;
                    }else{
                        return false;
                    }							
    		});	 
            return false;
        }

    }
    
    //Turn off leads in add and Edit in admin side
    function addEditTurnOff(){
        var name            = $.trim($("#con_name").val());
        var pause           = $.trim($("#pause").val());
        var resume          = $.trim($("#resume").val());
        var pausing_resaon  = $.trim($("#pausing_resaon").val());
        var id              =$.trim($("#id").val());

        var y1=pause.split("-");
        var date1=new Date(y1[0],(y1[1]-1),y1[2]);
        var y2=resume.split("-");
        var date2=new Date(y2[0],(y2[1]-1),y2[2]);
  
      
        var today = new Date();

        if(name == ''){
            $("#errormsg").addClass('errormsg').html("Please Select the Contractor");
    		$("#con_name").focus();
    		return false;
        }else{
            $("#errormsg").addClass('errormsg').html("");
        }
         if(pause == ''){
            $("#errormsg").addClass('errormsg').html("Please select the Pause Leads on date");
    		$("#pause").focus();
    		return false;
        }else{
            $("#errormsg").addClass('errormsg').html("");
        }
         if(date1 < today){
            $(".errormsg").addClass('errormsg').html("Pause Leads on date Must be in future");
            $("#pause").focus();
            return false;
        }
         if(resume == ''){
            $("#errormsg").addClass('errormsg').html("Please select the Resume Leads on date");
    		$("#resume").focus();
    		return false;
        }else{
            $("#errormsg").addClass('errormsg').html("");
        }
         if(date2 < today || date2 < date1){
            $(".errormsg").addClass('errormsg').html("Resume Leads on date Must be in future");
            $("#resume").focus();
            return false;
        }else{
            $("#errormsg").addClass('errormsg').html("");
        }
        if(pause == resume){
            $(".errormsg").html("Pause Leads on and Resume Leads on should not be same");
            $("#resume").focus();
            return false;
        }else{
           $("#errormsg").addClass('errormsg').html("");
        }
         if(pausing_resaon == ''){
            $("#errormsg").addClass('errormsg').html("Please select the Pausing Reason");
    		$("#pausing_resaon").focus();
    		return false;
        }else{
            $("#errormsg").addClass('errormsg').html("");
        }
        
    }

//-----------------------------------------------------------------------------------------------------------------------
//Popup for commision values
    function openCalculateCommision(name,total_amount,admin_id){
        openPopup('#commision_Percentage','#maska');
        $("#sale_name").html(name);
        $("#amount").html(total_amount);
        $("#admin_id").val(admin_id);
        //$("#con_id").val(con_id);
        	/*if(total_amount != '')
                {			
        			$.post('adminAjaxAction.php',{'total_amount':total_amount,'action':'commision_Percentage'},function(data){
        			 alert(data)
            			 $("#commision_Percentage").html(data);
            			 //$("#postid").val(postid);
        				});
        			return false;
        	     }*/return false;	
        
    }
    
    function closeCommissionPopUp(){
        $("#commision_Percentage").hide();
    	$("#maska").hide();
    }
    
    function calculate_percentage(val)
    {
        var amount = $("#amount").html();
        var commission_amount = (val / 100)*amount;
        $("#commission_amount").html(commission_amount)
    }
    
    function payCommission(){
        var admin_id    = $.trim($("#admin_id").val());
        var amount      = $.trim($("#amount").html());
        var percentage  = $.trim($("#percent").val());
        var commission  = $.trim($("#commission_amount").html());
        
        if(commission == ''){
            $("#error").addClass('popupErrors').html("Please enter the Commission Percentage");
            //alert("Please enter the Commission Percentage");
    		$("#commission_amount").focus();
            return false;
        }else{
            $.post('adminAjaxFile.php',{'action':'sales_comission','admin_id':admin_id,'amount':amount,'commission':commission,'percentage':percentage},function(data)        
           {
                if(data == 'Success')
                window.location.reload();
                						
    		});return false;	
        }
         
    }
//Upgrade Membership
function upgradeMembership(val,id)
    {
        if((val != '' && id != '') && val != 0)
        {
            var str ="Are You Sure Want to Change Membership?";
            if(confirm(str))
            {
                if(val == 'payper' || val == 'package'){
                $.post('adminAjaxFile.php',{'action':'upgrade_MemberShip','val':val,'con_id':id},function(data) 
                   {
                        if(data == 'Success')
                        window.location.reload();						
            		});
                    return false;
                }
            }            
        }
    }    
function validateTransationId_upgradeMembership(con_id)
{
    var txt_id =$.trim($("#transactionId").val());
    var plan = 2;
    var package_id = $.trim($("#selected_package").val());
    if(txt_id == ''){
        $(".transactionId").html('Please Enter Transaction Id')
        $("#transactionId").focus();
        return false;
    }else{
        if(con_id != '' && plan == 2 && package_id != ''){
 $.post('adminAjaxFile.php',{'action':'upgrade_MemberShip','plan':plan,'package_id':package_id,'con_id':con_id,'trans_id':txt_id},function(data)        
               {
                //alert("111"+data+"34543");
                    if(data == 'success')
                    window.location.reload();						
        		});return false;
        }
    }    
}           
//							Language Management
//*****************************************************************************************************
//Add New Language Name
function addNewLanguage()
{
	var languagename    = $.trim($("#languagename").val());
	var languagecode   	= $.trim($("#languagecode").val());
	var letters     	= /^[A-Za-z]+$/;
	var nameRegex 		= /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
	
	if(languagename == '')
	{
		$("#errormsg").addClass('errormsg').html("Please enter the Language Name");
		$("#languagename").focus();
		return false;
	}				
	/*else if(!languagename.match(nameRegex)) {
		$("#errormsg").addClass('errormsg').html("Language Name must be alphabates");
		$("#languagename").focus();
		return false;
	}*/
			
	if(languagecode == '')
	{
		$("#errormsg").addClass('errormsg').html("Please enter the Language Code");
		$("#languagecode").focus();
		return false;
	}
	if(!(languagecode.match(letters)))
	{
		$("#errormsg").addClass('errormsg').html("Language Code must be Alphabates");
		$("#languagecode").focus();
		return false;
	}
	/*if(!(statename.match(letters))){
		$("#errormsg").addClass('errormsg').html("State Name must be Alphabates");
		$("#statename").focus();
		return false;
	}*/	
	if(languagename != '' && languagecode != '')
	{		
		$.post('adminAjaxFile.php',{"languagename":languagename,"languagecode":languagecode,"action":"checkAddLanguageName"},function(response)
		{			
			//alert(response);
			if(response == "exist")
			{
				$("#errormsg").addClass('errormsg').html("Language Name and Language Code Already Exist");
				$("#languagename").focus();
				return false;
			}
			else if(response == "success")
			{
				window.location.href = "languageManage.php";
				return false;
			}
			else
			{
				$("#errormsg").addClass('errormsg').html("Error occured");
				return false;
			}
		});
		return false;
		}
}
//Edit Language
function editLanguage()
{
	
	var languagename    = $.trim($("#languagename").val());
	var languagecode   	= $.trim($("#languagecode").val());
	var lang_id			= $.trim($("#langid").val());
	var letters     	= /^[A-Za-z]+$/;
	var nameRegex 		= /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
	
	if(languagename == '')
	{
		$("#errormsg").addClass('errormsg').html("Please enter the Language Name");
		$("#languagename").focus();
		return false;
	}				
	/*else if(!languagename.match(nameRegex)) {
		$("#errormsg").addClass('errormsg').html("Language Name must be alphabates");
		$("#languagename").focus();
		return false;
	}*/
			
	if(languagecode == '')
	{
		$("#errormsg").addClass('errormsg').html("Please enter the Language Code");
		$("#languagecode").focus();
		return false;
	}
	if(!(languagecode.match(letters)))
	{
		$("#errormsg").addClass('errormsg').html("Language Code must be Alphabates");
		$("#languagecode").focus();
		return false;
	}
	/*if(!(statename.match(letters))){
		$("#errormsg").addClass('errormsg').html("State Name must be Alphabates");
		$("#statename").focus();
		return false;
	}*/	
	if(languagename != '' && languagecode != '')
	{		
		$.post('adminAjaxFile.php',{"languagename":languagename,"languagecode":languagecode,"lang_id":lang_id,"action":"checkEditLanguageName"},function(response)
		{	
			//alert(response);
			if(response == "exist")
			{
				$("#errormsg").addClass('errormsg').html("Language Name and Language Code Already Exist");
				$("#languagename").focus();
				return false;
			}
			else if(response == "update")
			{
				window.location.href = "languageManage.php";
				return false;
			}
			else
			{
				$("#errormsg").addClass('errormsg').html("Error occured");
				return false;
			}
		});
		return false;
	}
}
//Change file from language option
function loadselectLangFile(lfile,langid,langcode)
{
	window.location.href = "languageAddEdit.php?langid="+langid+"&langcode="+langcode+"&lfile="+lfile;
}

//Update file from language option
function updateselectLangFile()
{
	
	var langid    			= $.trim($("#langid").val());
	var lfile   			= $.trim($("#lfile").val());
	var lang_file_name    	= $.trim($("#lang_file_name").val());
	var langfilecontent   	= $.trim($("#langfilecontent").val());
	
	$.post('adminAjaxFile.php',{"langid":langid,"lfile":lfile,"langfilecontent":langfilecontent,"lang_file_name":lang_file_name,"action":"LanguageFilesListEdit"},function(response)
	{
		if(response == "success")
		{
			$("#errormsg").addClass('successmsg').html(lfile+" updated successfully");
			return false;
		}
		else
		{
			$("#errormsg").addClass('errormsg').html("Error occured");
			return false;
		}
		return false;
	});
	return false;
}
//********************************************************************************************************************


// Main Category Add Edit Validation
function addEditMainCategory()
	{
	   //alert("hi");
		var main_catname          = $.trim($("#main_catname").val());     
		var lang_code 	          = $.trim($("#lang_code").val());  
		var meid 	              = $.trim($("#meid").val());
		var page 	              = $.trim($("#page").val());
		var sel_lang 	          = $.trim($("#sel_lang").val());
        
        if(main_catname == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Main Category Name");
			$("#main_catname").focus();
			return false;		
		}
        if(main_catname != ''){
			$.post('adminAjaxFile.php',{"main_catname":main_catname,"lang_code":lang_code,"meid":meid,"action":"mainCategoryAddEdit"},function(response){
			//alert(response);
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("Main Category Name Already Exist");
					$("#main_catname").focus();
					return false;
				}else if(response == "insert" || response == "update"){
					// window.location.href = "mainCategoryManage.php"+((page != '') ? "?page="+page : '')+((sel_lang != '') ? "&sel_lang="+sel_lang : '');
					window.location.href = "mainCategoryManage.php"+((page != '') ? "?page="+page : '');
					return false;
				}
				else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
		}
		return false;   
    }
         
//Sub Category Add Edit Validation
function addEditCategory()
	{
		var maincatname         = $.trim($("#maincatname").val());
		var catename          	= $.trim($("#catename").val());
        var payper_lead_price   = $.trim($("#payper_lead_price").val());
        var eid                 = ($("#eid").val() == 'undefined') ? '' : $("#eid").val();
        var mcatid              = ($("#mcatid").val() == 'undefined') ? '' : "&mcatid="+$("#mcatid").val();
        var sel_lang           	= ($("#sel_lang").val() == 'undefined') ? '' : "&sel_lang="+$("#sel_lang").val();
        var lang_code           = ($("#lang_code").val() == 'undefined') ? '' : $("#lang_code").val();        
        var page 	            = $.trim($("#page").val());

        
 		
 		if(maincatname == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Main Category Name");
			$("#maincatname").focus();
			return false;		
		}
		if(catename == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Sub Category Name");
			$("#catename").focus();
			return false;		
		}
       if(payper_lead_price == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the Pay Per Lead Price");
			$("#payper_lead_price").focus();
			return false;		
		}
        if((isNaN(payper_lead_price)) || (payper_lead_price<0)){
			$("#errormsg").addClass('errormsg').html("Please Enter the Valid Pay Per Lead Price ");
			$("#payper_lead_price").focus();
			return false;		
		}
        
       
         if(catename != ''){
			$.post('adminAjaxFile.php',{"maincatname":maincatname,"catename":catename,"payper_lead_price":payper_lead_price,"eid":eid,"lang_code":lang_code,"action":"categoryAddEdit"},function(response){

			//alert(response);
			$('#loading-image').show();			
				if(response == "exist"){
					$('#loading-image').hide();			
					$("#errormsg").addClass('errormsg').html("Sub Category Name Already Exist");
					$("#maincatname").focus();
					return false;
				}else if(response == "insert"){
					$('#loading-image').hide();			
					// window.location.href = "categoryManage.php"+(($("#page").val() != '') ? "?page="+page : '')+(($("#mcatid").val() != '') ? mcatid : '')+(($("#sel_lang").val() != '') ? sel_lang : '');
					window.location.href = "categoryManage.php"+(($("#page").val() != '') ? "?page="+page : '')+(($("#mcatid").val() != '') ? mcatid : '');
					return false;
				}else if(response == "update"){
					$('#loading-image').hide();			
					// window.location.href = "categoryManage.php"+(($("#page").val() != '') ? "?page="+page : '')+(($("#mcatid").val() != '') ? mcatid : '')+(($("#sel_lang").val() != '') ? sel_lang : '');
					window.location.href = "categoryManage.php"+(($("#page").val() != '') ? "?page="+page : '')+(($("#mcatid").val() != '') ? mcatid : '');
					return false;
				}else{
					$('#loading-image').hide();			
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
		}
		return false;
	
	}
    
//****************************************************************************************************************************
 //To enable and display payment setting
 function enableDisablePaymentdiv(paymentdiv)
 {
 	//Paypal payment Enable/disable
    if(paymentdiv == 'enablePaypalDiv'){
        if(document.getElementById("paypal_enable").checked==true)
           $("#enablePaypalDiv").show();
        else
          $("#enablePaypalDiv").hide();
    }
    //Stripe payment Enable/disable
    if(paymentdiv == 'enableStripeDiv'){
        if(document.getElementById("stripe_enable").checked==true)
           $("#enableStripeDiv").show();
        else
          $("#enableStripeDiv").hide();
    }
    //SMS Setting Enable/disable
    if(paymentdiv == 'enableSMSDiv'){
        if(document.getElementById("sms_enable").checked==true)
           $("#enableSMSDiv").show();
        else
          $("#enableSMSDiv").hide();
    }
    //Offline Settings Enable/disable
    if(paymentdiv == 'offline_notes_div'){
        if(document.getElementById("offline_status_yes").checked==true)
           $("#offline_notes_div").show();
        else
          $("#offline_notes_div").hide();
    }
 }
 
//****************************************************************************************************************
 //Feature City Add Edit
 function addEditFeatureCity()
 {	
	var featureCityname	 =	$.trim($('#featureCityname').val());
	var cityid	         =	$.trim($('#cityid').val());
	
	if(featureCityname == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Feature City Name");
		$("#featureCityname").focus();
		return false;
	}
	
	if(featureCityname != ''){
	
		$.post('adminAjaxFile.php',{"featureCityname":featureCityname,'cityid':cityid,"action":"featureCityAddEdit"},function(response){
		   //alert(response);
			if(response == "exist"){
				$("#errormsg").addClass('errormsg').html("Feature City Name Already Exist");
				$("#featureCityname").focus();
				return false;
			}else if(response == "insert" || response == "updated"){
				window.location.href = "featureCityManage.php";
				return false;
			}
			else{
				$("#errormsg").addClass('errormsg').html("Error occured");
				return false;
			}
		});
		return false;
	}
}
//Review Edit Validation
function reviewEdit()
{
	var quality	 = $("#quality").val();
	var service	 = $("#service").val();
	var money	 = $("#money").val();
	var review	 = $("#review").val();
    var userid   = $("#eid").val();
    
	if(quality == ''){
		$("#errormsg").addClass('errormsg').html("Please Select The Quality");
		$("#quality").focus();
		return false;
	} 
	if(service == ''){
		$("#errormsg").addClass('errormsg').html("Please Select the Service");
		$("#service").focus();
		return false;
	}
	if(money == ''){
		$("#errormsg").addClass('errormsg').html("Please Select the Money");
		$("#money").focus();
		return false;
	}
	if(review == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter The Review");
		$("#review").focus();
		return false;
	}  
}
//Delete Popup Open
function deletePopupOpen(postid)
    {		
    	$("#deletepopupcontrol").modal('show');	
        if(postid != '')
            {
              $("#deletepopup").load('adminAjaxAction.php',{'postid':postid,'action':'deletepopup'},function(){
        			
        		});              
    		}
    } 
//Delete Popup Close   
function closedeletepopup()
    {
        //$("#deletepopup").hide();
    	//$("#maska").hide();
        $("#deletepopupcontrol").modal('hide');
    }  

function deletePopupMessageValidation()
{
    var deleted_reason  =   $("#deleted_reason").val();
    
    if(deleted_reason == ''){
        $("#deletedReasonErr").addClass('errormsg').html("Enter Reason to delete a project.");
        $("#deleted_reason").focus();
        return false;
    }else if(deleted_reason != '')
    {
        $("#deleteReasonPopup").submit();
    }
}  

//--------------------------------------- Content -----------------------------------------------
//Add New Content 
function addNewContent()
    {       
        var title            = $.trim($("#title").val());        
        var mettitle         = $.trim($("#mettitle").val());
        var metdes           = $.trim($("#metdes").val());
        var metkey           = $.trim($("#metkey").val());
        var page_type         = $("input[name='page_type']:checked").val() ;
        
        if(title == ''){
    		$("#errormsg").addClass('errormsg').html("Please Enter Title name");
    		$("#title").focus();
    		return false;
	    } 
        
        if(mettitle == ''){
    		$("#errormsg").addClass('errormsg').html("Please Enter Metatag Title");
    		$("#mettitle").focus();
    		return false;
	    }
        
        if(metdes == ''){
    		$("#errormsg").addClass('errormsg').html("Please Enter Metatag Description");
    		$("#metdes").focus();
    		return false;
	    } 
        
        if(metkey == ''){
    		$("#errormsg").addClass('errormsg').html("Please EnterMetatag Keyword");
    		$("#metkey").focus();
    		return false;
	    } 
        
         if(page_type == "" || page_type == null){           
    		$("#errormsg").addClass('errormsg').html("Please Select Anyone PageType"); 
               		           
    		return false;
        }        
    }   
    
//Edit Content 
function editContent()
    {
        var title            = $.trim($("#title").val());        
        var mettitle         = $.trim($("#mettitle").val());
        var metdes           = $.trim($("#metdes").val());
        var metkey           = $.trim($("#metkey").val());
        var page_type         = $("input[name='page_type']:checked").val() ;      
        var conid            = $("#conid").val();        
        
        if(title == ''){
    		$("#errormsg").addClass('errormsg').html("Please Enter Title name");
    		$("#title").focus();
    		return false;
	    } 
        
        if(mettitle == ''){
    		$("#errormsg").addClass('errormsg').html("Please Enter Metatag Title");
    		$("#mettitle").focus();
    		return false;
	    }
        
        if(metdes == ''){
    		$("#errormsg").addClass('errormsg').html("Please Enter Metatag Description");
    		$("#metdes").focus();
    		return false;
	    } 
        
        if(metkey == ''){
    		$("#errormsg").addClass('errormsg').html("Please EnterMetatag Keyword");
    		$("#metkey").focus();
    		return false;
	    } 
        if(page_type == "" || page_type == null){           
    		$("#errormsg").addClass('errormsg').html("Please Select Anyone PageType");
    		          
    		return false;
        }  
    }
    //--------------------------------------- Blog Content -----------------------------------------------
	//Add Blog Content 
    function addBlogContent()
    {       
        var title            = $.trim($("#title").val());        
        var mettitle         = $.trim($("#mettitle").val());
        var metdes           = $.trim($("#metdes").val());
        var metkey           = $.trim($("#metkey").val());
        var article_desc     = $.trim($("#sometext").val());
        
        if(title == ''){
    		$("#errormsg").addClass('errormsg').html("Please Enter Article Title Name");
    		$("#title").focus();
    		return false;
	    } 
        
        if(article_desc == ''){
    		$("#errormsg").addClass('errormsg').html("Please Enter Article Description");
    		$("#sometext").focus();
    		return false;
	    }
    }   
    
    //Edit BlogContent 
	function editBlogContent()
    {
        var title        = $.trim($("#title").val());        
        var mettitle     = $.trim($("#mettitle").val());
        var metdes       = $.trim($("#metdes").val());
        var metkey       = $.trim($("#metkey").val());
        var article_desc = $.trim($("#sometext").val());
        var conid        = $("#conid").val();  

        
        if(title == ''){
    		$("#errormsg").addClass('errormsg').html("Please Enter Article Title Name");
    		$("#title").focus();
    		return false;
	    }

	    if(article_desc == ''){
    		$("#errormsg").addClass('errormsg').html("Please Enter Article Description");
    		$("#sometext").focus();
    		return false;
	    }
    }     
