<?php foreach($formFields as $key => $value) { ?>
    <div class="form-group clearfix">
        <div class="p-l-15"><label><?php echo $value['question'] ?></label></div>
        <?php if($value['field_type'] == 'select') { ?>
            <div class="col-sm-4">
                <div class="child-care-pop">
                    <?php if(!empty($value['formfield_answers'])) { ?>
                        <input type="hidden" value="<?php echo $value['id'] ?>" id="" name="question[]">
                    <select name="answers_<?php echo $value['id'] ?>[]" class="form-control selectButton" id="selectContent_<?php echo $value['id'] ?>">
                        <option value="">Please Select</option>
                            <?php foreach ($value['formfield_answers'] as $akey => $avalue) { ?>
                                    <option value="<?php echo $avalue['answer'] ?>"><?php echo $avalue['answer'] ?></option>

                            <?php } ?>
                    </select>
                    <?php } ?>
                </div>
            </div>
        <?php }else if($value['field_type'] == 'radio') { ?>

            <?php if(!empty($value['formfield_answers'])) { ?>
                <div class="child-care-pop">
                    <input type="hidden" value="<?php echo $value['id'] ?>" id="" name="question[]">
                    <?php foreach ($value['formfield_answers'] as $akey => $avalue) { ?>
                        <input type="radio" class="radioButton"  name="answers_<?php echo $avalue['field_id']; ?>" id="sixmonth_<?php echo $avalue['id']; ?>" value="<?php echo $avalue['answer'] ?>">
                        <label for="sixmonth_<?php echo $avalue['id']; ?>"><?php echo $avalue['answer'] ?></label>
                    <?php } ?>
            </div>
            <?php }?>

        <?php }else if($value['field_type'] == 'textarea') { ?>

            <input type="hidden" value="<?php echo $value['id'] ?>" id="" name="question[]">
            <textarea name="answers_<?php echo $value['id'] ?>[]" class="form-control textareaButton" id="textContent_<?php echo $value['id'] ?>" rows="5"></textarea>

        <?php }else if($value['field_type'] == 'checkbox') { ?>
            <div class="child-care-pop">
                <input type="hidden" value="<?php echo $value['id'] ?>" id="" name="question[]">
                <?php foreach ($value['formfield_answers'] as $akey => $avalue) { ?>
                    <input type="checkbox" class="checkboxButton" name="answers_<?php echo $avalue['field_id']; ?>[]" id="checkboxQuestion_<?php echo $avalue['field_id']; ?>" value="<?php echo $avalue['answer'] ?>"> <?php echo $avalue['answer'] ?>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>
<?php exit(); ?>