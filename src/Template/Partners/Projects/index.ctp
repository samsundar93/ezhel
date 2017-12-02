<div class="right-side">
    <div class="project_btns text-center">
        <ul class="on-pending-btn">
            <li><a class="penon-active" data-penon="pen-div">Pending</a></li>
            <li><a data-penon="on-div">Ongoing</a></li>
        </ul>
    </div>
    <div class="pending-div common-cls" id="pen-div">
        <?php if(!empty($pendingProjects)) {
            foreach ($pendingProjects as $key => $value) { ?>
                <div class="col-sm-6 col-xs-12">
                    <div class="project_box">
                        <div class="project_box_title"><?php echo $value['sub_category']['catname'] ?></div>
                        <div class="project_box_area">
               <span class="pull-left"><i class="fa fa-map-marker"></i>
               <strong>Area</strong>: <?php echo $value['service_area'] ?></span>
                            <span class="pull-right"><i class="fa fa-credit-card"></i>
               Payment Type : COD</span>
                        </div>
                        <div class="project_box_order_id">
                            OrderID: <strong><?php echo $value['project_number'] ?></strong>
                        </div>
                        <div class="project_box_cont">
                            I am Professional(career)nanny and would like to make a long-term commitment to caring
                        </div>
                        <div class="project_box_order_id">
                            Status: <strong class="pending_txt">Pending</strong>
                        </div>
                        <div class="project_box_btn">
                            <span class="pull-left"><a href="<?php echo BASE_URL ?>serviceproviders/pendingView/1" class="btn btn-info">View</a></span>
                            <span class="pull-right"><i class="fa fa-calendar"></i>
               <strong>Date&Time</strong> : 9/15/2017 & 10:10PM</span>
                        </div>
                    </div>
                </div>
                <?php
            }
        } ?>


    </div>
    <div class="ongoing-div common-cls" id="on-div" style="display:none;">
        <div class="col-sm-6 col-xs-12">
            <div class="project_box">
                <div class="project_box_title">Baby Sitters&Nannies</div>
                <div class="project_box_area">
               <span class="pull-left"><i class="fa fa-map-marker"></i>
               <strong>Area</strong>: Arizona, United State</span>
                    <span class="pull-right"><i class="fa fa-credit-card"></i>
               Payment Type : card</span>
                </div>
                <div class="project_box_order_id">
                    OrderID: <strong>El0119</strong>
                </div>
                <div class="project_box_cont">
                    I am Professional(career)nanny and would like to make a long-term commitment to caring
                </div>
                <div class="project_box_order_id">
                    Status: <strong class="ongoing_text">Ongoing</strong>
                </div>
                <div class="project_box_btn">
                    <span class="pull-left"><a href="<?php echo BASE_URL ?>serviceproviders/ongoingView/1" class="btn btn-info">View</a></span>
                    <span class="pull-right"><i class="fa fa-calendar"></i>
               <strong>Date&Time</strong> : 9/15/2017 & 10:10PM</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="project_box">
                <div class="project_box_title">Transportion Needs</div>
                <div class="project_box_area">
               <span class="pull-left"><i class="fa fa-map-marker"></i>
               <strong>Area</strong>: Arizona, United State</span>
                    <span class="pull-right"><i class="fa fa-credit-card"></i>
               Payment Type : Cash</span>
                </div>
                <div class="project_box_order_id">
                    OrderID: <strong>El0119</strong>
                </div>
                <div class="project_box_cont">
                    I am Professional(career)nanny and would like to make a long-term commitment to caring
                </div>
                <div class="project_box_order_id">
                    Status: <strong class="ongoing_text">Ongoing</strong>
                </div>
                <div class="project_box_btn">
                    <span class="pull-left"><button class="btn btn-info">View</button></span>
                    <span class="pull-right"><i class="fa fa-calendar"></i>
               <strong>Date&Time</strong> : 9/15/2017 & 10:10PM</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="project_box">
                <div class="project_box_title">Transportion Needs</div>
                <div class="project_box_area">
               <span class="pull-left"><i class="fa fa-map-marker"></i>
               <strong>Area</strong>: Arizona, United State</span>
                    <span class="pull-right"><i class="fa fa-credit-card"></i>
               Payment Type : Cash</span>
                </div>
                <div class="project_box_order_id">
                    OrderID: <strong>El0119</strong>
                </div>
                <div class="project_box_cont">
                    I am Professional(career)nanny and would like to make a long-term commitment to caring
                </div>
                <div class="project_box_order_id">
                    Status: <strong class="ongoing_text">Ongoing</strong>
                </div>
                <div class="project_box_btn">
                    <span class="pull-left"><button class="btn btn-info">View</button></span>
                    <span class="pull-right"><i class="fa fa-calendar"></i>
               <strong>Date&Time</strong> : 9/15/2017 & 10:10PM</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="project_box">
                <div class="project_box_title">Transportion Needs</div>
                <div class="project_box_area">
               <span class="pull-left"><i class="fa fa-map-marker"></i>
               <strong>Area</strong>: Arizona, United State</span>
                    <span class="pull-right"><i class="fa fa-credit-card"></i>
               Payment Type : Cash</span>
                </div>
                <div class="project_box_order_id">
                    OrderID: <strong>El0119</strong>
                </div>
                <div class="project_box_cont">
                    I am Professional(career)nanny and would like to make a long-term commitment to caring
                </div>
                <div class="project_box_order_id">
                    Status: <strong class="ongoing_text">Ongoing</strong>
                </div>
                <div class="project_box_btn">
                    <span class="pull-left"><button class="btn btn-info">View</button></span>
                    <span class="pull-right"><i class="fa fa-calendar"></i>
               <strong>Date&Time</strong> : 9/15/2017 & 10:10PM</span>
                </div>
            </div>
        </div>
    </div>
</div>

