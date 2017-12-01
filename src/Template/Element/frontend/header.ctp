<header>
    <div class="container">
        <div class="row">
            <a class="logo" href="<?php echo BASE_URL ?>"><h1>EZHEL</h1></a>
            <!-- <span id="showRightPush" class="toogle navSlideMenu hidden-sm hidden-md hidden-lg"> <i class="fa fa-bars"></i></span> -->
            <ul class="headerlist pull-right hidden-xs">
                <li><a target="_blank" href="<?php echo BASE_URL ?>partners/signup">Join Us a Professional</a></li>
                <?php if(isset($logginUser) && empty($logginUser)) { ?>
                    <li><a data-toggle="modal" data-target="#login_modal">Login</a></li>
                    <li><a data-toggle="modal" data-target="#signup_pop">Signup</a></li>
                <?php }else if($logginUser['role_id'] == '5'){ ?>
                    <li><a href="<?php echo BASE_URL ?>customers/dashboard">Myaccount</a></li>
                    <li><a href="<?php echo BASE_URL ?>users/customerLogout">Logout</a></li>
                <?php }else { ?>
                    <li><a href="<?php echo BASE_URL ?>partners/dashboard">Myaccount</a></li>
                    <li><a href="<?php echo BASE_URL ?>partners/partnerLogout">Logout</a></li>
                <?php } ?>
                <li>
                    <?= $this->Form->input('cat_id', [
                        'type' => 'select',
                        'options' => $languageList,
                        'value' => $this->request->session()->read('sessionLang'),
                        'class' => 'form-control',
                        'onchange' => 'return selectLanguage(this.value)',
                        'label' => false
                    ]) ?>
                </li>
            </ul>

        </div>
    </div>
    <!--  <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
     <span id="menuHide" class="navSlideMenuClose"><i class="fa fa-window-close" aria-hidden="true"></i></span>
     <a class="SlideMenuClose" href="#">Join Us a Professional</a>
     <a class="SlideMenuClose" href="#">Login/Signup</a>
   </nav> -->
</header>




<div class="modal fade" id="login_modal" role="dialog">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body clearfix">
                <section class="login-popup">
                    <div class="signin-txt">Sign in</div>
                    <div class="col-xs-12">
                        <span id="loginErr"></span>
                        <?php echo $this->Form->create('login_form',array('name'=>'login_form',
                            'class'=>'',
                        ));
                        ?>
                            <div class="signin-box">
                                <div class="form-group">
                                    <label class="form-label">Email<span class="mand-star">&#42;</span></label>
                                    <input type="text" class="form-control myform-control" placeholder="Enter Email id" id="username">
                                    <span id="userErr"></span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Password<span class="mand-star">&#42;</span></label>
                                    <input type="password" class="form-control myform-control" placeholder="Enter Password" id="password" autocomplete="off">
                                    <span id="passErr"></span>
                                </div>
                                <div class="forget-sec">
                                    <span class="pull-left remember-me"><input type="checkbox"> Remember me on this computer</span>
                                    <span class="pull-right forget-pwd"><a href="javascript;">Forgot Password?</a></span>
                                </div>
                                <div class="text-center">
                                    <input type="submit" onclick="return submitLogin()" class="btn signup-btn" value="SIGN IN">
                                </div>
                            </div>
                        <?php echo $this->Form->end();?>
                    </div>
                    <div class="donthave">Don't have an account yet? <a href="">Sign up.</a></div>
                </section>
            </div>
        </div>

    </div>
</div>

<script>
    function selectLanguage(lang) {
        $.ajax({
            type   : 'POST',
            url    : jssitebaseUrl+'users/setLanguage',
            data   : {lang:lang},
            success: function(data){
               window.location.reload();
               return false;

            }
        });return false;
    }
</script>