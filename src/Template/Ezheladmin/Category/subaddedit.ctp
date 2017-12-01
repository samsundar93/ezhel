<div class="page-bar">
</div>

<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-sitemap"></i> <?php echo ((!empty($subEditCatList[0]['id'])) ? 'Edit' : 'Add') ?> Sub Category
                </div>
            </div>
            <div class="portlet-body form">

                <?php echo $this->Form->create('scat_addedit_form',array('name'=>'scat_addedit_form',
                    'id'=>'scat_addedit_form',
                    'enctype'=>'multipart/form-data',
                    'class'=>'form-horizontal'));
                ?>
                    <?php echo $this->Form->input('editid',
                        array('id'=>'editid'
                        ,'type'=>'hidden'
                        ,'value'=>((!empty($subEditCatList[0]['id'])) ? $subEditCatList[0]['id'] : '') ));
                    ?>

                    <div class="form-body">
                        <div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>
                        <div id="errormsg"></div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Select Main Category <span class="red">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <select class="selectpicker form-control" name="mcatid" id="mcatid">
                                        <option value="">Select Business Type</option>
                                        <?php foreach ($mainCatList as $key => $value) { ?>
                                            <option value="<?php echo $value['id'] ?>" <?php echo ( ((!empty($subEditCatList[0]['main_category_id']) && $subEditCatList[0]['main_category_id'] == $value['id']) || ($mcatid == $value['id'])) ? 'selected' : ''); ?>><?php echo $value['maincatname']; ?></option>
                                        <?php }?>

                                    </select>
                                    <span class="mcatidErr errormsg"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Sub Category <span class="red">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?php echo $this->Form->input('catname',
                                        array('class'=>'form-control'
                                        ,'placeholder'=>'Sub Category'
                                        ,'id'=>'catname'
                                        ,'type'=>'text'
                                        ,'value'=>((!empty($subEditCatList[0]['catname'])) ? $subEditCatList[0]['catname'] : '')
                                        ,'label'=>false,
                                            'min'=>0));
                                    ?>
                                    <span class="catnameErr errormsg"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Do have a Siblings</label>
                            <?php
                            $checkYes = $checkNo = '';
                            if(isset($subEditCatList[0]['need_siblings'])) {
                                if($subEditCatList[0]['need_siblings'] == 'Yes') {
                                    $checkYes  =   'checked';
                                } else {
                                    $checkNo  =   'checked';
                                }
                            }
                            ?>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input class="radiobotton" type="radio" <?= $checkYes ?> name="need_siblings" id="sibling_yes" value="Yes"> Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input class="radiobotton" type="radio" <?= $checkNo ?> name="need_siblings" id="sibling_no" value="No" /> No
                                        </label>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div id="appendDiv" style="display: none;"><?php
                            if(isset($subEditCatList[0]['siblings']) && !empty($subEditCatList[0]['siblings'])) {
                                $siblingCount   =   0;
                                foreach($subEditCatList[0]['siblings'] as $key => $val) { ?>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"><?= ($key == 0) ? 'Sibling Name': '' ?></label>
                                        <div class="col-md-9">
                                            <div class="col-md-5 no-padding">
                                                <?php echo $this->Form->input('Siblings.'.$siblingCount.'.Siblings',
                                                    array('class'=>'form-control'
                                                    ,'placeholder'=>'Sibling Name'
                                                    ,'id'=>'siblingName'
                                                    ,'type'=>'text'
                                                    ,'value'=>$val['sibling']
                                                    ,'label'=>false));
                                                ?>
                                                <span class="catnameErr errormsg"></span>
                                            </div>
                                        </div>
                                        <?php
                                        if($key == 0) { ?>
                                            <div class="col-sm-1">
                                                <label class="label-name3 moreSiblings" data-add="2">+</label>
                                            </div><?php
                                        } else { ?>
                                            <div class="col-sm-1">
                                                <label class="label-name remove_field" onclick="remove_fieldSiblings(event,this)">x</label>
                                            </div><?php
                                        } ?>
                                    </div> <?php
                                    $siblingCount++;
                                } ?>
                                <input type="hidden" id="siblingrowCount" value="<?= $siblingCount ?>"><?php
                            } else { ?>
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Sibling Name<span class="red"></span></label>
                                    <div class="col-md-9">
                                        <div class="col-md-5 no-padding">
                                            <?php echo $this->Form->input('Siblings.0.Siblings',
                                                array('class' => 'form-control'
                                                , 'placeholder' => 'Sibling Name'
                                                , 'id' => 'siblingName'
                                                , 'type' => 'text'
                                                    #,'value'=>((!empty($subEditCatList[0]['catname'])) ? $subEditCatList[0]['catname'] : '')
                                                , 'label' => false));
                                            ?>
                                            <span class="catnameErr errormsg"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <label class="label-name3 moreSiblings" data-add="2">+</label>
                                    </div>
                                </div>
                                <input type="hidden" id="siblingrowCount" value="1"><?php
                            } ?>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sub Category Photo</label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?php echo $this->Form->input('subcat_photo',
                                        array('class'=>''
                                        ,'id'=>'subcat_photo'
                                        ,'type'=>'file'
                                        ,'onchange' => 'getUploadedFileName("subcat_photo","subcat_photoid");readURL(this);'
                                        ,'value'=>((!empty($subEditCatList[0]['subcat_photo'])) ? $subEditCatList[0]['subcat_photo'] : '')
                                        ,'label'=>false));
                                    ?>
                                    <span class="subcat_photoErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <?php if(!empty($subEditCatList[0]['subcat_photo'])) {; ?> <img src="<?php echo BASE_URL.'images/subcategory/'.$subEditCatList[0]['subcat_photo'] ?>" height="200" width="100%" data-id="subcat_photo">
                                    <?php }else{ ?>
                                        <img data-id="subcat_photo" src="<?php echo ADMIN_IMG;?>noaadhar.jpg" alt="PAN card" height="200" width="100%" onerror="this.src='<?php echo ADMIN_IMG;?>noaadhar.jpg'"/>
                                    <?php }?>
                                </div>
                            </div>
                        </div>



                    </div>


                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">

                                <?php echo $this->Form->button(((!empty($subEditCatList[0]['id'])) ? "Edit" : "Add").' Sub Category',
                                    array('type'=>'submit'
                                    ,'class'=>'btn green'
                                    ,'onclick'=>'return scatAddEditValidation();'))?>

                                <a class="btn btn-default" href="<?php echo ADMIN_BASE_URL ?>category/subcategory">Cancel</a>
                            </div>
                        </div>
                    </div>
                <?php echo $this->Form->end();?>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function() {
        var havesibling  =   $("input[name='need_siblings']:checked").val();
        if(havesibling == 'Yes') {
            $('#appendDiv').show();
        } else {
            $('#appendDiv').hide();
        }
        $('input[name="need_siblings"]').on('click', function() {
            if ($(this).val() == 'Yes') {
                $('#appendDiv').show();
            }
            else {
                $('#appendDiv').hide();
            }
        });
        var appendStart  =   $("[data-add]").attr("data-add");
        var keyId   =   $("#siblingrowCount").val();
        $('.moreSiblings').click(function() {

            var updateText   =   '<div id="siblingwrap'+appendStart+'" class="form-group appendsiblings clearfix">'+
                '<div class="form-group">'+
                '<label for="" class="col-sm-4 control-label"></label>'+
                '<div class="col-sm-3">'+
                '<div class="input text">' +
                '<input type="text" name="Siblings['+keyId+'][Siblings]" class="form-control" placeholder="Sibling Name" />' +
                '</div>'+
                '</div>'+
                '<div class="col-sm-1">'+
                '<label class="label-name remove_field" onclick="remove_fieldSiblings(event,this)">x</label>' +
                '</div>'+
                '</div>';

            $('#appendDiv').append(updateText);
            appendStart++;
            keyId++;
        });
    });
    function remove_fieldSiblings(event,id){
        event.preventDefault();
        $(id).parents('.appendsiblings').remove();
    }

    function scatAddEditValidation()
    {
        var mcatid 				= $.trim($("#mcatid").val());
        var catname 			= $.trim($("#catname").val());
        var payper_lead_price 	= $.trim($("#payper_lead_price").val());
        var editid 				= ($.trim($("#editid").val()) != '') ? $.trim($("#editid").val()) : '';

        $(".errormsg").html("");
        if(mcatid == '')
        {
            $(".mcatidErr").addClass("errormsg").html("Please Select Main Category");
            $("#mcatid").focus();
            return false;
        }
        else if(catname == '')
        {
            $(".catnameErr").addClass("errormsg").html("Please Enter Sub Category");
            $("#catname").focus();
            return false;
        }
        else{
            $('.catnameErr').html("");
            $("#maska").show();$(".ui-loader").show();
            var action = 'subcategory';
            $.ajax({
                type   : 'POST',
                url    : jssitebaseUrl+'/category/checkCat',
                data   : {catname:catname ,mcatid:mcatid ,editid:editid,action:action},
                success: function(data){

                    //alert(data);return false;
                    $("#maska").hide();$(".ui-loader").hide();

                    if($.trim(data) == 'succ')
                        $("#scat_addedit_form").submit();
                    else if($.trim(data) == 'exist')
                    {
                        $(".catnameErr").addClass("errormsg").html("Main Category is Already Exist");
                        $("#catname").focus();
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


