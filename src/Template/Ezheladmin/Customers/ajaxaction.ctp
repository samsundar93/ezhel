<?php if($action == 'custstatuschange' && $field == 'status') { ?>
    <?php if($status == 'active'){?>
        <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $id ?>', '0', '<?= $field ?>', 'customers/ajaxaction', 'custstatuschange')">
            <i class="fa fa-check"></i>
        </button>
    <?php }else {?>
        <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange('<?= $id ?>', '1', '<?= $field ?>', 'customers/ajaxaction', 'custstatuschange')">
            <i class="fa fa-close"></i>
        </button>
    <?php }?>
    <?php exit();} ?>

<?php if($action == 'custManage') {?>
    <table id="customerTable" class="table table-striped">
        <thead>
        <tr>
            <th>S. No</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Customer Phone</th>
            <th>Added Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($customerList) && !empty($customerList)) {
            foreach($customerList as $key => $value) { ?>
                <tr>
                    <td><?php echo $key +1; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['username']; ?></td>
                    <td><?php echo $value['phone_number']; ?></td>
                    <td><?php
                        echo date("d-M-Y H:i:s", strtotime($value['created'])); ?></td>
                    <td align="center" id="status_<?php echo $value['id'];?>">
                        <?php if($value['status'] == 1){?>
                            <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $value['id'] ?>', '0', 'status', 'customers/ajaxaction', 'custstatuschange')">
                                <i class="fa fa-check"></i>
                            </button>
                        <?php }else {?>
                            <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange('<?= $value['id'] ?>', '1', 'status', 'customers/ajaxaction', 'custstatuschange')">
                                <i class="fa fa-close"></i>
                            </button>
                        <?php }?>
                    </td>
                    <td>
                        <a href="<?php echo ADMIN_BASE_URL; ?>customers/addedit<?php echo ((!empty($value['id'])) ? '/'.$value['id'] : '');?>" class="btn btn-icon-toggle" data-original-title="Edit" data-placement="top" data-toggle="tooltip" id="<?php echo $value['id']; ?>" >
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button class="btn btn-icon-toggle" data-original-title="Delete" data-placement="top" data-toggle="tooltip" type="button" id="<?php echo $value['id']; ?>" onclick="return deleteRecord(<?php echo $value['id']; ?>, 'customers/deletecust', 'Customer', '', 'customerTable')">
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
    <?php exit();} ?>
