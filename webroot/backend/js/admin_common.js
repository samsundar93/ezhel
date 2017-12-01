//------------------------------------------------------------------------------
						//Jquery Tab 
//------------------------------------------------------------------------------
	$(document).ready(function(){

		//post job page start time of job
			$(".post-time label").click(function() {
				$(".post-time label").removeClass("active");
				$(".post-time-content-outer").hide();
				$(this).addClass("active"); 

				var activeTab = $(this).attr("id");
				$('#'+activeTab+'_content').show();
			});
			//post job page alertenate start time of job
			$("#addTime").click(function() {
				$("#addTime").hide();
				$("#alternateTime").show();
				
			});
		
		var packagesHt = $(".packagesDivInner").height();
		$(".packagesDiv").css("height",packagesHt);
	
		//Add & Edit Restaurant
		$(".yearMonthStatics li a").click(function() { //When click open tab
			
			$(".yearMonthStatics li a").removeClass("active");
			$(".indexLeftTabContent").hide();
			
			$(this).addClass("active"); 
			var activeTab = $(this).attr("id");
			$('#'+activeTab+'_content').show();
		});		
	//Index Page - Right
		//Add & Edit Restaurant
		$(".rightStatics li a").click(function() { //When click open tab			
			$(".rightStatics li a").removeClass("active");
			$(".indexRightTabContent").hide();
			
			$(this).addClass("active"); 
			var activeTab = $(this).attr("id");
			$('#'+activeTab+'_content').show();
		});
		
	//Currency Settings for Site Settings
		$("#currency_display_img").click(function() { 
			
			$("#currency_img_display").show();
			$("#currency_sym_display").hide();
		});
		
		$("#currency_display_sym").click(function() { 
			
			$("#currency_sym_display").show();
			$("#currency_img_display").hide();
		});
	
	//Paypal Payment settings for Payment settings
		$("#live_mode").click(function() { 
			
			$("#paypal_url_live").show();
			$("#paypal_url_test").hide();
			$("#business_live").show();
			$("#business_test").hide();
			$('input[name="test_mode"]').attr('checked', false);
		});
		
		$("#test_mode").click(function() {
			
			 $("#paypal_url_test").show();
			 $("#paypal_url_live").hide();
			 $("#business_test").show();
			 $("#business_live").hide();
			 $('input[name="live_mode"]').attr('checked', false);
		});
        
        $("#stripe_live_mode").click(function() { 
			
			$("#stripe_apikey_live").show();
			$("#stripe_apikey_test").hide();
			$("#publisher_key_live").show();
			$("#publisher_key_test").hide();
			$('input[name="stripe_test_mode"]').attr('checked', false);
		});
        
		//Stripe payment
		$("#stripe_test_mode").click(function() {
			
			 $("#stripe_apikey_test").show();
			 $("#stripe_apikey_live").hide();
			 $("#publisher_key_test").show();
			 $("#publisher_key_live").hide();
			 $('input[name="stripe_live_mode"]').attr('checked', false);
		});
        
        
        $("#package").click(function() { 
			
			$("#package_list").show();
			//$('input[name="membership"]').attr('checked', false);
		});
        
        //pricevalue vaidation
		$('.pricevalidate').keypress(function(event) {
		    
		    if(event.which == 8 || event.which == 0){
		        return true;
		    }
		    if(event.which < 46 || event.which > 59 || event.which == 47) {
		        return false;           
		    }         
		    if(event.which == 46 && $(this).val().indexOf('.') != -1) {
		        return false;            
		    } 
		});     

		$(".postiveinterger").keypress(function (e) {
		     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {        
		           return false;
		    }
		});     

		// Public Username Restriction
		$(".alphaNumericFilter").bind("keypress", function (event) {
		    if (event.charCode!=0) {
		        var regex = new RegExp("^[a-zA-Z0-9]+$");
		        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		        if (!regex.test(key)) {
		            event.preventDefault();
		            return false;
		        }
		    }
		});

		// POst Project Images
		$(".addBrowseButton").click(function()
		{
			$(".addBrowseButtonInnerBefore").append('<div class="col-md-4 margin-bottom-15"><input type="file" name="jobphoto[]" id="jobphoto[]" value=""/></div>');	        
		});

		// Contractor WOrk Image
		$(".addBrowseButtonBefore").click(function()
		{
			$(".addBrowseButtonInnerBefore").append('<div class="col-md-4 margin-bottom-15"><input type="file" name="workphoto[]" id="workphoto[]" value=""/></div>');	        
		});        
        
 //********************* For TradesmenAddEdit *********************
    var mainCount = $("#mainCount").val();  
       
    for ( var id = 1; id <= mainCount; id++ ) 
    {
        var total_chkbok      = $(".checkedskills_"+id).length;         
        var chk_chkbok        = $("input:checkbox:checked.checkedskills_"+id).length ;  
                               
        if(  (Number(total_chkbok) ==  Number(chk_chkbok)) && (chk_chkbok > 0)){                
                $("#catMain_"+id).prop('checked',true) ;  
                $("#catMain_"+id).parent("span").addClass('checked');                
        }else{                   
	            $("#catMain_"+id). prop('checked',false);  
	            $("#catMain_"+id).parent("span").removeClass('checked');                                                              
        }
    }
});
//--------------------------------------- Filter -----------------------------------------------
//Display filter option
function filterOptShowHide(){
	$("#searchkey").toggle();	 
	$("#export").hide();
	$("#import").hide(); 
}
//Filter validation
function filterValidation(){
	var keyword = $.trim($("#keyword").val());
	
	if(keyword == ''){
		//$("#errormsg").addClass('errormsg').html("Please Enter the Keyword");
		alert("Please Enter the Keyword");
		$("#keyword").focus();
		return false;
	}
}

