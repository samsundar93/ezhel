<section>
    <div class="container">
        <div class="service-title">What Kind of Service do you need?</div>
        <input type="hidden" id="logginUser" value="<?php echo (isset($logginUser['user_id'])) ? $logginUser['user_id'] : ''; ?>">
        <input type="hidden" id="logginRole" value="<?php echo (isset($logginUser['role_id'])) ? $logginUser['role_id'] : ''; ?>">
        <?php foreach($mainServiceList as $key => $value) { ?>
            <?php if (!empty($value['sub_categories'])) { ?>
                <div class="col-sm-3 m-b-30">

                    <a onclick="showchild('<?php echo $value['id'] ?>')" <!--data-toggle="modal"  data-target="#child-care-popup_dataid--><?php /*echo $value['id'] */?>">
                        <input class="hide jobtype" id="child-care" name="jobtype" type="radio">
                        <label class="lets-do-tel-craft" for="child-care">
                            <div class="kind-service">
                                <div class="kind-service-img">
                                    <img src="<?php echo BASE_URL ?>images/maincategory/<?php echo $value['maincat_photo'] ?>">
                                </div>
                                <div class="kind-service-text"><?php echo $value['maincatname']; ?></div>
                            </div>
                        </label>
                    </a>
                </div>
            <?php }
        }?>
    </div>
</section>

