<div class="right-side">
    <div class="col-xs-8 col-sm-offset-2">
        <div class="contact-box">
            <div class="conatct-head">
                <ul class="contact-ul nav nav-tabs">
                    <li class="text-center con-det active" data-toggle="tab" href="#con-details"><a>Contact Details</a></li>
                    <li class="text-center change-acc" data-toggle="tab" href="#access-info"><a>Change access info</a></li>
                </ul>
            </div>
            <div class="col-xs-12">
                <div class="tab-content">
                    <div id="con-details" class="tab-pane active">
                        <?php echo $this->Form->create('login_form',array('name'=>'partner_contact',
                            'id' => 'partner_contact',
                            'class'=>'',
                        ));
                        ?>
                            <input type="hidden" value="<?php echo $userId ?>" id="editId">
                            <div class="con-page-head">Contact Details</div>
                            <div class="form-group">
                                <input type="text" class="form-control my-form-control" id="profile_firstname" placeholder="First Name" value="<?php echo $myaccountDetails['firstname'] ?>" name="firstname">
                                <span id="spFirstErr"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control my-form-control" id="profile_lastname" placeholder="Last Name" value="<?php echo $myaccountDetails['lastname'] ?>" name="lastname">
                                <span id="spLastErr"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control my-form-control" id="profile_location" placeholder="Loaction" value="<?php echo $myaccountDetails['address'] ?>" name="address">
                                <span id="spaddressErr"></span>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control my-form-control" id="profile_phone" placeholder="Phone Number" value="<?php echo $myaccountDetails['phone_number'] ?>" name="phone_number">
                                <span id="spPhoneErr"></span>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control my-form-control" id="profile_username" placeholder="Email ID" value="<?php echo $myaccountDetails['username'] ?>" name="username">
                                <span id="spUserErr"></span>
                            </div>
                            <div class="form-group">
                                <input type="radio" <?php echo ($myaccountDetails['profile_gender'] == 'male') ? 'checked' : '' ?> value="male" name="profile_gender" id="boy"><label for="boy">Male</label>
                                <input type="radio" <?php echo ($myaccountDetails['profile_gender'] == 'female') ? 'checked' : '' ?> value="female" name="profile_gender" id="girl"><label for="girl">Female</label>
                                <span id="spgenderErr"></span>
                            </div>
                            <div class="text-center">
                                <button onclick="return saveProfile()" class="btn btn-default slider-btn">save</button>
                            </div>
                        <?php echo $this->Form->end();?>
                    </div>

                    <div id="access-info" class="tab-pane fade">
                        <div class="con-page-head">Change Password</div>
                        <div id="con-details" class="tab-pane active">
                            <?php echo $this->Form->create('login_form',array('name'=>'partner_changepassword',
                                'id' => 'partner_changepassword',
                                'class'=>'',
                            ));
                            ?>
                                <div class="form-group">
                                    <input type="password" id="oldpassword" class="form-control my-form-control" placeholder="Old Password">
                                    <span id="oldpassErr"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="newpassword" name="password" class="form-control my-form-control" placeholder="New Password">
                                    <span id="newpassErr"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="confirmpassword" class="form-control my-form-control" placeholder="Confirm Password">
                                    <span id="confirmpassErr"></span>
                                </div>

                                <div class="text-center">
                                    <button onclick="return changePassword()" class="btn btn-default slider-btn">submit</button>
                                </div>
                            <?php echo $this->Form->end();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>