<div class="page-bar">
</div>

<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <?php echo ((!empty($languageList['id'])) ? 'Edit' : 'Add') ?> Language
                </div>
            </div>
            <div class="portlet-body form">

                <?php echo $this->Form->create('mcat_addedit_form',array('name'=>'mcat_addedit_form',
                    'id'=>'mcat_addedit_form',
                    'enctype'=>'multipart/form-data',
                    'class'=>'form-horizontal',
                    'onsubmit'=>'return languageAddEditValidation();'
                ));
                ?>
                    <?php echo $this->Form->input('editid',
                        array('id'=>'editid'
                        ,'type'=>'hidden'
                        ,'value'=>((!empty($languageList['id'])) ? $languageList['id'] : '') ));
                    ?>
                    <div class="form-body">
                        <div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>
                        <div id="errormsg"></div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Language Name <span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?= $this->Form->input('name',[
                                        'type' => 'text',
                                        'id'   => 'name',
                                        'class' => 'form-control',
                                        'placeholder' => 'Name',
                                        'label' => false,
                                        'value'=>((!empty($languageList['name'])) ? $languageList['name'] : ''),

                                    ]) ?>
                                </div>


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Language Code <span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?= $this->Form->input('code',[
                                        'type' => 'text',
                                        'id'   => 'code',
                                        'class' => 'form-control',
                                        'placeholder' => 'Code',
                                        'label' => false,
                                        'value'=>((!empty($languageList['code'])) ? $languageList['code'] : ''),

                                    ]) ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Flag</label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?php echo $this->Form->input('flag',
                                        array('class'=>''
                                        ,'id'=>'flag'
                                        ,'type'=>'file'
                                        ,'onchange' => 'getUploadedFileName("flag","flagid");readURL(this);'
                                        ,'value'=>((!empty($languageList['flag'])) ? $languageList['flag'] : '')
                                        ,'label'=>false));
                                    ?>
                                    <span class="flagErr"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <?php if(!empty($languageList['flag'])) {; ?> <img src="<?php echo FLAG_LOGO_URL.'/'.$languageList['flag'] ?>" height="200" width="100%" data-id="flag">
                                <?php }else{ ?>
                                    <img data-id="flag" src="<?php echo ADMIN_IMG;?>noaadhar.jpg" alt="PAN card" height="200" width="100%" onerror="this.src='<?php echo ADMIN_IMG;?>noaadhar.jpg'"/>
                                <?php }?>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a class="btn btn-danger" href="<?php echo ADMIN_BASE_URL?>languages"> Cancel</a>
                            </div>
                        </div>
                    </div>
                <?php echo $this->Form->end();?>
            </div>
        </div>
    </div>
</div>

<script>
    function languageAddEditValidation()
    {
        var name 	= $.trim($("#name").val());
        var code 	= $.trim($("#code").val());
        var editid 			= ($.trim($("#editid").val()) != '') ? $.trim($("#editid").val()) : '';

        if(name == '')
        {
            $("#errormsg").addClass("errormsg").html("Please Enter Language Name");
            $("#name").focus();
            return false;
        }else if(code == '')
        {
            $(".codeErr").addClass("errormsg").html("Please Enter Language Code");
            $("#code").focus();
            return false;
        }
        else{
            $('#errormsg').html("");
            $("#maska").show();$(".ui-loader").show();
            var action = 'maincategory';
            $.ajax({
                type   : 'POST',
                url    : jssitebaseUrl+'/languages/checkLang',
                data   : {name: name,code: code,editid:editid,action:action},
                success: function(data){

                    if($.trim(data) == 'succ'){
                        document.mcat_addedit_form.submit();
                    }

                    else if($.trim(data) == 'exist')
                    {
                        $("#errormsg").addClass("errormsg").html("Language is Already Exist");
                        $("#name").focus();
                        return false;
                    }
                    else{
                        alert('Error');
                    }
                }

            });return false;
        }
    }
</script>