<?php foreach($mainServiceList as $key => $value) { ?>
    <?php if (!empty($value['sub_categories'])) { ?>
        <?php echo $this->Form->create('sp_addedit_form',array('name'=>'sp_addedit_form',
            'id'=>'child-care-popup_dataid'.$value['id'] ,
            'enctype'=>'multipart/form-data',
            'class'=>'modal multi-step',
            //'url' => BASE_URL.'serviceslist'
        ));
        ?>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header clearfix">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title step-1" data-step="1">Step 1</h4>
                        <h4 class="modal-title step-2" data-step="2">Step 2</h4>
                        <h4 class="modal-title step-3" data-step="3">Final Step</h4>
                        <div class="m-progress">
                            <div class="m-progress-bar-wrapper">
                                <div class="m-progress-bar">
                                </div>
                            </div>
                            <div class="m-progress-stats">
                        <span class="m-progress-current">
                        </span>
                                /
                                <span class="m-progress-total">
                        </span>
                            </div>
                            <div class="m-progress-complete">
                                Completed
                            </div>
                        </div>
                        <span class="commErr"></span>
                    </div>

                    <!---------------------tab1-------------------------->
                    <div class="modal-body clearfix step-1" data-step="1">
                        <?php foreach($value['sub_categories'] as $skey => $svalue) { ?>
                            <div class="form-group child-care-pop">
                                <input type="radio" name="subcategory" id="subcategory_<?php echo $svalue['id'] ?>" value="<?php echo $svalue['id'] ?>">
                                <label for="subcategory_<?php echo $svalue['id'] ?>"><?php echo $svalue['catname']; ?></label>
                            </div>
                        <?php } ?>
                    </div>


                    <div class="modal-body step-2" data-step="2">
                        <div class="form-group">
                            <label>Where do you need a service?</label>
                            <input name="service_area" onclick="initialize1('service_area_<?php echo $value['id'] ?>')" type="text" class="form-control service_area" placeholder="Your Location" autocomplete="off" id="service_area_<?php echo $value['id'] ?>">
                            <input name="service_lat" type="hidden" id="service_lat">
                            <input name="service_lng" type="hidden" id="service_lng">
                        </div>
                        <div class="form-group clearfix">
                            <div class="p-l-15"><label>When do you need a service?</label></div>
                            <div class="col-sm-4">
                                <div class="child-care-pop">
                                    <input type="radio" class="serviceWhen_<?php echo $value['id'] ?>" name="serviceWhen" id="immediately_<?php echo $value['id'] ?>" value="immediately">
                                    <label for="immediately_<?php echo $value['id'] ?>">immediately</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="child-care-pop">
                                    <input type="radio" class="serviceWhen_<?php echo $value['id'] ?>" name="serviceWhen" id="withinday_<?php echo $value['id'] ?>" value="withinday">
                                    <label for="withinday_<?php echo $value['id'] ?>">within days</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="child-care-pop">
                                    <input type="radio" class="serviceWhen_<?php echo $value['id'] ?>" name="serviceWhen" id="within-week_<?php echo $value['id'] ?>" value="within-week">
                                    <label for="within-week_<?php echo $value['id'] ?>">within week</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="child-care-pop">
                                    <input type="radio" class="serviceWhen_<?php echo $value['id'] ?>" name="serviceWhen" id="within-month_<?php echo $value['id'] ?>" value="within-month">
                                    <label for="within-month_<?php echo $value['id'] ?>">within month</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="child-care-pop">
                                    <input type="radio" class="serviceWhen_<?php echo $value['id'] ?>" name="serviceWhen" id="unsure_<?php echo $value['id'] ?>" value="unsure">
                                    <label for="unsure_<?php echo $value['id'] ?>">unsure</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="p-l-15"><label>What Kind of service do you need?</label></div>
                            <div class="col-sm-4">

                                <div class="child-care-pop">
                                    <input type="radio" class="recurring_<?php echo $value['id'] ?>" name="recurring" id="recurring_<?php echo $value['id'] ?>" value="rrecurring">
                                    <label for="recurring_<?php echo $value['id'] ?>" checked="checked">Recurring</label>
                                </div>

                            </div>

                            <div class="col-sm-4">
                                <div class="child-care-pop">
                                    <input type="radio" class="recurring_<?php echo $value['id'] ?>" name="recurring" id="oneday_<?php echo $value['id'] ?>" value="ooneday">
                                    <label for="oneday_<?php echo $value['id'] ?>">One Day</label>
                                </div>
                            </div>
                        </div>

                        <div class="rrecurring date-time timingSlider" id="<?php echo $value['id'] ?>" >
                            <div class="form-group clearfix" >
                                <ul class="modal-day-select">
                                    <li>

                                        <input type="checkbox" id="mon-day_<?php echo $value['id'] ?>" name="recurringDay[]" value="monday">
                                        <label for="mon-day_<?php echo $value['id'] ?>">MON</label>
                                    </li>
                                    <li>

                                        <input type="checkbox" id="tue-day_<?php echo $value['id'] ?>" name="recurringDay[]" value="tuesday">
                                        <label for="tue-day_<?php echo $value['id'] ?>">TUE</label>
                                    </li>
                                    <li>

                                        <input type="checkbox" id="wed-day_<?php echo $value['id'] ?>" name="recurringDay[]" value="wednesday">
                                        <label for="wed-day_<?php echo $value['id'] ?>">WED</label>
                                    </li>
                                    <li>

                                        <input type="checkbox" id="thu-day_<?php echo $value['id'] ?>" name="recurringDay[]" value="thursday">
                                        <label for="thu-day_<?php echo $value['id'] ?>">THU</label>
                                    </li>
                                    <li>

                                        <input type="checkbox" id="fri-day_<?php echo $value['id'] ?>" name="recurringDay[]" value="friday">
                                        <label for="fri-day_<?php echo $value['id'] ?>">FRI</label>
                                    </li>
                                    <li>

                                        <input type="checkbox" id="sat-day_<?php echo $value['id'] ?>" name="recurringDay[]" value="saturday">
                                        <label for="sat-day_<?php echo $value['id'] ?>">SAT</label>
                                    </li>
                                    <li>

                                        <input type="checkbox" id="sun-day_<?php echo $value['id'] ?>" name="recurringDay[]" value="sunday">
                                        <label for="sun-day_<?php echo $value['id'] ?>">SUN</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group clearfix">
                                <p class="p-l-15">
                                    <label for="amount_<?php echo $value['id'] ?>">choose your time</label>
                                    <input name="recurringTime" type="text" id="amount_<?php echo $value['id'] ?>" readonly
                                           style="border:0; color:#f6931f; font-weight:bold;">
                                </p>
                                <div id="slider-range_<?php echo $value['id'] ?>"></div>
                            </div>
                        </div>
                        <div class="ooneday date-time clearfix dateShowing" style="display:none;" id="<?php echo $value['id'] ?>" >
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p>Start Date: <input name="startDate" type="text" id="startdatepicker_<?php echo $value['id'] ?>"></p>
                                </div>
                                <div class="form-group">
                                    <p>End Date: <input name="endDate" type="text" id="enddatepicker_<?php echo $value['id'] ?>"></p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal-body step-3" dateSlider data-step="3" id="<?php echo $value['id'] ?>">
                        <div class="form-group clearfix">
                            <h4 class="p-l-15">
                                <label for="pay_range">Pay range</label>
                                <input name="payrange" type="text" id="pay_range_<?php echo $value['id'] ?>" readonly
                                       style="border:0; color:#f6931f; font-weight:bold;">
                            </h4>
                            <div class="col-xs-12">
                                <div id="slider-range-amount_<?php echo $value['id'] ?>"></div>
                            </div>
                        </div>
                        <div id="categoryQuestiong">

                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger step-3 pull-right" data-step="3"
                                 onclick="sendEvent('#child-care-popup_dataid<?php echo $value['id'] ?>', 0,0,'<?php echo $value['id'] ?>')">Completed
                        </button>
                        <button type="button" class="btn btn-danger step step-1" data-step="1"
                                onclick="sendEvent('#child-care-popup_dataid<?php echo $value['id'] ?>', 2,1,'<?php echo $value['id'] ?>')">Continue
                        </button>
                        <button type="button" class="btn btn-primary step step-2" data-step="2"
                                onclick="sendEvent('#child-care-popup_dataid<?php echo $value['id'] ?>', 1,0,'<?php echo $value['id'] ?>')">Back
                        </button>
                        <button type="button" class="btn btn-primary step-3" data-step="3"
                                onclick="sendEvent('#child-care-popup_dataid<?php echo $value['id'] ?>', 2,0,'<?php echo $value['id'] ?>')">Back
                        </button>

                        <button type="button" class="btn btn-danger step step-2" data-step="2"
                                onclick="sendEvent('#child-care-popup_dataid<?php echo $value['id'] ?>', 3,2,'<?php echo $value['id'] ?>')">Continue
                        </button>
                    </div>
                </div>
            </div>
        <?php echo $this->Form->end();?>

    <?php }
}?>