//Clear Filter Text Box
function clearFilterTxtBox(){
	$("#keyword").val('');
	return false;
}
//--------------------------------------- Change Password -----------------------------------------------
//ChangePassword
function changepassword()
{
	$("#errormsg").removeClass('successmsg');
	/*var old_password = $.trim($("#old_password").val());*/
	var new_password = $.trim($("#password").val());
	var con_password = $.trim($("#confirm_password").val());

    if(new_password == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter New Password");
		$("#new_password").focus();
		return false;
	}
	else if(con_password == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter Confirm Password");
		$("#confirmed_password").focus();
		return false;		
	}
	else if(new_password != con_password){
		$("#errormsg").addClass('errormsg').html("New Password and Confirm Password Mismatch");
		$("#new_password").focus();
		return false;
	}
}
 //-----------------------------------------------------------------------------------  
//Check DeCheckAll - Main Category based TradesmenAddEdit
function checkDecheckAll(id)
{  
    var allSelect       = $("#catMain_"+id).is (':checked');  
    var present_chkbok  = $("input:checkbox.checkedskills_"+id).length ; 
    
    if( (allSelect == true)  && (present_chkbok == 0))
    {            
         $("#catMain_"+id).prop('checked',false);   
          $(".checkedskills_"+id).parent("span").removeClass('checked');
         alert("There is no sub category");  
         //$("#errormsg").addClass('errormsg').html("There is no sub category");       	    
    }
    else if(allSelect == true)
    {         
        $(".checkedskills_"+id).prop('checked',true);
        $(".checkedskills_"+id).parent("span").addClass('checked');

    }
    else
    {        
        $(".checkedskills_"+id).prop('checked',false);
        $(".checkedskills_"+id).parent("span").removeClass('checked');
    }  
 }  
 
 //Individual Check - Subcategory based TradesmenAddEdit
