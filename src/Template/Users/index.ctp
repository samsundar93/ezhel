<section id="home">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active" style="background-image: url(images/slide1.jpg)">
            </div>

            <div class="item" style="background-image: url(images/slide2.jpg)">
            </div>

            <div class="item" style="background-image: url(images/slide3.jpg)">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</section><!--/#home-->

<section id="about-us">
    <div class="container">
        <div class="text-center">
            <div class="col-sm-8 col-sm-offset-2">
                <h2 class="title-one">Lets Get Started. Choose an option</h2>

            </div>
        </div>
        <div class="about-us">
            <div class="row">
                <div class="col-sm-6">
                    <div class="find_service">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</p>
                        <div class="text-center">
                            <a class="btn btn-default slider-btn animated fadeIn" href="<?php echo BASE_URL ?>services">Find Service</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="find_job">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</p>
                        <div class="text-center">
                            <a class="btn btn-default slider-btn animated fadeIn" href="#">Find Job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="what_weoffer">
    <div class="container">
        <div class="text-center">
            <div class="col-sm-8 col-sm-offset-2 padding-bottom-40">
                <h2 class="title-one">What we offer</h2>
            </div>
        </div>
        <?php foreach($mainServiceList as $key => $value) { ?>
            <div class="col-sm-3 col-xs-12">
                <div class="what_weoffer-box">
                    <div class="what_weoffer-pic">
                        <img src="<?php echo BASE_URL ?>images/maincategory/<?php echo $value['maincat_photo'] ?>" width="262" height="200">
                        <div class="what_weoffer-pic-txt"><?php echo $value['maincatname'] ?></div>
                    </div>
                    <div class="what_weoffer-txt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</div>
                    <div class="what_weoffer-view">View Details</div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>


<section class="customer_stories">
    <div class="text-center">
        <div class="col-sm-8 col-sm-offset-2 padding-bottom-40">
            <h2 class="title-one">Customer Stories</h2>
        </div>
    </div>

    <div class="container">
        <div class="multiple-items"  style="float:left; width:100%;">
            <div>
                <div class="col-sm-12">
                    <div class="stories_box ">
                        <div class="cus_stories_img text-center">
                            <img src="images/5.jpg">
                        </div>
                        <div class="cus_stories_name">Service Provider Name & catagories of service</div>
                        <div class="cus_stories_cont">
                            <p>" Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been typesetting industry. Lorem Ipsum has been "</p>
                        </div>
                        <div class="name_cus">
                            <div class="col-sm-2 no-padding">
                                <div class="name_cus_img">
                                    <img src="images/5.jpg">
                                </div>
                            </div>
                            <div class="col-sm-9 no-padding">
                                <p class="name_cus_name">Lally Kumatah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="col-sm-12">
                    <div class="stories_box ">
                        <div class="cus_stories_img text-center">
                            <img src="images/5.jpg">
                        </div>
                        <div class="cus_stories_name">Service Provider Name & catagories of service</div>
                        <div class="cus_stories_cont">
                            <p>" Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been typesetting industry. Lorem Ipsum has been "</p>
                        </div>
                        <div class="name_cus">
                            <div class="col-sm-2 no-padding">
                                <div class="name_cus_img">
                                    <img src="images/5.jpg">
                                </div>
                            </div>
                            <div class="col-sm-9 no-padding">
                                <p class="name_cus_name">Lally Kumatah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="col-sm-12">
                    <div class="stories_box ">
                        <div class="cus_stories_img text-center">
                            <img src="images/5.jpg">
                        </div>
                        <div class="cus_stories_name">Service Provider Name & catagories of service</div>
                        <div class="cus_stories_cont">
                            <p>" Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been typesetting industry. Lorem Ipsum has been "</p>
                        </div>
                        <div class="name_cus">
                            <div class="col-sm-2 no-padding">
                                <div class="name_cus_img">
                                    <img src="images/5.jpg">
                                </div>
                            </div>
                            <div class="col-sm-9 no-padding">
                                <p class="name_cus_name">Lally Kumatah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="col-sm-12">
                    <div class="stories_box ">
                        <div class="cus_stories_img text-center">
                            <img src="images/5.jpg">
                        </div>
                        <div class="cus_stories_name">Service Provider Name & catagories of service</div>
                        <div class="cus_stories_cont">
                            <p>" Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been typesetting industry. Lorem Ipsum has been "</p>
                        </div>
                        <div class="name_cus">
                            <div class="col-sm-2 no-padding">
                                <div class="name_cus_img">
                                    <img src="images/5.jpg">
                                </div>
                            </div>
                            <div class="col-sm-9 no-padding">
                                <p class="name_cus_name">Lally Kumatah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>

<section class="childcare_app_section">
    <div class="container">
        <div class="col-xs-6 padding-top-50">
            <div class="childcare_app_title">Download the App</div>
            <div class="childcare_app_cont">Lorem ipsum dolor sit amet, consectetur adipisicing elit, et do Lorem ipsum dolor sit amet, consectetur
            </div>
            <div class="app-icon"><span><img src="images/google-play.png"></span><span><img src="images/apple-play.png"></span></div>
        </div>
        <div class="col-xs-6">
            <div class="app_pic"><img src="images/mobile.png"></div>
        </div>
    </div>
</section>