<?php
/**
 * Created by PhpStorm.
 * User: IlayaPrabu
 * Date: 18-06-2017
 * Time: 16:41
 */
?>

<div id="page-wrapper" >
    <ul class="breadcrumb">
        <li><a href="<?php echo ADMIN_BASE_URL; ?>users/dashboard/">Home</a></li>
        <li class="active">Form Fields Manage</li>
    </ul>
    <div class="card">
        <div class="card-body clearfix">
            <a class="addnewbtn pull-right" href="<?php echo ADMIN_BASE_URL; ?>Formfields/fieldaddedit/">
                <i class="fa fa-plus"></i> Add New
            </a>

            <?= $this->Flash->render() ?>
            <div class="table-responsive" id="ajaxCatePagination">
                <table id="mainCatTable" class="table table-striped">
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
                            <tr id="delete_"<?= $value['id'] ?>>
                                <td><?php echo $key +1; ?></td>
                                <td><?php echo $value['question']; ?></td>
                                <td><?php echo $value['field_type']; ?></td>
                                <td><?php
                                    echo date("d-M-Y H:i:s", strtotime($value['created'])); ?></td>
                                <td align="center" id="status_<?php echo $value['id'];?>">
                                    <?php if($value['status'] == 1){?>
                                        <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $value['id'] ?>', '1')">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    <?php }else {?>
                                        <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange(<?= $value['id'] ?>, '0')">
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
<script>
    $(document).ready(function(){
        $('#mainCatTable').DataTable();
    });

    function statusChange(id, val) {
        if(id != '' && id != 'undefined') {
            $.post(adminUrl + 'Formfields/ajaxLoad', {'action':'status', 'formId':id, 'status': val}, function(response){

            });
        }
    }
    function deleteFormField(id) {
        if(id != '' && id != 'undefined') {
            $.post(adminUrl + 'Formfields/ajaxLoad', {'action':'delete', 'formId':id}, function(response){
                if($.trim(response) == 'success') {
                    $('#delete_'+id).remove();
                }
            });
        }
    }
</script>