function individualCheck(id)
{  
    var total_chkbok   = $(".checkedskills_"+id).length;   
    var chk_chkbok     = $("input:checkbox:checked.checkedskills_"+id).length ;
    
 
    if(  Number(total_chkbok) ==  Number(chk_chkbok) ){                                                                                                
            $("#catMain_"+id).prop('checked',true) ;    
            $("#catMain_"+id).parent("span").addClass('checked');                        
        }
    else{        
            $("#catMain_"+id). prop('checked',false);    
            $("#catMain_"+id).parent("span").removeClass('checked');                                                            
        } 
 } 
 //-----------------------------------------------------------------------------------
//Select & Deselect All
function selectDeselectAll()
{	
	var selectallvar = $('#selectall').is(':checked');
	if(selectallvar == true){
		$(".case").prop( "checked", true );
		$(".case").parent().addClass("checked");
	}else{
		$(".case").prop('checked', false);
		$(".case").parent().removeClass("checked");
	}
		
	var checkedvar = $('.case').is(':checked');
	if(checkedvar == true){
		$('.but_activate').show();
		$('.but_deactivate').show();
		$('.but_delete').show();
        $('.but_getReview').show();
	}else{
		$('.but_activate').hide();
		$('.but_deactivate').hide();
		$('.but_delete').hide();
        $('.but_getReview').hide();
	}
}

