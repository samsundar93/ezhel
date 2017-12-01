<div class="page-bar">
</div>

<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>Form Fields
                </div>
            </div>
            <div class="portlet-body">
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <a class="btn green" href="<?php echo ADMIN_BASE_URL ?>Formfields/fieldaddedit">Add New <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="display-hide" id="errormsg"></div>
                    <?= $this->Flash->render() ?>
                    <div class="table-responsive" id="ajaxCatePagination">
                        <div class="table-scrollable">
                            <table id="mainCatTable" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Question</th>
                                    <th>Field Type</th>
                                    <th>Added Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($formData) && !empty($formData)) {
                                    foreach($formData as $key => $value) { ?>
                                        <tr id="delete_<?php echo $value['id'] ?>" >
                                            <td><?php echo $key +1; ?></td>
                                            <td><?php echo $value['question']; ?></td>
                                            <td><?php echo $value['field_type']; ?></td>
                                            <td><?php
                                                echo date("d-M-Y H:i:s", strtotime($value['created'])); ?></td>
                                            <td align="center" id="status_<?php echo $value['id'];?>">
                                                <?php if($value['status'] == 1){?>
                                                    <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $value['id'] ?>', '0', 'status', 'formfields/ajaxLoad', 'status')">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                <?php }else {?>
                                                    <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange('<?= $value['id'] ?>', '1', 'status', 'formfields/ajaxLoad', 'status')">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                <?php }?>
                                            </td>
                                            <td>
                                                <a href="<?php echo ADMIN_BASE_URL; ?>Formfields/fieldaddedit<?php echo ((!empty($value['id'])) ? '/'.$value['id'] : '');?>" class="btn btn-icon-toggle" data-original-title="Edit" data-placement="top" data-toggle="tooltip" id="<?php echo $value['id']; ?>" >
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button class="btn btn-icon" type="button" onclick="return deleteFormField(<?= $value['id'] ?>)">
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
</div>

<script>

    function statusChange(id, val) {
        if(id != '' && id != 'undefined') {
            $.post(jssitebaseUrl + '/Formfields/ajaxLoad', {'action':'status', 'formId':id, 'status': val}, function(response){

            });
        }
    }
    function deleteFormField(id) {
        if(id != '' && id != 'undefined') {
            $.post(jssitebaseUrl + '/Formfields/ajaxLoad', {'action':'delete', 'formId':id}, function(response){
                if($.trim(response) == 'success') {
                    $('#delete_'+id).remove();
                }
            });
        }
    }
</script>
