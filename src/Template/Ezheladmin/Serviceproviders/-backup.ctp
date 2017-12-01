<div class="page-bar">
</div>

<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>Edit Service provider
                </div>
            </div>
            <div class="portlet-body form">
                <?php echo $this->Form->create('sp_addedit_form',array('name'=>'sp_addedit_form',
                    'id'=>'sp_addedit_form',
                    'enctype'=>'multipart/form-data',
                    'class'=>'form-horizontal',
                    'onsubmit' => 'return serviceproviderAddValidation()'
                ));
                ?>
                    <?php echo $this->Form->input('userId',
                        array('id'=>'userId'
                        ,'type'=>'hidden'
                        ,'value'=>(isset($spEditList['id']) && (!empty($spEditList['id'])) ? $spEditList['id'] : '') ));
                    ?>

                    <?php echo $this->Form->input('service_lat',
                        array('id'=>'service_lat'
                        ,'type'=>'hidden'
                        ,'value'=>(isset($spEditList['service_lat']) && (!empty($spEditList['service_lat'])) ? $spEditList['service_lat'] : '') ));
                    ?>

                    <?php echo $this->Form->input('service_log',
                        array('id'=>'service_log'
                        ,'type'=>'hidden'
                        ,'value'=>(isset($spEditList['service_log']) && (!empty($spEditList['service_log'])) ? $spEditList['service_log'] : '') ));
                    ?>

                    <div class="form-body">
                        <div class="mandatoryField"><span class="color1">*</span> - Mandatory Fields</div>
                        <div id="errormsg" ></div>
                        <div class="tabbable tabbable-custom boxless tabbable-reversed">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#membershipinfo" data-toggle="tab">Service Category Info</a></li>
                                <li><a href="#seriveareainfo" data-toggle="tab">Service Area Info</a></li>
                                <li><a href="#contactinfo" data-toggle="tab">Contact Info</a></li>
                                <li><a href="#profileinfo" data-toggle="tab">Profile Info</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="membershipinfo">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Select Skills &amp; Business <span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <?php foreach($categoryList as $key => $value) { ?>
                                                <span class="col-md-4 padding-right-0 ">
                                                    <h4 class="category-heads">
                                                    <input type="checkbox" id="catMain_<?php echo $key+1; ?>" value="" onclick="checkDecheckAll(<?php echo $key+1; ?>);"/><?php echo $value['maincatname']; ?></h4>

                                                    <?php
                                                        if(!empty($value['sub_categories'])) {

                                                            foreach ($value['sub_categories'] as $skey => $svalue) { ?>
                                                                <input type="hidden" id="mainCount"
                                                                       value="<?php echo count($categoryList); ?>"/>

                                                                <label class="contain" for="<?php echo $svalue['id'] ?>">
                                                                <input type="checkbox" name="service_category[]"
                                                                       id="<?php echo $svalue['id'] ?>"
                                                                       value="<?php echo $svalue['id'] ?>"
                                                                       class="checkedskills_<?php echo $key+1; ?>"
                                                                       onclick="individualCheck(<?php echo $key+1; ?>);"<?php echo ((in_array($svalue['id'], $serviceCategory) == 1) ? 'checked' : '');?> >

                                                                    <?php echo $svalue['catname']; ?>
                                                            </label>
                                                            <?php }
                                                        }else { ?>
                                                        <div class="form-error margin-top-25">There is no sub category </div>
                                                    <?php } ?>
                                                </span>
                                            <!--{if $smarty.section.sub.rownum % 3 eq 0}
                                            <div class="clearfix"></div>
                                            {/if}-->
                                                <div class="clearfix"></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="seriveareainfo">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Enter Service Area<span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">
                                                <?= $this->Form->input('service_area',[
                                                    'type' => 'text',
                                                    'id'   => 'service_area',
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Service Area',
                                                    'autocomplete' => 'off',
                                                    'label' => false,
                                                    'value'=>( isset($spEditList['service_area'])&&(!empty($spEditList['service_area'])) ? $spEditList['service_area'] : ''),

                                                ]) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Service Distance(KM)<span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">
                                                <?= $this->Form->input('service_radius',[
                                                    'type' => 'text',
                                                    'id'   => 'service_radius',
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Service Radius',
                                                    'label' => false,
                                                    'value'=>( isset($spEditList['service_radius'])&&(!empty($spEditList['service_radius'])) ? $spEditList['service_radius'] : ''),

                                                ]) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">&nbsp;</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">
                                                <a href="javascript:void(0);" onclick="viewMap();" id="view_map">Click to view map</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">&nbsp;</label>
                                        <div class="col-md-9">
                                            <div class="portlet solid blue">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-map"></i>Map view
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div id="map" class="gmaps">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="contactinfo">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Business Name<span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">
                                                <?= $this->Form->input('business_name',[
                                                    'type' => 'text',
                                                    'id'   => 'business_name',
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Business Name',
                                                    'label' => false,
                                                    'value'=>( isset($spEditList['business_name'])&&(!empty($spEditList['business_name'])) ? $spEditList['business_name'] : ''),

                                                ]) ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">First Name<span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">
                                                <?= $this->Form->input('firstname',[
                                                    'type' => 'text',
                                                    'id'   => 'firstname',
                                                    'class' => 'form-control',
                                                    'placeholder' => 'First Name',
                                                    'label' => false,
                                                    'value'=>( isset($spEditList['firstname'])&&(!empty($spEditList['firstname'])) ? $spEditList['firstname'] : ''),

                                                ]) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Last Name<span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">

                                                <?= $this->Form->input('lastname',[
                                                    'type' => 'text',
                                                    'id'   => 'lastname',
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Last Name',
                                                    'label' => false,
                                                    'value'=>( isset($spEditList['lastname'])&&(!empty($spEditList['lastname'])) ? $spEditList['lastname'] : ''),

                                                ]) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Contact No<span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">
                                                <?= $this->Form->input('phone_number',[
                                                    'type' => 'text',
                                                    'id'   => 'phone_number',
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Phone Number',
                                                    'label' => false,
                                                    'value'=>( isset($spEditList['phone_number'])&&(!empty($spEditList['phone_number'])) ? $spEditList['phone_number'] : ''),

                                                ]) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Address<span class="color1">*</span></label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">

                                                <?= $this->Form->input('address',[
                                                    'type' => 'text',
                                                    'id'   => 'address',
                                                    'class' => 'form-control',
                                                    'autocomplete' => 'off',
                                                    'placeholder' => 'Address',
                                                    'label' => false,
                                                    'value'=>( isset($spEditList['address'])&&(!empty($spEditList['address'])) ? $spEditList['address'] : ''),

                                                ]) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email <span class="color1">*</span> </label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">

                                                <?= $this->Form->input('username',[
                                                    'type' => 'text',
                                                    'id'   => 'username',
                                                    'class' => 'form-control',
                                                    'autocomplete' => 'off',
                                                    'placeholder' => 'Email',
                                                    'label' => false,
                                                    'value'=>( isset($spEditList['username'])&&(!empty($spEditList['username'])) ? $spEditList['username'] : ''),

                                                ]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profileinfo">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Profile Description</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">
                                                <textarea class="form-control" name="profile_description" id="profile_description" /><?php echo ( isset($spEditList['profile_description'])&&(!empty($spEditList['profile_description'])) ? $spEditList['profile_description'] : '') ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Work History</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 no-padding">
                                                <textarea class="form-control" name="work_history" id="work_history" /><?php echo ( isset($spEditList['work_history'])&&(!empty($spEditList['work_history'])) ? $spEditList['work_history'] : '') ?></textarea>
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
                                <button type="submit" class="btn green">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {
        var service_lat = $("#service_lat").val();
        var service_log = $("#service_log").val();

        gmapLoad(service_lat,service_log);

    })
    //SP validation
    function serviceproviderAddValidation()
    {
        var fields = $("input[name='service_category[]']").serializeArray();
        if (fields.length == 0)
        {
            $("#errormsg").addClass('errormsg').html("Must select at least one Skills & Business");
            $('.nav-tabs > li').find('a[href="#membershipinfo"]').trigger('click');
            return false;
        }

        //Services area
        var service_area    = $.trim($("#service_area").val());
        var service_miles   = $.trim($("#service_radius").val());

        if( service_area == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter Service Area");
            $('.nav-tabs > li').find('a[href="#seriveareainfo"]').trigger('click');
            $("#service_area").focus();
            return false;
        }
        if( service_miles == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter Service Miles");
            $('.nav-tabs > li').find('a[href="#seriveareainfo"]').trigger('click');
            $("#service_distance").focus();
            return false;
        }
        if(isNaN(service_miles)){
            $("#errormsg").addClass('errormsg').html("Please Enter Valid Miles");
            $('.nav-tabs > li').find('a[href="#seriveareainfo"]').trigger('click');
            $("#service_distance").focus();
            return false;
        }

        //contact details
        var trade_logo      =   $("#trad_logo").val();
        var trad_firstname	=	$.trim($("#firstname").val());
        var trad_lastname	=	$.trim($("#lastname").val());
        var trad_mobile		=	$.trim($("#phone_number").val());
        var trad_email		=	$.trim($("#username").val());
        var trade_name		=	$.trim($("#business_name").val());
        var trad_address	=	$.trim($("#address").val());
        var userid          =   $("#userId").val();

        var regUrl =  new RegExp(/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/);


        if(trade_name == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter your business name");
            $('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');
            $("#business_name").focus();
            return false;
        }

        if(trad_firstname == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter First Name");
            $('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');
            $("#firstname").focus();
            return false;
        }
        if(trad_lastname == ''){
            $("#errormsg").addClass('errormsg').html(" Please Enter Last Name");
            $('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');
            $("#lastname").focus();
            return false;
        }
        if(trad_mobile == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter Mobile No");
            $('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');
            $("#phone_number").focus();
            return false;
        }
        if(trad_address == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter the Address.");
            $('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');
            $("#address").focus();
            return false;
        }
        if(trad_email == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter Email id");
            $('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');
            $("#username").focus();
            return false;
        }
        if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(trad_email))){
            $("#errormsg").addClass('errormsg').html("Please Enter Valid Email id");
            $('.nav-tabs > li').find('a[href="#contactinfo"]').trigger('click');
            $("#username").focus();
            return false;
        }

        if(trad_email != '' && trade_name != '')
        {
            $.ajax({
                type   : 'POST',
                url    : jssitebaseUrl+'/serviceproviders/validateServiceproEmailNew',
                data   : {email: trad_email,editid:userid},
                success: function(data){

                    if($.trim(data) == 'exist'){
                        $("#errormsg").addClass('errormsg').html("This Email Id Already Exist");
                        $(".siteSettingTab a").removeClass("active"); $(".siteSettingTabContent").hide(); $("#contactinfo").addClass("active"); $('#contactinfo_content').show();
                        $("#username").focus();
                        return false;
                    }
                    else{
                        document.sp_addedit_form.submit();
                    }
                }

            });return false;
        }
    }

    function gmapLoad(latti,longtti) {
        var map = new google.maps.Map(document.getElementById("showGoogleMaps"), {
            //center: new google.maps.LatLng(13.0821, 80.2482),
            center: new google.maps.LatLng(latti, longtti),
            zoom: 9,
            disableDefaultUI: true,
            mapTypeId: 'roadmap'
        });
        var myLatlng = new google.maps.LatLng(latti,longtti);
        var marker = new google.maps.Marker({
            position: myLatlng,
            icon: "https://maps.google.com/mapfiles/ms/icons/red-dot.png"
        });
        marker.setMap(map);

    }


    function trademen_gmap_service_area(restaurant_address,rest_deliver_miles) {

        var restaurant_address = restaurant_address;

        var area_in_meters = Math.round(rest_deliver_miles*1609.34);

        getCoords(restaurant_address, function(latLng) {
            var rest_lat = latLng.lat();
            var rest_lng = latLng.lng();

            var
                contentCenter = '<span class="infowin">'+restaurant_address+'</span>';
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
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
    }
</script>
<script type="text/javascript">
    $(".nav-tabs li a").click(function() {
        var service_area =   $("#service_area").val();
        var service_miles   =   $("#service_radius").val();
        trademen_gmap_service_area(service_area, service_miles);
    });
</script>