//Individual Select
function individualSelect()
{		
	if($(".case").length == $(".case:checked").length) {
		
        $("#selectall").prop( "checked", true );
        $("#selectall").parent().addClass("checked");
        
        $('.but_activate').show();
		$('.but_deactivate').show();
		$('.but_delete').show();
        $('.but_getReview').show();
    } else {	
        //$("#selectall").removeAttr("checked");
        $("#selectall").prop('checked', false);
		$("#selectall").parent().removeClass("checked");
       // alert("not all");
        if($(".case:checked").length > 0){
			$('.but_activate').show();
			$('.but_deactivate').show();
			$('.but_delete').show();
            $('.but_getReview').show();
		}else{
			$('.but_activate').hide();
			$('.but_deactivate').hide();
			$('.but_delete').hide();
            $('.but_getReview').hide();
		}
    }
}
//Show Per Page
function showPerPage(limit,keyword,sortby){
	
	$('#loading-image').show();
	if(limit != ''){
		//get url
   		var filename = $(location).attr('href');
   		//get Parameter
   		var qrystr, qrystrlen, qryparam;
   		qrystr = filename.split("=");
   		qrystrlen = qrystr.length;
   		qryparam = (qrystrlen == '1') ? '?' : '&';
   		$('body').load(filename+qryparam+'sortby='+sortby+'&limit='+limit+'&keyword='+encodeURIComponent(keyword), function() {});
	}
	$('#loading-image').hide();	
}
//Show Per Page
function sortByAscDesc(sortby,limit,keyword){
	
	if(sortby != ''){
		//get url
   		var filename = $(location).attr('href');
   		//get Parameter
   		var qrystr, qrystrlen, qryparam;
   		qrystr = filename.split("=");
   		qrystrlen = qrystr.length;
   		qryparam = (qrystrlen == '1') ? '?' : '&';
   		$('#loading-image').show();
		$('body').load(filename+qryparam+'sortby='+sortby+'&limit='+limit+'&keyword='+encodeURIComponent(keyword), function() {});
	}
}
//Change Status
function changeStatus(changestatusval,fieldname,whereField,tablename,word,maincateid,filetype)
{ 

	/*alert("changestatusval"+changestatusval+"fieldname"+fieldname+"whereField"+whereField+"tablename"+tablename+"word"+word+"maincateid"+maincateid+"filetype"+filetype);
	return false; */

	if(maincateid != '' && changestatusval != '')
	{		
		if(changestatusval == 'Pending'){
		//Pending Process........................................
			var changestatusval = '1';
			$('#loading-image').show();			
			$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, 'action':'changeStatusPending'  },function(response){
				//alert(response);
				if(response == 'success'){
					
					var filename = $(location).attr('href');

					if(changestatusval == '1')
							$("#errormsg").addClass('alert alert-success').removeClass('display-hide alert-danger').html('Selected '+word+' activated successfully');
						else if(changestatusval == '0')
							$("#errormsg").addClass('alert alert-success').removeClass('display-hide alert-danger').html('Selected '+word+' deactivated successfully');
						else
							$("#errormsg").addClass('alert alert-danger').removeClass('display-hide alert-success').html('Error');
					$('body').load(filename, function() {						
						
					});
					
				}else{
					alert("error");return false;
				}
			});
			return false;
		}
		else if(changestatusval == 'delete' ){
		//Delete Process........................................
			
			if(confirm('Are you sure want to delete?')){
				$('#loading-image').show();
				$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, "filetype":filetype, 'action':'deleteProcess'  },function(response){
				//alert(response);	
					if(response == "success"){	
						alert('Selected '+word+' deleted successfully');
						location.reload();
						return false;
					}else{
						alert("error");return false;
					}
				});return false;
			}
		}
        else if(changestatusval == 'deletenew' ){
			if(confirm('Are you sure want to delete?')){
				$('#loading-image').show();
				$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, "filetype":filetype, 'action':'deleteProcessnew'  },function(response){
				//alert(response);	
					if(response == "success"){	
						alert('Selected '+word+' deleted successfully');
						location.reload();
						return false;
					}else{
						alert("error");return false;
					}
				});return false;
			}
		}//Delete the posted project
        else if(changestatusval == 'delete_project' ){
			if(confirm('Are you sure want to delete?')){
				$('#loading-image').show();
                var deleted_reason  =   $("#deleted_reason").val();
				$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, "filetype":filetype, 'action':'deleteProcess_project' ,'deleted_reason':deleted_reason },function(response){
				//alert(response);	
					if(response == "success"){
						alert('Selected '+word+' deleted successfully');
						location.reload();
						return false;
					}else{
						alert("error");return false;
					}
				});return false;
			}
		}
        else if(changestatusval == '0' || changestatusval == '1'){
			//Change Status Process........................................			
			if(tablename == 'jm_postaproject' && (changestatusval == '0' || changestatusval == '1')){
				var action = 'jobchangestatus';
			}else{
				var action = 'changeStatusCommon';
			}
            $('#loading-image').show();			
			$.post("adminAjaxAction.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid,"filetype":filetype,"word":word, 'action':action  },function(response)
			{
					/*alert(response); return false;*/

				$("#chgstatus"+maincateid).html(response);
				$('#loading-image').hide();
				
				if(changestatusval == '1')
					$("#errormsg").addClass('alert alert-success').removeClass('display-hide alert-danger').html('Selected '+word+' activated successfully');

				else if(changestatusval == '0')
					$("#errormsg").addClass('alert alert-success').removeClass('display-hide alert-danger').html('Selected '+word+' deactivated successfully');
				else
					$("#errormsg").addClass('alert alert-danger').removeClass('display-hide alert-success').html('Error');
			});
			return false;
		}  
        else if(changestatusval == 'No' || changestatusval == 'Yes')
        {
			//Change feature Status ........................................			
			if(word == 'language')
		    	var action = 'featurecitylang';
		    else 
		    	var action = 'featurecity';

            
            $('#loading-image').show();			
			$.post("adminAjaxAction.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid,"filetype":filetype,"word":word, 'action':action },function(response)
			{
				if(action == 'featurecitylang')
				{
					alert('Selected '+word+' '+((changestatusval == 'Yes') ? 'site language activated' : 'site language deactivated')+' successfully')
					window.location.reload();	
				}
				else if(action == 'featurecity')
				{
					$("#featurestatus"+maincateid).html(response);
					$('#loading-image').hide();
					
					if(changestatusval == 'Yes')
						$("#errormsg").addClass('alert alert-success').removeClass('display-hide alert-danger').html('Selected '+word+' activated successfully');

					else if(changestatusval == 'No')
						$("#errormsg").addClass('alert alert-success').removeClass('display-hide alert-danger').html('Selected '+word+' deactivated successfully');
					else
						$("#errormsg").addClass('alert alert-danger').removeClass('display-hide alert-success').html('Error');
				}
				
			});
			return false;
		}      
	}else{
		alert("Error occured");
	}
}

