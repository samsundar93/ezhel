<div class="page-bar">
</div>

<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>Customer Management
                </div>
            </div>
            <div class="portlet-body">
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right">
                                    <a class="btn green" href="<?php echo ADMIN_BASE_URL ?>serviceproviders/addedit" >Add New <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="display-hide" id="errormsg"></div>
                    <?= $this->Flash->render() ?>
                    <div class="table-responsive" id="ajaxCatePagination">
                        <table id="customerTable" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Service Provider Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Added Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($serviceprovidersList) && !empty($serviceprovidersList)) {
                                foreach($serviceprovidersList as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $key +1; ?></td>
                                        <td><?php echo $value['firstname'] .''.$value['lastname']; ?></td>
                                        <td><?php echo $value['username']; ?></td>
                                        <td><?php echo $value['phone_number']; ?></td>
                                        <td><?php
                                            echo date("d-M-Y H:i:s", strtotime($value['created'])); ?></td>
                                        <td align="center" id="status_<?php echo $value['id'];?>">
                                            <?php if($value['status'] == 1){?>
                                                <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $value['id'] ?>', '0', 'status', 'serviceproviders/ajaxaction', 'custstatuschange')">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            <?php }else {?>
                                                <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange('<?= $value['id'] ?>', '1', 'status', 'serviceproviders/ajaxaction', 'custstatuschange')">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <a href="<?php echo ADMIN_BASE_URL; ?>serviceproviders/addedit<?php echo ((!empty($value['id'])) ? '/'.$value['id'] : '');?>" class="btn btn-icon-toggle" data-original-title="Edit" data-placement="top" data-toggle="tooltip" id="<?php echo $value['id']; ?>" >
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button class="btn btn-icon-toggle hide" data-original-title="Delete" data-placement="top" data-toggle="tooltip" type="button" id="<?php echo $value['id']; ?>" onclick="return deleteRecord(<?php echo $value['id']; ?>, 'customers/deletecust', 'Customer', '', 'customerTable')">
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
</div>

<script>
    $(document).ready(function(){
        $('#customerTable').DataTable();
    });
</script>


