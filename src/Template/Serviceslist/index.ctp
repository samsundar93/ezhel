<!--<section class="search-sec">
    <div class="container">
        <div class="col-sm-5  col-xs-12 no-padding-left">
            <div class="col-sm-12 no-padding location-search">
                <span><i class="fa fa-map-marker"></i><input type="text" class="form-control myfrom-control" placeholder="Enter Location Code"></span>
            </div>
        </div>
        <div class="col-sm-5 col-xs-12 no-padding-left">
            <div class="col-sm-12 no-padding location-search">
                <span><i class="fa fa-map-marker"></i><input type="text" class="form-control myfrom-control" placeholder="Enter service KM"></span>
            </div>
        </div>
        <div class="col-sm-2 col-xs-12 no-padding">
            <button class="form-control myfrom-control banner-submit-btn">Find Service pro</button>
        </div>
    </div>
</section>-->

<section class="childcare-filter-sec">
    <div class="container">
        <div class="col-sm-3 col-md-3 col-xs-12 no-padding">
            <div class="additional_filter">
                <div class="additional_filter_text">Refine your Search</div>
                <div class="filter_list">
                    <ul>

                        <li>
                            <div class="col-sm-5">
                                <label>Experience</label>
                            </div>
                            <div class="col-sm-7">
                                <select class="form-control" onchange="filter(this.value)">
                                    <option value="">any</option>
                                    <option value="0-5Y">0-5Y</option>
                                    <option value="5Y-10Y">5Y-10Y</option>
                                    <option value=">10Y">>10Y</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="col-sm-5">
                                <label>Language</label>
                            </div>
                            <div class="col-sm-7">
                                <select class="form-control" onchange="filter(this.value)">
                                    <option value="">any</option>
                                    <option value="english">English</option>
                                    <option value="arabic">Arabic</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="col-sm-5">
                                <label>Hourly Rate</label>
                            </div>
                            <div class="col-sm-7">
                                <select class="form-control" onchange="filter(this.value)">
                                    <option value="">any</option>
                                    <option value=">10 - 10">1 - 10</option>
                                    <option value="10 - 15">10 - 15</option>
                                    <option value="15 - 20">15 - 20</option>
                                    <option value="20 - 25">20 - 25</option>
                                    <option value="25 - 30">25 - 30</option>
                                    <option value="30 - 35">30 - 35</option>
                                    <option value="35 - 40">35 - 40</option>
                                    <option value="40 - 45">40 - 45</option>
                                    <option value="45 - 50">45 - 50</option>
                                </select>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <?php if(!empty($serviceList)) { //echo "<pre>";print_r($serviceList);die(); ?>
            <div class="col-sm-9 col-md-9 col-xs-12">
                <?php foreach ($serviceList as $key => $value) { if(!empty($value)) { ?>
                    <div class="search_childcare-box" data-search = "<?php echo $value['filter_exp'] ?> <?php echo $value['language'] ?> <?php echo $value['hourlyrate'] ?> ">
                        <div class="childcare_profile">
                            <div class="col-sm-1 no-padding-right">
                                <div class="search_provider_img">
                                    <img src="images/mercy.jpg">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="search_provider_name">
                                    <?php echo $value['firstname'] ?>
                                </div>
                                <div class="search_provider_Location">
                                    <i class="fa fa-map-signs" aria-hidden="true"></i>
                                    Area: <?php echo $value['service_area'] ?> Miles: <?php echo $value['to_distance'] ?> KM
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <div class="search_childcare_review">4.5</div>
                                <div class="search_childcare_rattings">178 ratings</div>
                            </div>
                        </div>
                        <div class="search_childcare_know">
                            <div class="col-sm-12">
                                <?php echo $value['profile_description'] ?>
                            </div>
                        </div>
                        <div class="search_childcare_appoint">
                            <div class="col-sm-7 no-padding">
                                <ul>
                                    <li>
                                        <div><strong>Years of Exp</strong></div>
                                        <div><?php echo $value['experience'] ?> Years</div>
                                    </li>
                                    <li>
                                        <div><strong>Age</strong></div>
                                        <div><?php echo $value['age'] ?> Years</div>
                                    </li>
                                    <li>
                                        <div><strong>Pay Rate</strong></div>
                                        <div>$<?php echo $value['hourlyrate'] ?>/Hr</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-5">
                                <div class="text-right padding-t-b-16">
                                    <button class="search-view-profile">View Profile</button>
                                    <button onclick="return hireme('<?php echo $value['id'] ?>')" class="search-hire">Hire Now</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } } ?>
            </div>
        <?php } ?>
</section>