function changeundo(changestatusval,fieldname,whereField,tablename,word,maincateid,filetype)
{
    if(changestatusval == 'undo')
    {
        if(confirm('Are you sure want to Undo?'))
        {				
			$.post("adminAjaxFile.php", { 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, 'action':'undoprocess'  },function(response){
			//alert(response);	
				if(response == "success"){								
					$("#deletecate"+maincateid).hide();
					var filename = $(location).attr('href');
					$('#loading-image').show();
					$('body').load(filename, function() {
						$("#errormsg").addClass('alert alert-success').removeClass('display-hide alert-danger').html('Selected '+word+' Undo Successfully');
					});	
					return false;
				}else{
					alert("error");return false;
				}
			});return false;
		}
    }    
}    
//update the contactor No of leads pop up open
function updateNoofLeadsPopupopen()
    {
        //openPopup('#updatecreditvalue','#maska');
		$("#updatecreditvalue").modal('show');
    }
function closeNoofLeadsupdatepopup()
    {
       $("#updatecreditvalue").modal('hide');
    }   
function closeUpgradeTxIDpopup()
    {
        $("#updateMember").hide();
    	$("#maska").hide();
    }
//------------------------------------------------------------------------------------    
//update the no of leads to contractor 
function updateLeadsToContractor()
    {
        var noof_leads  = $.trim($("#noof_leads").val());
        var userid         = $.trim($("#userid").val());
        
         if(noof_leads == '')
            {
                $("#updtatcrederror").html("please Enter the Leads");
                $("#noof_leads").focus();
                return false;
            }       
        else if(isNaN(noof_leads) || noof_leads < 0)      
            {
                $("#updtatcrederror").html("please Enter the Valid Leads");
                $("#noof_leads").focus();
                return false;
            } 
         else
             {
                $.post("adminAjaxFile.php", { 'userid':userid, 'noof_leads':noof_leads,'action':'updateLeads'  },function(response){
            	 
                   if(response == "suc")
                       {
                            alert(noof_leads+" Leads Added Successfuly"); 
                            window.location.reload();	
                       }
            	   });
             }    
    }
//Get Sub Category List form Main Category
function getSubCategory(supercatid){
	$("#subcat-div").load('adminAjaxAction.php',{'supercatid':supercatid,'action':'subcat-list'});
}
//Get the all form fields
function getFromFields(subcatid){
	$("#formfielddiv").load('adminAjaxAction.php',{'subcatid':subcatid,'action':'form-field-list'});	
}

