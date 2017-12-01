<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-save"></i>Membership Management
                </div>
            </div>
            <div class="portlet-body">

                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right">
                                    <a class="btn green"  href="<?php echo ADMIN_BASE_URL ?>memberships/addEdit">Add New <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?= $this->Flash->render() ?>
                    <div class="table-responsive" id="ajaxCatePagination">
                        <table id="membershipsTable" class="table table-striped table-bordered table-hover">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('#membershipsTable').DataTable();
    });
</script>