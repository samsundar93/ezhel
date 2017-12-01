<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>



    <link rel="shortcut icon" href="{$SITE_IMAGE_URL}/favicon.ico"/>
</head>

<body class="login">

<div class="logo">

</div>

<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form name="loginfrm" method="post" onsubmit="return loginValidate();">
        <h3 class="form-title text-center">LOGIN</h3>

        <div id="error_msg" style="color:red; margin-bottom:10px;"></div>

        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" autocomplete="off" placeholder="Username" type="text" name="admin_username" id="admin_username" value="" />
            </div>
            <script>document.loginfrm.admin_username.focus();</script>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" placeholder="Password" name="admin_password" id="admin_password" value="" autocomplete="off" />
            </div>
        </div>
        <div class="text-center">
            <!--<label class="checkbox"><input type="checkbox" name="remember" value="1"/> Remember me </label>-->
            <button type="submit" class="btn green-haze">
                Login <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>

    </form>

</div>


<!-- END PAGE LEVEL SCRIPTS -->


<script type="text/javascript">
    function loginValidate(){

        var admin_username = $("#admin_username").val();
        var admin_password = $("#admin_password").val();

        if(admin_username == ''){
            $("#error_msg").html("Please Enter Your Name");
            $("#admin_username").focus();
            return false;
        }else if(admin_password == ''){
            $("#error_msg").html("Please Enter Your Password");
            $("#admin_password").focus();
            return false;
        }else{
            $.ajax({
                type: 'POST',
                url    : jssitebaseUrl+'/users/adminLoginValidation',
                data   : {username:admin_username, password:admin_password, action:'adminLoginValidation'},
                success: function(data){
                    // alert(data);
                    if(data == 0){
                        $("#error_msg").html("Invalid Login");
                        $("#password").focus();
                        return false;
                    }else {
                        window.location.href = jssitebaseUrl+'/users/dashboard';
                        return false;
                    }
                }
            });
            return false;
        }
    }
</script>
</body>

</html>