//Activate, Deactivate and Delete - MULTIPLE SELECTION
function adminActivateDeactivate(changestatusval,fieldname,whereField,tablename,word,filetype){

    var checkedvar = $('.case').is(':checked');
    if(checkedvar == true){
    	
    	if(changestatusval == '1'){
			var str = 'Are you sure want to Activate?';
		}else if(changestatusval == '0'){
			var str = 'Are you sure want to Deactivate?';
		}if(changestatusval == 'Yes'){
			var str = 'Are you sure want to change to Popular Dish?';
		}else if(changestatusval == 'No'){
			var str = 'Are you sure want to change to Normal Dish?';
		}else if(changestatusval == 'delete'){
			var str = 'Are you sure want to Delete?';
		}else if(changestatusval == 'delete_project'){
			var str = 'Are you sure want to Delete?';
		}else if(changestatusval == 'deletenew'){
			var str = 'Are you sure want to Delete?';
		}else if(changestatusval == 'delete_import'){
			var str = 'Are you sure want to Delete?';
		}else if(changestatusval == 'delete_admin'){
			var str = 'Are you sure want to Delete?';
		}
    	if( confirm(str) ){
		    	var checkedvalues = $('input:checkbox:checked.case').map(function () {
				  return this.value;
				}).get();
				
			    //Delete
			    if(changestatusval == 'delete'){
			     $('#loading-image').show();
			    	$.post("adminAjaxFile.php", { 'whereField':whereField, 'tablename':tablename, 'filetype':filetype, 'checkedvaluesarr[]': checkedvalues, 'action':'deleteProcess' },function(response){
			    		//alert(response)
				       	if(response == 'success'){
				       		
				       		var filename = $(location).attr('href');
							$('body').load(filename, function() {});
						}else{
							alert("error");return false;
						} 
	                });
	            }else if(changestatusval == 'deletenew'){
	               $('#loading-image').show();
			    	$.post("adminAjaxFile.php", { 'whereField':whereField, 'tablename':tablename,'fieldname':fieldname, 'filetype':filetype, 'checkedvaluesarr[]': checkedvalues, 'action':'deleteProcessnew' },function(response){
			    		//alert(response)
				       	if(response == 'success'){
				       		
				       		var filename = $(location).attr('href');
							$('body').load(filename, function() {});
						}else{
							alert("error");return false;
						} 
	                });
	            }
                //Delete the posted project
                if(changestatusval == 'delete_project'){
                    $('#loading-image').show();
			    	$.post("adminAjaxFile.php", { 'whereField':whereField, 'tablename':tablename, 'filetype':filetype, 'checkedvaluesarr[]': checkedvalues, 'action':'deleteProcess_project' },function(response){
			    		//alert(response)
				       	if(response == 'success'){
				       		
				       		var filename = $(location).attr('href');
							$('body').load(filename, function() {});
						}else{
							alert("error");return false;
						} 
	                });
	            }
                //To delete the admin rights user in salesperson
                else if(changestatusval == 'delete_admin'){
                    $('#loading-image').show();
			    	$.post("adminAjaxFile.php", { 'whereField':whereField, 'tablename':tablename,'fieldname':fieldname, 'filetype':filetype, 'checkedvaluesarr[]': checkedvalues, 'action':'delete_admin' },function(response){
			    		//alert(response)
				       	if(response == 'success'){
				       		
				       		var filename = $(location).attr('href');
							$('body').load(filename, function() {});
						}else{
							alert("error");return false;
						} 
	                });
	            }
                else if(changestatusval == '1' || changestatusval == '0'){
	            	
                    if(tablename == 'jm_postaproject' && (changestatusval == '0' || changestatusval == '1')){
        				var action = 'jobchangestatus';
        			}else{
        				var action = 'changeStatusCommon';
        			}
                    
	            	//Active & Deactive
                    $('#loading-image').show();
					$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'checkedvaluesarr[]': checkedvalues,'filetype':filetype, 'action':action },function(response){

						//alert(response); return false;
						
				    	if(response == 'success'){
				    		
							if(changestatusval == '1')
								$("#errormsg").addClass('alert alert-success').removeClass('display-hide alert-danger').html('Selected '+word+' activated successfully');
							else if(changestatusval == '0')
								$("#errormsg").addClass('alert alert-success').removeClass('display-hide alert-danger').html('Selected '+word+' deactivated successfully');
							else
								$("#errormsg").addClass('alert alert-danger').removeClass('display-hide alert-success').html('Error');
							window.location.reload();
						}else{
							alert("error");return false;
						} 
                	});
				}else if(changestatusval == 'Yes' || changestatusval == 'No'){	            	
	            	//Popular & Normal
                    $('#loading-image').show();
					$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'checkedvaluesarr[]': checkedvalues, 'action':'changePopularDish' },function(response){
				    	if(response == 'success'){
				    		
				    		var filename = $(location).attr('href');
							$('body').load(filename, function() {
								
								if(changestatusval == 'Yes')
									$("#errormsg").addClass('alert alert-success').removeClass('display-hide alert-danger').html('Selected '+word+' changed to popular dish successfully');
								else if(changestatusval == 'No')
									$("#errormsg").addClass('alert alert-success').removeClass('display-hide alert-danger').html('Selected '+word+' changed to normal dish successfully');
								else
									$("#errormsg").addClass('alert alert-danger').removeClass('display-hide alert-success').html('Error');
							});
						}else{
							alert("error");return false;
						} 
                	});
				}
		}
	}else{
		alert("Please select anyone record then proceed.")
	}
}

