<div class="page-bar">
</div>

<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-sitemap"></i> <?php echo ((!empty($mainEditCatList['id'])) ? 'Edit' : 'Add') ?> Main Category
                </div>
            </div>
            <div class="portlet-body form">

                <?php echo $this->Form->create('mcat_addedit_form',array('name'=>'mcat_addedit_form',
                    'id'=>'mcat_addedit_form',
                    'enctype'=>'multipart/form-data',
                    'class'=>'form-horizontal',
                    'onsubmit'=>'return mcatAddEditValidation();'
                ));
                ?>

                    <?php echo $this->Form->input('editid',
                        array('id'=>'editid'
                        ,'type'=>'hidden'
                        ,'value'=>((!empty($mainEditCatList['id'])) ? $mainEditCatList['id'] : '') ));
                    ?>

                    <div class="form-body">
                        <div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>
                        <div id="errormsg"></div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Main Category Name<span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?php echo $this->Form->input('maincatname',
                                        array('class'=>'form-control'
                                        ,'placeholder'=>'Main Category'
                                        ,'id'=>'maincatname'
                                        ,'type'=>'text'
                                        ,'value'=>((!empty($mainEditCatList['maincatname'])) ? $mainEditCatList['maincatname'] : '')
                                        ,'label'=>false));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Main Category Photo</label>
                        <div class="col-md-9">
                            <div class="col-md-6 no-padding">
                                <?php echo $this->Form->input('maincat_photo',
                                    array('class'=>''
                                    ,'id'=>'maincat_photo'
                                    ,'type'=>'file'
                                    ,'onchange' => 'getUploadedFileName("maincat_photo","maincat_photoid");readURL(this);'
                                    ,'value'=>((!empty($mainEditCatList['maincat_photo'])) ? $mainEditCatList['maincat_photo'] : '')
                                    ,'label'=>false));
                                ?>
                                <span class="maincat_photoErr"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            <?php if(!empty($mainEditCatList['maincat_photo'])) {; ?> <img src="<?php echo BASE_URL.'images/maincategory/'.$mainEditCatList['maincat_photo'] ?>" height="200" width="100%" data-id="maincat_photo">
                            <?php }else{ ?>
                                <img data-id="maincat_photo" src="<?php echo ADMIN_IMG;?>noaadhar.jpg" alt="PAN card" height="200" width="100%" onerror="this.src='<?php echo ADMIN_IMG;?>noaadhar.jpg'"/>
                            <?php }?>
                        </div>
                    </div>


                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <?php echo $this->Form->button(((!empty($mainEditCatList["id"])) ? "Edit" : "Add").' Main Category',
                                    array('type'=>'submit'
                                    ,'class'=>'btn green'))?>
                                <a class="btn btn-default" href="<?php echo ADMIN_BASE_URL ?>category/maincategory">Cancel</a>
                            </div>
                        </div>
                    </div>

                <?php echo $this->Form->end();?>
            </div>

        </div>
    </div>
</div>


<script>

    function mcatAddEditValidation()
    {
        var maincatname 	= $.trim($("#maincatname").val());
        var editid 			= ($.trim($("#editid").val()) != '') ? $.trim($("#editid").val()) : '';

        // alert(maincatname);
        // alert(pid)
        if(maincatname == '')
        {
            $("#errormsg").addClass('errormsg').html("Please Enter Main Category");
            $("#maincatname").focus();
            return false;
        }
        else{
            $('.errormsg').html("");
            $("#maska").show();$(".ui-loader").show();
            var action = 'maincategory';
            $.ajax({
                type   : 'POST',
                url    : jssitebaseUrl+'/category/checkCat',
                data   : {maincatname: maincatname,editid:editid,action:action},
                success: function(data){

                    if($.trim(data) == 'succ'){
                        document.mcat_addedit_form.submit();
                    }

                    else if($.trim(data) == 'exist')
                    {
                        $("#errormsg").addClass('errormsg').html("Main Category is Already Exist");
                        $("#maincatname").focus();
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