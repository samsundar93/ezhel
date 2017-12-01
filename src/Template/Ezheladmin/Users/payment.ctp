<h3 class="page-title">
    Payment Settings
</h3>
<div class="page-bar">
</div>

<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-credit-card"></i>Payment Settings
                </div>
            </div>
            <div class="portlet-body form">
                <?php echo $this->Form->create('paymentSettingsfrm',array('name'=>'paymentSettingsfrm',
                    'id'=>'paymentSettingsfrm',
                    'enctype'=>'multipart/form-data',
                    'class'=>'form-horizontal',
                    'onsubmit' => 'return paymentSettingValidation();'
                ));
                ?>
                    <div class="form-body">
                        <div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>
                        <div id="errormsg" ></div>

                        <div class="form-group" >
                            <label class="col-md-3 control-label">Paypal Payment <span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input class="radiobotton" type="radio" name="paypal_mode" id="live_mode" value="Live" <?php if($site_data['paypal_mode'] == 'Live') echo "checked";?> /> Live Mode
                                        </label>
                                        <label class="radio-inline">
                                            <input class="radiobotton" type="radio" name="paypal_mode" id="test_mode" value="Test" <?php if($site_data['paypal_mode'] == 'Test') echo "checked";?> /> Test Mode
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Paypal Url<span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">

                                    <?php echo $this->Form->input('paypal_url_live',
                                        array(
                                            'class'=>'form-control',
                                            'placeholder'=>'Paypal Url Live',
                                            'id'=>'paypal_url_live',
                                            'type'=>'text',
                                            'label'=>false,
                                            'style' => ($site_data['paypal_mode'] == 'Test') ? 'display:none' : '',
                                            'min'=>0
                                        )
                                    );
                                    ?>
                                    <div>

                                        <?php echo $this->Form->input('paypal_url_test',
                                            array(
                                                'class'=>'form-control',
                                                'placeholder'=>'Paypal Url Test',
                                                'id'=>'paypal_url_test',
                                                'type'=>'text',
                                                'style' => ($site_data['paypal_mode'] == 'Live') ? 'display:none' : '',
                                                'label'=>false,
                                                'min'=>0
                                            )
                                        );
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Business Account<span class="color1">*</span></label>
                            <div class="col-md-9">
                                <div class="col-md-6 no-padding">


                                    <?php echo $this->Form->input('business_live',
                                        array(
                                            'class'=>'form-control',
                                            'placeholder'=>'Paypal Business Live',
                                            'id'=>'business_live',
                                            'type'=>'text',
                                            'style' => ($site_data['paypal_mode'] == 'Test') ? 'display:none' : '',
                                            'label'=>false,
                                            'min'=>0
                                        )
                                    );
                                    ?>

                                    <?php echo $this->Form->input('business_test',
                                        array(
                                            'class'=>'form-control',
                                            'placeholder'=>'Paypal Business Test',
                                            'id'=>'business_test',
                                            'type'=>'text',
                                            'style' => ($site_data['paypal_mode'] == 'Live') ? 'display:none' : '',
                                            'label'=>false,
                                            'min'=>0
                                        )
                                    );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <?php echo $this->Form->button('Submit',[
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