//To change the status for refundRequest
function changeStatusForRefund(selected,fieldname,whereField,tablename,word,id)
    {    
        if(id != '')
        {
             if(confirm('Are you sure want Change the Status to '+selected+'?'))
             {
                if(selected == 'Declined')
                {
                    $("#refundRequest_open").modal('show');
                    $.post('adminAjaxAction.php',{'postid':id,'action':'Declined'},function(data){	
                    $("#refundRequest").html(data);
        			
                    return false;
                    });
                    
                    return false;
                }
            	$.post("adminAjaxFile.php", { 'selected':selected, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'id': id, 'action':'refundStatusChange'  },function(response){
            			$("#loading-image").show();
	                   if(response == "success")
	                   {
	                   		$("#loading-image").hide();
	                    	$("#errormsg").addClass('alert alert-success').removeClass('display-hide alert-danger').html(word+' Status changed successfully');
	    					window.location.reload();
	                   }
            	   });
             }        
        }
        return false;        
    }

// Close Refund cancel Popup
function closerefundCancelPopup(){
       $("#refundRequest_open").modal('hide');
}

// SMTP Show and hide Information
function showDiv (option) {
	if(option == 'smtp')
		$("#smtpInfo").show();
	else if(option == 'normal')
		$("#smtpInfo").hide();
}
// Category add and edit process based on category
function categoryLangEdit(lang, id, type)
{   
	var mcatid 		= $("#mcatid").val();
	var sel_lang 	= $("#sel_lang").val();
	var page 		= $("#page").val();

	// alert("page==>"+page+"----------mcatid==>"+mcatid+"-----------sel_lang==>"+sel_lang+"lang===>"+lang);
	if(lang != '' && type == 'main')
		window.location="mainCategoryAddEdit.php?meid="+id+"&lang_code="+lang+((sel_lang != '') ? "&sel_lang="+sel_lang : '')+((page != '') ? "&page="+page : '');
	else if(lang != '' && type == 'sub')
		{
			// window.location="categoryAddEdit.php"+((page != '') ? "?page="+page : '')+((mcatid != '') ? "&mcatid="+mcatid+"&eid="+id+"&lang_code="+lang : "&eid="+id+"&lang_code="+lang)+((sel_lang != '') ? "&sel_lang="+sel_lang : '');
			window.location="categoryAddEdit.php"+((page != '') ? "?page="+page : '')+((id != '') ? "&eid="+id : '')+((mcatid != '') ? "&mcatid="+mcatid : '')+((sel_lang != '') ? "&sel_lang="+sel_lang : '')+((lang != '') ? "&lang_code="+lang : '');
		}
	else if(lang != '' && type == 'formfield')
		window.location="categoryAddEdit.php?eid="+id+"&lang_code="+lang;
	else
		alert("error");
}
function formfieldLangEdit(lang, id, ffid, type)
{
	if(lang != '' && type == 'formfield' && id != '' && ffid != '')
		window.location="formFieldAddEdit.php?eid="+id+"&ffid="+ffid+"&lang_code="+lang;
	else
		alert("error");
}

