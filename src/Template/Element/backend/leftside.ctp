<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <div class="sidebar-toggler">
                </div>
            </li>
            <li class="start active">
                <a href="<?php echo ADMIN_BASE_URL; ?>">
                    <i class="fa fa-home"></i>
                    <span class="title">Home</span>
                </a>

            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-cog"></i>
                    <span class="title">Setting</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="<?php echo ADMIN_BASE_URL; ?>users/setting">
                            <i class="fa fa-list-alt"></i>
                            Site Setting</a>
                    </li>
                    <li class="">
                        <a href="<?php echo ADMIN_BASE_URL; ?>users/payment">
                            <i class="fa fa-credit-card"></i>
                            Payment Setting</a>
                    </li>
                    <li class="">
                        <a href="<?php echo ADMIN_BASE_URL; ?>users/changepassword">
                            <i class="fa fa-lock"></i>
                            Change Password
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span class="title">User</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="<?php echo ADMIN_BASE_URL; ?>serviceproviders/">
                            <i class="fa fa-magnet rotate-90 "></i>
                            Service Providers</a>
                    </li>
                    <li class="">
                        <a href="<?php echo ADMIN_BASE_URL; ?>customers/">
                            <i class="fa fa-home"></i>
                            Customers</a>
                    </li>
                </ul>
            </li>
            <!--<li class="">
                <a href="javascript:;">
                    <i class="fa fa-file"></i>
                    <span class="title">Projects</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="postProjectManage.php">
                            <i class="fa fa-file"></i>
                            Projects</a>
                    </li>
                    <li class="">
                        <a href="purchasedProjectManage.php">
                            <i class="fa fa-file"></i>
                            Purchased Projects</a>
                    </li>
                    <li class="">
                        <a href="wonProjectManage.php">
                            <i class="fa fa-file"></i>
                            Shortlisted Projects</a>
                    </li>
                    <li class="">
                        <a href="completedProjectManage.php">
                            <i class="fa fa-file"></i>
                            Completed Projects</a>
                    </li>
                    <li class="">
                        <a href="deletedProjectManage.php">
                            <i class="fa fa-trash"></i>
                            Deleted Projects</a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="javascript:void(0);">
                    <i class="fa fa-magnet  rotate-90 "></i>
                    <span class="title">Contractor</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="reviewManage.php">
                            <i class="fa fa-search"></i>
                            Review</a>
                    </li>
                    <li class="">
                        <a href="contractorInvoice.php">
                            <i class="fa fa-search"></i>
                            Invoice</a>
                    </li>
                    <li class="">
                        <a href="{((isset($smarty.session.adminid) and !empty($smarty.session.adminid) and $smarty.session.adminid eq '1') ? 'refundRequestManagement.php' : 'common_demo')}">
                            <i class="fa fa-search"></i>
                            Refund Request</a>
                    </li>
                </ul>
            </li>-->
            <li class="">
                <a href="javascript:void(0);">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">Management</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="<?php echo ADMIN_BASE_URL; ?>languages">
                            <i class="fa fa-font"></i>
                            Lanuage Setting</a>
                    </li>
                    <li class="">
                        <a href="<?php echo ADMIN_BASE_URL; ?>category/maincategory">
                            <i class="fa fa-sitemap"></i>
                            Main Category</a>
                    </li>
                    <li class="">
                        <a href="<?php echo ADMIN_BASE_URL; ?>category/subcategory">
                            <i class="fa fa-sitemap"></i>
                            Sub Category</a>
                    </li>
                    <li class="">
                        <a href="<?php echo ADMIN_BASE_URL; ?>formfields">
                            <i class="fa fa-book"></i>
                            Form Field</a>
                    </li>
                    <li class="">
                        <a  href="<?php echo ADMIN_BASE_URL; ?>memberships">
                            <i class="fa fa-save"></i>
                            MemberShip</a>
                    </li>

                </ul>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>