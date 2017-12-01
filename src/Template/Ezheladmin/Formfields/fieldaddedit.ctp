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
                <?= $this->Form->create('formField', [
                    'name' => 'form_field_addedit',
                    'id' => 'form_field_addedit',
                    'class' => 'form-horizontal'
                ]) ?>
                <?= $this->Form->input('id', [
                    'type' => 'hidden',
                    'value' => (isset($formData) && (!empty($formData)) ? $formData['id'] : ''),
                    'label' => false
                ]) ?>
                <div class="form-body">
                    <div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>
                    <div id="errormsg"></div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Main Category <span class="red">*</span></label>
                        <div class="col-md-9">
                            <div class="col-md-6 no-padding">
                                <?= $this->Form->input('cat_id', [
                                    'type' => 'select',
                                    'options' => $catList,
                                    'value' => (isset($formData['cat_id']) && (!empty($formData['cat_id'])) ? $formData['cat_id'] : ''),
                                    'empty' => 'Select Main Category',
                                    'class' => 'form-control',
                                    'label' => false
                                ]) ?>
                                <span class="mcatidErr errormsg"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Sub Category <span class="red">*</span></label>
                        <div id="subCatList">
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?php if(isset($formData) && (!empty($formData))) { ?>
                                        <?= $this->Form->input('subcat_id', [
                                            'type' => 'select',
                                            'empty' => 'Select Sub Category',
                                            'options' => (isset($formData['subcat_id']) && (!empty($formData['subcat_id'])) ? $subCatList : ''),
                                            'value' => (isset($formData['subcat_id']) && (!empty($formData['subcat_id'])) ? $formData['subcat_id'] : ''),
                                            'class' => 'form-control',
                                            'label' => false
                                        ]) ?>
                                    <?php }else { ?>
                                        <?= $this->Form->input('subcat_id', [
                                            'type' => 'select',
                                            'empty' => 'Select Sub Category',
                                            'value' => (isset($formData['subcat_id']) && (!empty($formData['subcat_id'])) ? $formData['subcat_id'] : ''),
                                            'class' => 'form-control',
                                            'label' => false
                                        ]) ?>

                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                        <span class="subcatErr errormsg"></span>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Siblings List</label>
                        <div id="siblingList">
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?php if(isset($formData) && (!empty($formData))) { ?>
                                        <?= $this->Form->input('sibling_id', [
                                            'type' => 'select',
                                            'options' => $siblingList,
                                            'value' => (isset($formData) && (!empty($formData)) ? $formData['sibling_id'] : ''),
                                            'label' => false,
                                            'class' => 'form-control',
                                            'empty' => 'Select Siblings'

                                        ]) ?>
                                    <?php }else { ?>
                                        <?= $this->Form->input('sibling_id ', [
                                            'type' => 'select',
                                            'value' => (isset($formData) && (!empty($formData)) ? $formData['id'] : ''),
                                            'label' => false,
                                            'class' => 'form-control',
                                            'empty' => 'Select Siblings'

                                        ]) ?>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <span class="errormsg"></span>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Question<span class="red">*</span></label>
                        <div class="col-md-9">
                            <div class="col-md-6 no-padding">
                                <?= $this->Form->input('question', [
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    #'value' => (isset($formData) && (!empty($formData)) ? $formData['id'] : ''),
                                    'label' => false
                                ]) ?>
                                <span class="questionErr errormsg"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Field Type<span class="red">*</span></label>
                        <div class="col-md-9">
                            <div class="col-md-6 no-padding">
                                <?= $this->Form->input('field_type', [
                                    'type' => 'select',
                                    'options' => $fieldType,
                                    'class' => 'form-control',
                                    #'value' => (isset($formData) && (!empty($formData)) ? $formData['id'] : ''),
                                    'label' => false
                                ]) ?>
                                <span class="mcatidErr errormsg"></span>
                            </div>
                        </div>
                    </div>
                    <div id="appendDiv" style="display: none"><?php
                        if(isset($formData['formfield_answers']) && !empty($formData['formfield_answers'])) {
                            $answerCount   =   0;
                            foreach($formData['formfield_answers'] as $key => $val) { ?>
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label"><?= ($key == 0) ? 'Answer': '' ?></label>
                                    <div class="col-sm-3">
                                        <?php echo $this->Form->input('FormField.'.$answerCount.'.answer',
                                            array('class'=>'form-control'
                                            ,'placeholder'=>'Answer'
                                            ,'type'=>'text'
                                            ,'value'=>$val['answer'],
                                            'class' => 'form-control'
                                            ,'label'=>false));
                                        ?>
                                        <span class="catnameErr errormsg"></span>
                                    </div><?php
                                    if($key == 0) { ?>
                                        <div class="col-sm-1">
                                            <label class="label-name3 moreAnswer" data-add="2">+</label>
                                        </div><?php
                                    } else { ?>
                                        <div class="col-sm-1">
                                            <label class="label-name remove_field" onclick="remove_fieldSiblings(event,this)">x</label>
                                        </div><?php
                                    } ?>
                                </div> <?php
                                $answerCount++;
                            } ?>
                            <input type="hidden" id="answerRowCount" value="<?= $answerCount ?>"><?php
                        } else { ?>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Answer<span class="red"></span></label>
                                <div class="col-md-9">
                                    <div class="col-md-6 no-padding">
                                        <?php echo $this->Form->input('FormField.0.answer',
                                            array('class' => 'form-control'
                                            , 'placeholder' => 'Answer'
                                            , 'id' => 'form_answer'
                                            , 'type' => 'text',
                                            'class' => 'form-control'
                                            , 'label' => false));
                                        ?>
                                        <span class="catnameErr errormsg"></span>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <label class="label-name3 moreAnswer" data-add="2">+</label>
                                </div>
                            </div>
                            <input type="hidden" id="answerRowCount" value="1"><?php
                        } ?>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-5">
                            <?php echo $this->Form->button(((!empty($formData['id'])) ? "Edit" : "Add").' FormField',
                                array('type'=>'submit'
                                ,'class'=>'btn green'
                                ,'onclick'=>'return formFieldsAddEdit();')) ?>
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
        var fieldType  =   $("#field-type").val();
        if(fieldType == 'radio' || fieldType == 'select' || fieldType == 'checkbox') {
            $('#appendDiv').show();
        } else {
            $('#appendDiv').hide();
        }
        $("#field-type").on('click', function() {
            if ($(this).val() == 'radio' || $(this).val() == 'select' || $(this).val() == 'checkbox') {
                $('#appendDiv').show();
            }
            else {
                $('#appendDiv').hide();
            }
        });
        $('#cat-id').on('change', function() {
            var catId   =   $(this).val();
            if(catId != '') {
                $.post(jssitebaseUrl + '/Formfields/ajaxLoad', {'action':'subcat', 'catId':catId}, function(response){
                    $('#subCatList').html(response);
                });
            }
        });

        var appendStart  =   $("[data-add]").attr("data-add");
        var keyId   =   $("#answerRowCount").val();
        $('.moreAnswer').click(function() {

            var updateText   =   '<div id="siblingwrap'+appendStart+'" class="form-group appendAnswer clearfix">'+
                '<div class="form-group">'+
                '<label for="" class="col-sm-4 control-label"></label>'+
                '<div class="col-sm-3">'+
                '<div class="input text">' +
                '<input type="text" name="FormField['+keyId+'][answer]" class="form-control" placeholder="Answer" />' +
                '</div>'+
                '</div>'+
                '<div class="col-sm-1">'+
                '<label class="label-name remove_field" onclick="remove_fieldAnswer(event,this)">x</label>' +
                '</div>'+
                '</div>';

            $('#appendDiv').append(updateText);
            appendStart++;
            keyId++;
        });
    });
    function remove_fieldAnswer(event,id){
        event.preventDefault();
        $(id).parents('.appendAnswer').remove();
    }

    function getSiblingsList(id) {
        if(id != '' && id != 'undefined') {
            $.post(jssitebaseUrl + '/Formfields/ajaxLoad', {'action':'sibling', 'subcatId':id}, function(response){
                $('#siblingList').html(response);
            });
        }
    }

    function formFieldsAddEdit(){
        var cat        = $.trim($("#cat-id").val()) ;
        var subcat       = $.trim($("#subcat-id").val()) ;
        var question         = $.trim($("#question").val()) ;
        var fieldType            = $('#field-type').val();
        $('.error').html('');
        if(cat == ''){
            $(".mcatidErr").addClass('error').html('Please Select the category');
            $("#catname").focus();
            return false;
        }else if(subcat == ''){
            $(".subcatErr").addClass('error').html('Please Select the Subcategory');
            $(".catimage").focus();
            return false;
        }else if(question == ''){
            $(".questionErr").addClass('error').html("Please Enter the Question");
            $(".catimage").focus();
            return false;
        }else{
            $("#form_field_addedit").submit();
        }
    }
</script>
