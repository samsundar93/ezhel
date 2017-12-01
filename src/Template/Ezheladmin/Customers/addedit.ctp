<div class="page-bar">
</div>

<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-lock"></i><?php echo ((!empty($custEditList['user_id'])) ? 'Edit' : 'Add') ?> Customer
                </div>
            </div>

            <div class="portlet-body form">
                <?php echo $this->Form->create('mcat_addedit_form',array('name'=>'customerFrom',
                    'id'=>'customerFrom',
                    'enctype'=>'multipart/form-data',
                    'class'=>'form-horizontal'
                ));
                ?>
                    <?php echo $this->Form->input('userId',
                        array('id'=>'userId'
                        ,'type'=>'hidden'
                        ,'value'=>((!empty($custEditList['user_id'])) ? $custEditList['user_id'] : '') ));
                    ?>
                    <div class="form-body">
                        <div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>

                        <div id="errormsg"></div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Name<span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?= $this->Form->input('name',[
                                        'type' => 'text',
                                        'id'   => 'name',
                                        'class' => 'form-control',
                                        'placeholder' => 'Name',
                                        'label' => false,
                                        'value'=>((!empty($custEditList['name'])) ? $custEditList['name'] : ''),

                                    ]) ?>
                                    <span class="nameErr"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email<span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?= $this->Form->input('username',[
                                        'type' => 'email',
                                        'id'   => 'username',
                                        'class' => 'form-control',
                                        'placeholder' => 'Username',
                                        'label' => false,
                                        'value'=>((!empty($custEditList['username'])) ? $custEditList['username'] : ''),

                                    ]) ?>
                                    <span class="usernameErr"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Phone Number <span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?= $this->Form->input('phone_number',[
                                        'type' => 'text',
                                        'id'   => 'phone_number',
                                        'class' => 'form-control',
                                        'placeholder' => 'Phone Number',
                                        'label' => false,
                                        'value'=>((!empty($custEditList['phone_number'])) ? $custEditList['phone_number'] : ''),

                                    ]) ?>
                                    <span class="phoneErr"></span>
                                </div>
                            </div>
                        </div>

                        <?php if(!isset($id)) { ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password<span class="color1">*</span></label>
                                <div class="col-md-9">
                                    <div class="col-md-6 no-padding">
                                        <?= $this->Form->input('password',[
                                            'type' => 'password',
                                            'id'   => 'password',
                                            'class' => 'form-control',
                                            'placeholder' => 'Password',
                                            'label' => false,

                                        ]) ?>
                                        <span class="passErr"></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green" onclick="return customerAddEdit()">Submit</button>
                                <a class="btn btn-default" href="<?php echo ADMIN_BASE_URL ?>customers">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function customerAddEdit(){

        var phone_pattern = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/;
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        var name        = $.trim($("#name").val()) ;
        var username        = $.trim($("#username").val()) ;
        var phone_number        = $.trim($("#phone_number").val()) ;
        var password        = $.trim($("#password").val()) ;
        var editedId         = $.trim($("#userId").val()) ;
        $('.error').html('');

        if(name == ''){
            $(".nameErr").addClass('error').html('Please enter your name');
            $("#name").focus();
            return false;

        }else if(username == ''){
            $(".usernameErr").addClass('error').html('Please enter your email address');
            $("#username").focus();
            return false;

        }else if(!regex.test(username)) {
            $(".usernameErr").addClass('error').html('Please enter valid email');
            $("#username").focus();
            return false;

        }else if(phone_number == ''){
            $(".phoneErr").addClass('error').html('Please enter your phone number');
            $("#phone_number").focus();
            return false;

        }else if(!phone_pattern.test( phone_number )) {
            $(".phoneErr").addClass('error').html('Please enter valid phonenumber');
            $("#phone_number").focus();
            return false;

        }else{
            if(editedId == '') {
                if(password == '') {
                    $(".passErr").addClass('error').html('Please enter password');
                    $("#password").focus();
                    return false;
                }
            }
            $.ajax({
                type   : 'POST',
                url    : jssitebaseUrl+'/customers/checkCustomer',
                data   : {id:editedId, phone_number:phone_number,username:username},
                success: function(data){
                    if($.trim(data) == 'false') {
                        $("#errormsg").addClass('error').html('This email or phone number already exists');
                        return false;
                    }else {
                        $("#customerFrom").submit();
                    }

                }
            });return false;

        }
    }
</script>


