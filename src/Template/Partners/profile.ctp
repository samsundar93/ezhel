<div class="right-side">
    <div class="col-sm-12">
        <div class="service-profile-page">
            <div class="conatct-head">
                <ul class="contact-ul nav nav-tabs">
                    <li class="text-center con-det active" data-toggle="tab" href="#con-details"><a>Profile Info</a></li>
                    <li class="text-center change-acc" data-toggle="tab" href="#access-info"><a>Availabilty and Pricing</a></li>
                </ul>
            </div>
            <?php echo $this->Form->create('login_form',array('name'=>'partner_profile',
                'id' => 'partner_profile',
                'class'=>'',
            ));
            ?>
                <div class="col-sm-6 no-padding">
                    <div class="col-sm-4">
                        <div class="service-profile-image">
                            <img src="../img/mercy.jpg">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="">
                                <input <?php echo ($profileDetails['gender'] == 'male') ? 'checked' : ''; ?> type="radio" name="gender" id="prof_boy" value="male"> <label for="prof_boy">Male</label>
                                <input <?php echo ($profileDetails['gender'] == 'female') ? 'checked' : ''; ?> type="radio" name="gender" id="prof_girl" value="female"> <label for="prof_girl">Female</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Experience</label>
                            <div class="">
                                <input name="experience" type="text" class="form-control" placeholder="Years" value="<?php echo $profileDetails['experience']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <div class="">
                                <input name="age" type="text" class="form-control" placeholder="" value="<?php echo $profileDetails['age']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Launguage</label>
                            <div class="">
                                <input  <?php echo (in_array('english',$selectedLanguage)) ? 'checked' : ''; ?> type="checkbox" id="lan_eng" value="english" name="language[]"> <label for="lan_eng">English</label>
                                <input <?php echo (in_array('arabic',$selectedLanguage)) ? 'checked' : ''; ?> type="checkbox" id="lan_arb" value="arabic" name="language[]"> <label for="lan_arb">Arabic</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 no-padding">
                    <div class="form-group">
                        <label>Service Provider</label>
                        <div class="">
                            <input name="profile_description" type="text" class="form-control" placeholder="" value="<?php echo $profileDetails['profile_description']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Work History</label>
                        <div class="">
                            <input name="work_history" type="text" class="form-control" placeholder="" value="<?php echo $profileDetails['work_history']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Specialization</label>
                        <div class="">
                            <input type="text" name="specialization" class="form-control" placeholder="" value="<?php echo $profileDetails['specialization']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Educational qualification</label>
                        <div class="">
                            <input type="text" name="edu_qualification" class="form-control" placeholder="" value="<?php echo $profileDetails['edu_qualification']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Do you wnat to receive job request</label>
                        <div class="">
                            <input type="radio" id="job_request_yes" name="job_request" value="Y" class="" <?php echo ((!empty($profileDetails['job_request']) && $profileDetails['job_request'] == 'Y') ? 'checked' : '')?> >
                            <label for="job_request_yes">Yes</label>
                            <input type="radio" id="job_request_no" name="job_request" value="N" class="" <?php echo ((!empty($profileDetails['job_request']) && $profileDetails['job_request'] == 'N') ? 'checked' : '')?> >
                            <label for="job_request_no">No</label>
                        </div>
                    </div>
                </div>


                <div class="prof-performance">
                    <div class="prof-performance-head">what kind of performance you can do?</div>
                    <div class="col-sm-4">
                        <ul class="profile-ul">
                            <li><input type="radio" name="care_name" id="prof_child care"> <label for="prof_child care">child care</label></li>
                            <li><input type="radio" name="care_name" id="prof_tutoring"> <label for="prof_tutoring">tutoring</label></li>
                            <li><input type="radio" name="care_name" id="prof_transportation"> <label for="prof_transportation">transportation</label></li>
                            <li><input type="radio" name="care_name" id="prof_home"> <label for="prof_home">Home</label></li>

                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="profile-ul">
                            <li><input type="checkbox"  id="prof_baby"> <label for="prof_baby">Baby sitters & nannies</label></li>
                            <li><input type="checkbox"  id="prof_transport"> <label for="prof_transport">Transportion Need</label></li>
                            <li><input type="checkbox" id="prof_schoolcare"> <label for="prof_schoolcare">After School care</label></li>

                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <ul class="profile-ul">
                            <li><input type="checkbox"  id="prof_baby"> <label for="prof_baby">child care centers</label></li>
                            <li><input type="checkbox"  id="prof_transport"> <label for="prof_transport">Special needs caregives</label></li>
                        </ul>
                    </div>
                </div>


                <div class="working_area">
                    <div class="working_area_head">what kind of performance you can do?</div>
                    <div class="col-sm-6 m-tb-20">
                        <div class="form-group">
                            <label>Service Area</label>
                            <div class="">
                                <input name="service_area" id="service_area" type="text" class="form-control" placeholder="" value="<?php echo $profileDetails['service_area']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Service KM</label>
                            <div class="">
                                <input type="text" id="service_radius" name="service_radius" class="form-control" placeholder="" value="<?php echo $profileDetails['service_radius'] ?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="service_lat" id="service_lat" value="<?php echo $profileDetails['service_lat'] ?>">
                    <input type="hidden" name="service_log" id="service_log" value="<?php echo $profileDetails['service_log'] ?>">
                    <div class="col-sm-6">
                        <div id="map"></div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-default slider-btn">submit</button>
                </div>
            <?php echo $this->Form->end();?>
        </div>

    </div>
</div>

<script>
    $(document).ready(function () {
        initialize1('service_area');
        var service_area =   $("#service_area").val();
        var service_miles   =   $("#service_radius").val();

        trademen_gmap_service_area(service_area, service_miles);

    });

    function trademen_gmap_service_area(sp_address,rest_deliver_miles) {

        var sp_address = sp_address;
        if(sp_address == '') {
            sp_address = 'Saudi Arabia';
        }

        var area_in_meters = Math.round(rest_deliver_miles*1609.34);

        getCoords(sp_address, function(latLng) {
            var rest_lat = latLng.lat();
            var rest_lng = latLng.lng();

            var
                contentCenter = '<span class="infowin">'+sp_address+'</span>';
            var
                latLngCenter = new google.maps.LatLng(rest_lat, rest_lng),
                latLngCMarker = new google.maps.LatLng(rest_lat, rest_lng),
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 9,
                    center: latLngCenter,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: false
                }),
                markerCenter = new google.maps.Marker({
                    position: latLngCMarker,
                    title: 'Location',
                    map: map,
                    icon: "https://maps.google.com/mapfiles/ms/icons/red-dot.png",
                    draggable: false
                }),
                infoCenter = new google.maps.InfoWindow({
                    content: contentCenter
                }),
                // exemplary setup:
                // Assumes that your map is signed to the var "map"
                // Also assumes that your marker is named "marker"
                circle = new google.maps.Circle({
                    map: map,
                    clickable: false,
                    // metres
                    radius: area_in_meters,
                    fillColor: '#FFDFFF',
                    fillOpacity: .6,
                    strokeColor: '#008000',
                    strokeOpacity: .4,
                    strokeWeight: .8
                });
            // attach circle to marker
            circle.bindTo('center', markerCenter, 'position');


            google.maps.event.addListener(markerCenter, 'click', function() {
                infoCenter.open(map, markerCenter);
            });
        });
    }

    function getCoords(address, callback) {
        var latLng = [];
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                callback(results[0].geometry.location);
            } else {

            }
        });
    }

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
            }
        }
    }
</script>