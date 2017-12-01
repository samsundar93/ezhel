<h3 class="page-title">
    {if isset($smarty.get.pckid) and  $smarty.get.pckid neq ''}Edit Package{else}Add New Package{/if}
</h3>
<div class="page-bar">
</div>

<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-save"></i>{if isset($smarty.get.pckid) and $smarty.get.pckid neq ''}Edit Package{else}Add New Package{/if}
                </div>
            </div>
            <div class="portlet-body form">

                <?php echo $this->Form->create('mcat_addedit_form',array('name'=>'mcat_addedit_form',
                    'id'=>'mcat_addedit_form',
                    'enctype'=>'multipart/form-data',
                    'class'=>'form-horizontal',
                    'onsubmit'=>'return memberAddEditValidation();'
                ));
                ?>
                    <?php echo $this->Form->input('editid',
                        array('id'=>'editid'
                        ,'type'=>'hidden'
                        ,'value'=>((!empty($membershipsList['id'])) ? $membershipsList['id'] : '') ));
                    ?>
                    <div class="form-body">
                        <div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>
                        <div id="errormsg"></div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Package Name <span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?= $this->Form->input('package_name',[
                                        'type' => 'text',
                                        'id'   => 'package_name',
                                        'class' => 'form-control',
                                        'placeholder' => 'Package Name',
                                        'label' => false,
                                        'value'=>((!empty($membershipsList['package_name'])) ? $membershipsList['package_name'] : ''),

                                    ]) ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Amount<span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <?= $this->Form->input('amount',[
                                        'type' => 'text',
                                        'id'   => 'amount',
                                        'class' => 'form-control',
                                        'placeholder' => 'Amount',
                                        'label' => false,
                                        'value'=>((!empty($membershipsList['amount'])) ? $membershipsList['amount'] : ''),

                                    ]) ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Package Description<span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <textarea class="form-control" name="description" id="description"><?php echo ((!empty($membershipsList['description'])) ? $membershipsList['description'] : '') ?></textarea>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a class="btn btn-default" href="<?php echo ADMIN_BASE_URL?>memberships">Cancel</a>
                            </div>
                        </div>
                    </div>
                <?php echo $this->Form->end();?>
            </div>
        </div>
    </div>
</div>


