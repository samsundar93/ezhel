<?php if($action == 'subcatstatuschange' && $field == 'status') { ?>
    <?php if($status == 'active'){?>
        <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $id ?>', '0', 'status', 'category/ajaxaction', 'subcatstatuschange')">
            <i class="fa fa-check"></i>
        </button>
    <?php }else {?>
        <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange('<?= $id ?>', '1', 'status', 'category/ajaxaction', 'subcatstatuschange')">
            <i class="fa fa-close"></i>
        </button>
    <?php }?>
    <?php exit();} ?>



<?php if($action == 'SubCategories') { ?>
    <table id="catTable" class="table table-striped">
        <thead>
        <tr>
            <th>S. No</th>
            <th>Category Name</th>
            <th>Added Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($catList) && !empty($catList)) {
            foreach($catList as $key => $value) { ?>
                <tr>
                    <td><?php echo $key +1; ?></td>
                    <td><?php echo $value['catname']; ?></td>
                    <td><?php
                        echo date("d-M-Y H:i:s", strtotime($value['created'])); ?></td>
                    <td align="center" id="status_<?php echo $value['id'];?>">
                        <?php if($value['status'] == 1){?>
                            <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $value['id'] ?>', '0', 'status', 'category/ajaxaction', 'subcatstatuschange')">
                                <i class="fa fa-check"></i>
                            </button>
                        <?php }else {?>
                            <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange('<?= $value['id'] ?>', '1', 'status', 'category/ajaxaction', 'subcatstatuschange')">
                                <i class="fa fa-close"></i>
                            </button>
                        <?php }?>
                    </td>
                    <td>
                        <a href="<?php echo ADMIN_BASE_URL; ?>category/subaddedit<?php echo ((!empty($value['main_category_id'])) ? '/'.$value['main_category_id'] : '').((!empty($value['id'])) ? '/'.$value['id'] : '');?>" class="btn btn-icon-toggle" data-original-title="Edit" data-placement="top" data-toggle="tooltip" id="<?php echo $value['id']; ?>" >
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button class="btn btn-icon-toggle" data-original-title="Delete" data-placement="top" data-toggle="tooltip" type="button" id="<?php echo $value['id']; ?>" onclick="return deleteRecord(<?php echo $value['id']; ?>, 'category/deletecate', 'SubCategories', '', 'catTable')">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
<?php exit(); } ?>




<?php if($action == 'maincatstatuschange' && $field == 'status') { ?>
    <?php if($status == 'active'){?>
        <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $id ?>', '0', 'status', 'category/ajaxaction', 'maincatstatuschange')">
            <i class="fa fa-check"></i>
        </button>
    <?php }else {?>
        <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange('<?= $id ?>', '1', 'status', 'category/ajaxaction', 'maincatstatuschange')">
            <i class="fa fa-close"></i>
        </button>
    <?php }?>
    <?php exit();} ?>

<?php if($action == 'mainCategories') { ?>
    <div class="table-scrollable">
        <table id="mainCatTable" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>S. No</th>
                <th>Category Name</th>
                <th>Added Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($catList) && !empty($catList)) {
                foreach($catList as $key => $value) { ?>
                    <tr>
                        <td><?php echo $key +1; ?></td>
                        <td><?php echo $value['maincatname']; ?></td>
                        <td><?php
                            echo date("d-M-Y H:i:s", strtotime($value['created'])); ?></td>
                        <td align="center" id="status_<?php echo $value['id'];?>">
                            <?php if($value['status'] == 1){?>
                                <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $value['id'] ?>', '0', 'status', 'category/ajaxaction', 'maincatstatuschange')">
                                    <i class="fa fa-check"></i>
                                </button>
                            <?php }else {?>
                                <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange('<?= $value['id'] ?>', '1', 'status', 'category/ajaxaction', 'maincatstatuschange')">
                                    <i class="fa fa-close"></i>
                                </button>
                            <?php }?>
                        </td>
                        <td>
                            <a href="<?php echo ADMIN_BASE_URL; ?>category/mainaddedit<?php echo ((!empty($value['id'])) ? '/'.$value['id'] : '');?>" class="btn btn-icon-toggle" data-original-title="Edit" data-placement="top" data-toggle="tooltip" id="<?php echo $value['id']; ?>" >
                                <i class="fa fa-pencil"></i>
                            </a>
                            <button class="btn btn-icon-toggle" data-original-title="Delete" data-placement="top" data-toggle="tooltip" type="button" id="<?php echo $value['id']; ?>" onclick="return deleteRecord(<?php echo $value['id']; ?>, 'category/deletecate', 'mainCategories', '', 'mainCatTable')">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php exit(); } ?>
