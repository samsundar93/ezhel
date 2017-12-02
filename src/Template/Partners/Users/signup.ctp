<section>
    <?php echo $this->Form->create('login_form',array('name'=>'partner_signup',
        'id' => 'partner_signup',
        'class'=>'',
    ));
    ?>
        <div class="modal-body clearfix">
            <!--<div class="col-xs-12 form-group no-padding">
                <div class="col-sm-6 no-padding-right">
                    <button class="btn hire-btn">Hire a service provider</button>
                </div>
                <div class="col-sm-6 no-padding-left">
                    <button class="btn apply-job-btn">Apply to Jobs</button>
                </div>
            </div>-->
            <div class="col-xs-12">
                <div class="form-group clearfix">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="First Name" id="firstname" name="firstname">
                    <span id="firstnameErr"></span>
                </div>
                <div class="form-group clearfix">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name" id="lastname" name="lastname">
                    <span id="lastnameErr"></span>
                </div>
                <div class="form-group clearfix">
                    <label>Your Location</label>
                    <input type="text" class="form-control" onclick="initialize1('location')" placeholder="Loaction" id="location" name="address">
                    <span id="locationErr"></span>
                </div>
                <div class="form-group clearfix">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" placeholder="Mobile Number" id="phone_number" name="phone_number">
                    <span id="phoneErr"></span>
                </div>
                <div class="form-group clearfix">
                    <label>Your Email ID</label>
                    <input type="text" class="form-control" placeholder="Email" id="partner_username" name="username">
                    <span id="emailErr"></span>
                </div>
                <div class="form-group clearfix">
                    <label>Passowrd</label>
                    <input type="password" class="form-control" placeholder="Password" id="partner_password" name="password" autocomplete="off">
                    <span id="partnerpassErr"></span>
                </div>
                <div class="form-group clearfix">
                    <label>By clicking Join Now You agree to our Terms of use and Privacy Policy</label>
                </div>
            </div>
        </div>
        <div class="modal-footer text-center">
            <button type="submit" onclick="return partnerSignup()" class="btn signup-btn">Join Now</button>
            <div class="donthave">You have an account? <a data-toggle="modal" data-target="#partner_login_modal" href="">Sign In.</a></div>
        </div>
    <?php echo $this->Form->end();?>
</section>

<div class="modal fade" id="partner_login_modal" role="dialog">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body clearfix">
                <section class="login-popup">
                    <div class="signin-txt">Partner Sign in</div>
                    <div class="col-xs-12">
                        <span id="loginErr"></span>
                        <?php echo $this->Form->create('login_form',array('name'=>'partner_login_form',
                            'class'=>'',
                        ));
                        ?>
                        <div class="signin-box">
                            <div class="form-group">
                                <label class="form-label">Email<span class="mand-star">&#42;</span></label>
                                <input type="text" class="form-control myform-control" placeholder="Enter Email id" id="sp_username">
                                <span id="spuserErr"></span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password<span class="mand-star">&#42;</span></label>
                                <input type="password" class="form-control myform-control" placeholder="Enter Password" id="sp_password" autocomplete="off">
                                <span id="passErr"></span>
                            </div>
                            <div class="forget-sec">
                                <span class="pull-left remember-me"><input type="checkbox"> Remember me on this computer</span>
                                <span class="pull-right forget-pwd"><a href="javascript;">Forgot Password?</a></span>
                            </div>
                            <div class="text-center">
                                <input type="submit" onclick="return partnerLogin()" class="btn signup-btn" value="SIGN IN">
                            </div>
                        </div>
                        <?php echo $this->Form->end();?>
                    </div>
                </section>
            </div>
        </div>

    </div>
</div>
<script>
    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.
    var placeSearch, autocomplete,autocomplete1;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initialize1(id) {
        // Create the autocomplete object, restricting the search
        autocomplete1 = new google.maps.places.Autocomplete(
            /** @type {HTMLInputElement} */ (document.getElementById(id)),
            { types: ['geocode'],componentRestrictions: {country: "SA"} });
        google.maps.event.addListener(autocomplete1, 'place_changed', function() {
            fillInAddress1();
        });
    }
    // The START and END in square brackets define a snippet for our documentation:
    // [START region_fillform]
    function fillInAddress1() {
        // Get the place details from the autocomplete object.
        var place = autocomplete1.getPlace();

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                //document.getElementById(addressType).value = val;
            }
        }
    }
    // [START region_geolocation]
    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = new google.maps.LatLng(
                    position.coords.latitude, position.coords.longitude);
                autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
                    geolocation));
            });
        }
    }
</script>