<script>
    +function($) {
        'use strict';

        var modals = $('.modal.multi-step');

        modals.each(function(idx, modal) {
            var $modal = $(modal);
            var $buttons = $modal.find('button.step');
            var total_num_steps = $buttons.length;
            var $progress = $modal.find('.m-progress');
            var $progress_bar = $modal.find('.m-progress-bar');
            var $progress_stats = $modal.find('.m-progress-stats');
            var $progress_current = $modal.find('.m-progress-current');
            var $progress_total = $modal.find('.m-progress-total');
            var $progress_complete  = $modal.find('.m-progress-complete');
            var reset_on_close = $modal.attr('reset-on-close') === 'true';

            function reset() {
                $modal.find('.step').hide();
                $modal.find('[data-step]').hide();
            }

            function completeSteps() {
                $progress_stats.hide();
                $progress_complete.show();
                $modal.find('.progress-text').animate({
                    top: '-2em'
                });
                $modal.find('.complete-indicator').animate({
                    top: '-2em'
                });
                $progress_bar.addClass('completed');
            }

            function getPercentComplete(current_step, total_steps) {
                return Math.min(current_step / total_steps * 100, 100) + '%';
            }

            function updateProgress(current, total) {
                $progress_bar.animate({
                    width: getPercentComplete(current, total)
                });
                if (current - 1 >= total_num_steps) {
                    completeSteps();
                } else {
                    $progress_current.text(current);
                }

                $progress.find('[data-progress]').each(function() {
                    var dp = $(this);
                    if (dp.data().progress <= current - 1) {
                        dp.addClass('completed');
                    } else {
                        dp.removeClass('completed');
                    }
                });
            }

            function goToStep(step) {
                reset();
                var to_show = $modal.find('.step-' + step);
                if (to_show.length === 0) {
                    // at the last step, nothing else to show
                    return;
                }
                to_show.show();
                var current = parseInt(step, 10);
                updateProgress(current, total_num_steps);
                findFirstFocusableInput(to_show).focus();
            }

            function findFirstFocusableInput(parent) {
                var candidates = [parent.find('input'), parent.find('select'),
                        parent.find('textarea'),parent.find('button')],
                    winner = parent;
                $.each(candidates, function() {
                    if (this.length > 0) {
                        winner = this[0];
                        return false;
                    }
                });
                return $(winner);
            }

            function bindEventsToModal($modal) {
                var data_steps = [];
                $('[data-step]').each(function() {
                    var step = $(this).data().step;
                    if (step && $.inArray(step, data_steps) === -1) {
                        data_steps.push(step);
                    }
                });

                $.each(data_steps, function(i, v) {
                    $modal.on('next.m.' + v, {step: v}, function(e) {
                        goToStep(e.data.step);
                    });
                });
            }

            function initialize() {
                reset();
                updateProgress(1, total_num_steps);
                $modal.find('.step-1').show();
                $progress_complete.hide();
                $progress_total.text(total_num_steps);
                bindEventsToModal($modal, total_num_steps);
                $modal.data({
                    total_num_steps: $buttons.length,
                });
                if (reset_on_close){
                    //Bootstrap 2.3.2
                    $modal.on('hidden', function () {
                        reset();
                        $modal.find('.step-1').show();
                    })
                    //Bootstrap 3
                    $modal.on('hidden.bs.modal', function () {
                        reset();
                        $modal.find('.step-1').show();
                    })
                }
            }

            initialize();
        })
    }(jQuery);

    sendEvent = function(sel, step, currentStep, currentId) {
        var jssitebaseUrl = '<?php echo BASE_URL ?>';
        $(".commErr").html('');
        if(step == 2 && currentStep == 1) {
            if(!$("input[name='subcategory']:checked").val()) {
                $(".commErr").addClass('error').html('Please choose your service');
                return false;
            }
            $(sel).trigger('next.m.' + step);
            $.ajax({
                type   : 'POST',
                url    : jssitebaseUrl+'services/ajaxaction',
                data   : {id: $("input[name='subcategory']:checked").val()},
                success: function(data){
                    $("#categoryQuestiong").html(data);
                    return false;
                }

            });

        }else if(step == 3 && currentStep == 2) {
            var service_area = $("#service_area_"+currentId).val();
            if(service_area == '') {
                $(".commErr").addClass('error').html('Please enter your service area');
                return false;
            }else if(!$("input[class=serviceWhen_"+currentId+"]:checked").val()) {
                $(".commErr").addClass('error').html('Please choose When do you need a service');
                return false;
            }else if(!$("input[class=recurring_"+currentId+"]:checked").val()) {
                $(".commErr").addClass('error').html('Please choose What Kind of service do you need');
                return false;
            }

            if($("input[class=recurring_"+currentId+"]:checked").val() == 'ooneday') {
                var startDate = $("#startdatepicker_"+currentId).val();
                var endDate = $("#enddatepicker_"+currentId).val();
                if(startDate == '') {
                    $(".commErr").addClass('error').html('Please choose start Date');
                    return false;
                }else if(endDate == '') {
                    $(".commErr").addClass('error').html('Please choose End Date');
                    return false;
                }
            }
            $(sel).trigger('next.m.' + step);
        }else if(step != 0 && currentStep == 0) {
            $(sel).trigger('next.m.' + step);
        }else if(step == 0 && currentStep == 0) {
            var r = $(".radioButton").length;
            var c = $(".checkboxButton").length;
            var s = $(".selectButton").length;
            var t = $(".textareaButton").length;


            if(r > 0) {
                $(".radioButton").each(function () {

                    if(!$("input[name="+this.name+"]:checked").val()) {
                        $(".commErr").addClass('error').html('Pleae answer below all the questions');
                        return false;
                    }else {
                        r--;
                    }

                });
            }

            if(c > 0) {
                $(".checkboxButton").each(function () {
                    if (!$("input[id="+this.id+"]:checked").val()) {
                        $(".commErr").addClass('error').html('Pleae answer below all the questions');
                        return false;
                    } else {
                        c--;
                    }
                });
            }

            if(s > 0) {
                $(".selectButton").each(function () {
                    if (!$("#"+this.id).val()) {
                        $(".commErr").addClass('error').html('Pleae answer below all the questions');
                        return false;
                    } else {
                        s--;
                    }
                });
            }

            if(t > 0) {
                $(".textareaButton").each(function () {
                    if (!$("#"+this.id).val()) {
                        $(".commErr").addClass('error').html('Pleae answer below all the questions');
                        return false;
                    } else {
                        t--;
                    }
                });

            }

            if( r == 0 && c == 0 && s == 0 && t == 0) {
                //window.location.href = jssitebaseUrl+'serviceslist';
                //return false;
                $("#child-care-popup_dataid"+currentId).submit();
                return false;
            }

        }

    }

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

    function showchild(id) {
        var logginUser = $("#logginUser").val();
        var logginRole = $("#logginRole").val();
        if(logginUser == '') {
            $("#login_modal").modal('show');
        }else if(logginRole != '5') {
            alert('Unauthorized Login');return false;
        }else {
            $("#child-care-popup_dataid"+id).modal('show');
        }
        return false;
    }

</script>

