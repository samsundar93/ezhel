<?php if($action == 'languagestatuschange' && $field == 'status') { ?>
    <?php if($status == 'active'){?>
        <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $id ?>', '0', 'status', 'languages/ajaxaction', 'languagestatuschange')">
            <i class="fa fa-check"></i>
        </button>
    <?php }else {?>
        <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange('<?= $id ?>', '1', 'status', 'languages/ajaxaction', 'languagestatuschange')">
            <i class="fa fa-close"></i>
        </button>
    <?php }?>
    <?php exit();} ?>