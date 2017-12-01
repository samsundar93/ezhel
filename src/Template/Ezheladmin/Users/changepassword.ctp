<h3 class="page-title">
    Change Password
</h3>
<div class="page-bar">
</div>

<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-lock"></i>Password
                </div>
            </div>
            <div class="portlet-body form">


                <?php echo $this->Form->create('changepwd',array('name'=>'changepwd',
                    'id'=>'changepwd',
                    'enctype'=>'multipart/form-data',
                    'class'=>'form-horizontal',
                    'onsubmit' => 'return changepassword();'
                ));
                ?>
                    <div class="form-body">
                        <div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>
                        <div id="errormsg"></div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">New Password<span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?php echo $this->Form->input('password',
                                        array('class'=>'form-control'
                                        ,'placeholder'=>'New Password'
                                        ,'id'=>'password'
                                        ,'type'=>'password',
                                        'autocomplete' => 'off'
                                        ,'label'=>false));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Confirm Password<span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?php echo $this->Form->input('confirm_password',
                                        array('class'=>'form-control'
                                        ,'placeholder'=>'Confirm Password'
                                        ,'id'=>'confirm_password'
                                        ,'type'=>'password',
                                            'autocomplete' => 'off'
                                        ,'label'=>false));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <?php echo $this->Form->button('Submit',[
                                    'type'=>'submit',
                                    'class'=>'btn green'
                                ]);?>
                            </div>
                        </div>
                    </div>
                <?php echo $this->Form->end();?>
            </div>
        </div>
    </div>
</div>