<?php if($action == 'statuschange' && $field == 'status') { ?>
    <?php if($status == 'active'){?>
        <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $id ?>', '0', 'status', 'formfields/ajaxLoad', 'status')">
            <i class="fa fa-check"></i>
        </button>
    <?php }else {?>
        <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange('<?= $id ?>', '1', 'status', 'formfields/ajaxLoad', 'status')">
            <i class="fa fa-close"></i>
        </button>
    <?php }?>
    <?php exit();} ?>

<?php

    if($action == 'subcat') { ?>
        <div class="col-md-9">
            <div class="col-md-6 no-padding">
                <?= $this->Form->input('subcat_id', [
                    'type' => 'select',
                    'options' => $subcatList,
                    'empty' => 'Select Sub Category',
                    'onchange' => 'return getSiblingsList(this.value);',
                    'class' => 'form-control',
                    'label' => false
                ]) ?>
            </div>
        </div>

    <?php
    } else if($action == 'sibling') { ?>
        <div class="col-md-9">
            <div class="col-md-6 no-padding">
                <?= $this->Form->input('sibling_id', [
                    'type' => 'select',
                    'options' => $siblingList,
                    'empty' => 'Select Siblings',
                    'class' => 'form-control',
                    'label' => false
                ]) ?>
            </div>
        </div>
        <?php
    }


?>
