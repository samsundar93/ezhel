<?php if($action == 'memberstatuschange' && $field == 'status') { ?>
    <?php if($status == 'active'){?>
        <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $id ?>', '0', 'status', 'memberships/ajaxaction', 'memberstatuschange')">
            <i class="fa fa-check"></i>
        </button>
    <?php }else {?>
        <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange('<?= $id ?>', '1', 'status', 'memberships/ajaxaction', 'memberstatuschange')">
            <i class="fa fa-close"></i>
        </button>
    <?php }?>
    <?php exit();} ?>


<?php if($action == 'membershipsManage') { ?>
    <table id="membershipsTable" class="table table-striped">
        <thead>
        <tr>
            <th>S. No</th>
            <th>Plan Name</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($memberShipsList) && !empty($memberShipsList)) {
            foreach($memberShipsList as $key => $value) { ?>
                <tr>
                    <td><?php echo $key +1; ?></td>
                    <td>
                        <a href="<?php echo ADMIN_BASE_URL.'memberships/addEdit/'.$value['id'] ?>"><?php echo $value['package_name']; ?></a>
                    </td>
                    <td><?php echo $value['amount']; ?></td>


                    <td><?php
                        echo date("d-M-Y H:i:s", strtotime($value['created'])); ?></td>
                    <td align="center" id="status_<?php echo $value['id'];?>">
                        <?php if($value['status'] == 1){?>
                            <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $value['id'] ?>', '0', 'status', 'memberships/ajaxaction', 'memberstatuschange')">
                                <i class="fa fa-check"></i>
                            </button>
                        <?php }else {?>
                            <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange('<?= $value['id'] ?>', '1', 'status', 'memberships/ajaxaction', 'memberstatuschange')">
                                <i class="fa fa-close"></i>
                            </button>
                        <?php }?>
                    </td>
                    <td>
                        <button class="btn btn-icon-toggle" data-original-title="Delete" data-placement="top" data-toggle="tooltip" type="button" id="<?php echo $value['id']; ?>" onclick="return deleteRecord(<?php echo $value['id']; ?>, 'memberships/deletecust', 'Membership', '', 'membershipsTable')">
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