<div class="page-bar">
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>Language Management
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group pull-right">
                                <a class="btn green"  href="<?php echo ADMIN_BASE_URL ?>languages/addEdit">Add New <i class="fa fa-plus"></i></a>
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
                            if(isset($languageList) && !empty($languageList)) {
                                foreach($languageList as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $key +1; ?></td>
                                        <td>
                                            <a href="<?php echo ADMIN_BASE_URL.'languages/addEdit/'.$value['id'] ?>"><?php echo $value['name']; ?></a>
                                        </td>
                                        <td><?php echo $value['code']; ?></td>
                                        <td>
                                            <img src="<?php echo FLAG_LOGO_URL.'/'.$value['flag'] ?>" height="35" width="45%" data-id="flag">
                                        </td>

                                        <td><?php
                                            echo date("d-M-Y H:i:s", strtotime($value['created'])); ?></td>
                                        <td align="center" id="status_<?php echo $value['id'];?>">
                                            <?php if($value['status'] == 1){?>
                                                <button class="btn btn-icon-toggle active" type="button" onclick="statusChange('<?= $value['id'] ?>', '0', 'status', 'languages/ajaxaction', 'languagestatuschange')">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            <?php }else {?>
                                                <button class="btn btn-icon-toggle deactive" type="button" onclick="statusChange('<?= $value['id'] ?>', '1', 'status', 'languages/ajaxaction', 'languagestatuschange')">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            <?php }?>
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