function siteSeetingValidation() {
    $("#errormsg").removeClass('successmsg');
    var admin_name        = $.trim($("#admin_name").val());
    var admin_email       = $.trim($("#admin_email").val());
    var site_name         = $.trim($("#sitename").val());
    var image_name        = $.trim($("#sitelogo").val());
    var site_fav_icon	  = $.trim($("#site_fav_icon").val());
    var site_address	  = $.trim($("#site_address").val());

    if(admin_name == ''){
        $("#errormsg").addClass('errormsg').html("Please Enter Admin Name");
        $("#admin_name").focus();
        return false;
    }
    if(admin_email == ''){
        $("#errormsg").addClass('errormsg').html("Please Enter Admin Email");
        $("#admin_email").focus();
        return false;
    }

    var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
    var valid = emailRegex.test(admin_email);
    if(!valid){
        $("#errormsg").addClass('errormsg').html("Please Enter Valid Email");
        $("#admin_email").focus();
        return false;
    }
    if(site_name == ''){
        $("#errormsg").addClass('errormsg').html("Please Enter Site Name");
        $("#sitename").focus();
        return false;
    }
    if(image_name != ''){
        var ext = $('#sitelogo').val().split('.').pop().toLowerCase();

        if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
        {$("#errormsg").addClass('errormsg').html("Please Select Valid Image");
            $("#sitelogo").focus();
            return false;
        }
    }

    if(site_fav_icon != ''){
        var ext = $('#site_fav_icon').val().split('.').pop().toLowerCase();

        if($.inArray(ext, ['ico']) == -1)
        {$("#errormsg").addClass('errormsg').html("Please choose correct Format");
            $("#site_fav_icon").focus();
            return false;
        }
    }

    if(site_address == ''){
        $("#errormsg").addClass('errormsg').html("Please Enter site address");
        $("#site_address").focus();
        return false;
    }
}

function paymentSettingValidation()
{
    $("#errormsg").removeClass('successmsg');
    var paypal_mode   = $('.radiobotton:checked').val();
    var paypal_enable = $('input[name="paypal_enable"]:checked').val();

    if(paypal_mode == undefined)
    {
        $("#errormsg").addClass('errormsg').html("Please select paypal payment mode");
        return false;
    }
    if(paypal_mode == 'Live')
    {

        var paypal_url_live  = $.trim($("#paypal_url_live").val());
        var business_live    = $.trim($("#business_live").val());
        if(paypal_url_live == ''){
            $("#errormsg").addClass('errormsg').html("Please enter paypal Url");
            $("#paypal_url_live").focus();
            return false;
        }
        if(business_live == ''){
            $("#errormsg").addClass('errormsg').html("Please enter business account");
            $("#business_live").focus();
            return false;
        }
    }
    else if(paypal_mode == 'Test')
    {

        var paypal_url_test  = $.trim($("#paypal_url_test").val());
        var business_test    = $.trim($("#business_test").val());
        if(paypal_url_test == ''){
            $("#errormsg").addClass('errormsg').html("Please enter paypal Url");
            $("#paypal_url_test").focus();
            return false;
        }
        if(business_test == ''){
            $("#errormsg").addClass('errormsg').html("Please enter business account");
            $("#business_test").focus();
            return false;
        }
    }
}
function statusChange(id, changestaus, field, urlval, action)
{
    $.ajax({
        type   : 'POST',
        url    : jssitebaseUrl+'/'+urlval,
        data   : {id:id, field:field ,changestaus:changestaus,action:action},
        success: function(data){
            //clearConsole();
            $("#"+field+"_"+id).html(data);

        }

    });
    return false;
}

function deleteRecord(id, urlval, action, page, loadDiv)
{
    var str = "Are you sure want to delete this "+action;
    if(confirm(str))
    {
        $("#maska").show();$(".ui-loader").show();
        $.ajax({
            type   : 'POST',
            url    : jssitebaseUrl+'/'+urlval,
            data   : {id:id, page:page, action:action},
            success: function(data){
                $("#ajaxCatePagination").html(data);
                $("#maska").hide();$(".ui-loader").hide();
                $("#"+loadDiv).DataTable({
                    columnDefs: [ { orderable: false, targets: [-1,-2] } ]
                });
                // window.location.reload();
            }
        });return false;
    }
}

function getUploadedFileName(getvalid, replaceid)
{
    var filename = $('#'+getvalid).val().replace(/C:\\fakepath\\/i, '');
    $('#'+replaceid).val(filename);
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var cur_id = $(input).attr("id");
            $("[data-id="+cur_id+"]").attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}