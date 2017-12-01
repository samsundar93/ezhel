<h3 class="page-title">
    Site Setting
</h3>
<div class="page-bar">
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt"></i>Site Settings
                </div>
            </div>
            <div class="portlet-body form">
                <?php echo $this->Form->create('site_seeting',array('name'=>'site_seeting',
                    'id'=>'site_seeting',
                    'enctype'=>'multipart/form-data',
                    'class'=>'form-horizontal',
                    'onsubmit' => 'return siteSeetingValidation();'
                ));
                ?>
                    <input type="hidden" name="action" value="updateSiteSetting" />
                    <div class="form-body">
                        <div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>
                        <div id="errormsg"></div>

                        <div class="tabbable tabbable-custom boxless tabbable-reversed">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#site_setting_tab1" data-toggle="tab">Site Info</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="site_setting_tab1">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Admin Name <span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">
                                                <?php echo $this->Form->input('admin_name',
                                                    array('class'=>'form-control'
                                                    ,'placeholder'=>'Admin Name'
                                                    ,'id'=>'admin_name'
                                                    ,'type'=>'text'
                                                    ,'label'=>false));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Admin Email <span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">

                                                <?php echo $this->Form->input('admin_email',
                                                    array('class'=>'form-control'
                                                    ,'placeholder'=>'Admin Email'
                                                    ,'id'=>'admin_email'
                                                    ,'type'=>'text'
                                                    ,'label'=>false));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Site Name<span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">

                                                <?php echo $this->Form->input('sitename',
                                                    array('class'=>'form-control'
                                                    ,'placeholder'=>'Site Name'
                                                    ,'id'=>'sitename'
                                                    ,'type'=>'text'
                                                    ,'label'=>false));
                                                ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Site Logo <span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">

                                                <?php echo $this->Form->input('sitelogo',
                                                    array('class'=>''
                                                    ,'id'=>'siteLogo'
                                                    ,'type'=>'file'
                                                    ,'label'=>false));
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-4">
                                            <?php if(!empty($site_data['sitelogo'])) {; ?> <img src="<?php echo BASE_URL.'images/'.$site_data['sitelogo'] ?>" height="80px" width="200px" data-id="site_logo_img">
                                            <?php }else{ ?>
                                                <img data-id="site_logo_img" src="<?php echo ADMIN_IMG;?>noaadhar.jpg" alt="PAN card" height="80px" width="200px" onerror="this.src='<?php echo ADMIN_IMG;?>noaadhar.jpg'"/>
                                            <?php }?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Site Fav Icon <span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">
                                                <?php echo $this->Form->input('site_fav_icon',
                                                    array('class'=>''
                                                    ,'id'=>'site_fav_icon'
                                                    ,'type'=>'file'
                                                    ,'label'=>false));
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-4">
                                            <?php if(!empty($site_data['site_fav_icon'])) {; ?> <img src="<?php echo BASE_URL.'images/'.$site_data['site_fav_icon'] ?>" height="50px" width="50px" data-id="maincat_photo">
                                            <?php }else{ ?>
                                                <img data-id="maincat_photo" src="<?php echo ADMIN_IMG;?>noaadhar.jpg" alt="PAN card" height="50px" width="50px" onerror="this.src='<?php echo ADMIN_IMG;?>noaadhar.jpg'"/>
                                            <?php }?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Site Address<span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">
                                                <?php echo $this->Form->textarea('site_address',
                                                    array('class'=>'form-control'
                                                    ,'placeholder'=>'Site Address'
                                                    ,'id'=>'site_address'
                                                    //,'type'=>'textarea'
                                                    ,'label'=>false));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <?php echo $this->Form->button('Save',[
                                    'type'=>'submit',
                                    'class'=>'btn green'
                                ]);?>
                            </div>
                        </div>
                    </div>
                <?php echo $this->Form->end();?>
            </div>
        </div>
    </div>
</div>
