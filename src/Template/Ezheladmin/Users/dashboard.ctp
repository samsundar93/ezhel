<h3 class="page-title">
    Home
    <small>Reports & Statistics</small>
</h3>
<div class="page-bar">
</div>
<div class="row">
    <div class="col-md-4">

        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-newspaper-o"></i>Projects Overview
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#overview_1" data-toggle="tab">
                                Today </a>
                        </li>
                        <li>
                            <a href="#overview_2" data-toggle="tab">
                                Week </a>
                        </li>
                        <li>
                            <a href="#overview_3" data-toggle="tab">
                                Month </a>
                        </li>
                        <li class="dropdown">
                            <a href="#overview_4"data-toggle="tab">
                                Year
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="overview_1">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th colspan="2">
                                            {$day}, {$month} {$date}, {$currentyear}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <a href="postProjectManage.php?cond=today" >
                                                New Projects Today
                                            </a>
                                        </td>
                                        <td>
                                            {$newjobtoday}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="completedProjectManage.php?cond=today">
                                                Completed Today
                                            </a>
                                        </td>
                                        <td>
                                            {$comjobtoday}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="overview_2">
                            {if is_object($objAdminMgmt)}{assign var=week value=$objAdminMgmt->projectCountWeek()}{/if}
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th  colspan="2">
                                        Week
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href="postProjectManage.php?cond=week" >
                                            New Projects Week
                                        </a>
                                    </td>
                                    <td>{$week.totalnewjobweek}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="completedProjectManage.php?cond=week">
                                            Completed Week
                                        </a>
                                    </td>
                                    <td>{$week.comjobweek}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="overview_3">
                            {if is_object($objAdminMgmt)}{assign var=months value=$objAdminMgmt->projectCountMonth()}{/if}
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="2">
                                        {$month}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href="postProjectManage.php?cond=month" >
                                            New Projects Month
                                        </a>
                                    </td>
                                    <td> {$months.totaljobmonth} </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="completedProjectManage.php?cond=month">
                                            Completed Month
                                        </a>
                                    </td>
                                    <td> {$months.comjobmonth} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="overview_4">
                            {if is_object($objAdminMgmt)}{assign var=year value=$objAdminMgmt->projectCountYear()}{/if}
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        {$currentyear}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href="postProjectManage.php?cond=year" >
                                            New Projects Year
                                        </a>
                                    </td>
                                    <td> {$year.totaljobyear} </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="completedProjectManage.php?cond=year">
                                            Completed Year
                                        </a>
                                    </td>
                                    <td> {$year.comjobyear} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <a class="col-md-6 col-xs-12 margin-bottom-10" href="admin_change_pwd.php">
                <div class="rightContImage_outer">
					<span class="rightContImg">
						<img style="width:24px" src="<?php echo BASE_URL ?>backend/images/icon_changepwd.png" />
					</span>
                    <span class="rightConttext">Change Password</span>
                </div>
            </a>
            <a class="col-md-6 col-xs-12 margin-bottom-10" href="site_setting.php">
                <div class="rightContImage_outer">
					<span class="rightContImg">
						<img style="width:24px" src="<?php echo BASE_URL ?>backend/images/icon_sitesetting.png" />
					</span>
                    <span class="rightConttext">Site Setting</span>
                </div>
            </a>
        </div>
        <div class="row ">
            <a class="col-md-6 col-xs-12 margin-bottom-10" href="categoryManage.php">
                <div class="rightContImage_outer">
					<span class="rightContImg">
						<img style="width:24px" src="<?php echo BASE_URL ?>backend/images/icon_main_categories.png" />
					</span>
                    <span class="rightConttext">Category Manage</span>
                </div>
            </a>

            <a class="col-md-6 col-xs-12 margin-bottom-10" href="featureCityManage.php">
                <div class="rightContImage_outer">
					<span class="rightContImg">
						<img  style="width:24px"  src="<?php echo BASE_URL ?>backend/images/icon_zipcode.png" />
					</span>
                    <span class="rightConttext">Feature City List</span>
                </div>
            </a>
        </div>

    </div>
    <div class="col-md-8">
        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Users
                </div>
            </div>

            <div class="portlet-body">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#userview_1" data-toggle="tab">
                                Contractor</a>
                        </li>
                        <li>
                            <a href="#userview_2" data-toggle="tab">
                                HomeOwner </a>
                        </li>
                        <li>
                            <a href="#userview_3" data-toggle="tab">
                                Last 20 Completed Projects </a>
                        </li>
                        <li class="dropdown">
                            <a href="#userview_4"data-toggle="tab">
                                Last 10 New Waiting Projects
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="userview_1">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th colspan="2">
                                            Contractors
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Total Contractors</td>
                                        <td>{$tot_tradmen}</td>
                                    </tr>
                                    <tr>
                                        <td>Active Contractors</td>
                                        <td>{$active_tradmen}</td>
                                    </tr>
                                    <tr>
                                        <td>Inactive Contractors</td>
                                        <td>{$inactive_tradmen}</td>
                                    </tr>
                                    <tr>
                                        <td>Deleted Contractors</td>
                                        <td>{$deleted_tradmen}</td>
                                    </tr>
                                    <tr>
                                        <td>Contractors joined this week</td>
                                        <td>{$thisweek_tradmen}</td>
                                    </tr>
                                    <tr>
                                        <td>Contractors joined this month</td>
                                        <td>{$thismon_tradmen}</td>
                                    </tr>
                                    <tr>
                                        <td>Contractors joined this year</td>
                                        <td>{$thisyear_tradmen}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="userview_2">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th colspan="2">
                                            Homeowner
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Total Homeowner</td>
                                        <td>{$tot_homeown}</td>
                                    </tr>
                                    <tr>
                                        <td>Active Homeowner</td>
                                        <td>{$active_homeown}</td>
                                    </tr>
                                    <tr>
                                        <td>Inactive Homeowner</td>
                                        <td>{$inactive_homeown}</td>
                                    </tr>
                                    <tr>
                                        <td>Deleted Homeowner</td>
                                        <td>{$deleted_homeown}</td>
                                    </tr>
                                    <tr>
                                        <td>Homeowner joined this week</td>
                                        <td>{$thisweek_homeown}</td>
                                    </tr>
                                    <tr>
                                        <td>Homeowner joined this month</td>
                                        <td>{$thismon_homeown}</td>
                                    </tr>
                                    <tr>
                                        <td>Homeowner joined this year</td>
                                        <td>{$thisyear_homeown}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane" id="userview_3">
                            {if is_object($objAdminMgmt)}{assign var=lastcomplete value=$objAdminMgmt->lastCompletedJob()}{/if}
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Contractor Name</td>
                                        <td>Project ID</td>
                                        <td>Project Category</td>
                                        <td>Completed At</td>
                                    </tr>

                                    {section name="last" loop=$lastcomplete}
                                    <tr>
                                        <td><a href="completedProjectManage.php?jobid={$lastcomplete[last].id}">{$lastcomplete[last].publicusername|ucfirst|stripslashes}</a></td>
                                        <td><a href="completedProjectManage.php?jobid={$lastcomplete[last].id}">{$lastcomplete[last].project_id|ucfirst|stripslashes}</a></td>
                                        <td><a href="completedProjectManage.php?jobid={$lastcomplete[last].id}">{$lastcomplete[last].pro_catname|stripslashes}</a></td>
                                        <td><a href="completedProjectManage.php?jobid={$lastcomplete[last].id}">{$lastcomplete[last].completed_date|date_format:"%b %d, %Y"}</a></td>
                                    </tr>
                                    {sectionelse}
                                    <tr>

                                        <td colspan="15" class="text-center">No Record Found</td>
                                    </tr>
                                    {/section}
                                </table>

                                </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane" id="userview_4">
                            {if is_object($objAdminMgmt)}{assign var=lastnewleds value=$objAdminMgmt->lastNewleads()}{/if}
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Project ID</td>
                                        <td>Name</td>
                                        <td>Category</td>
                                        <td>Location</td>
                                        <td>Posted At</td>
                                    </tr>

                                    {section name="last" loop=$lastnewleds}
                                    <tr>
                                        <td><a href="postProjectManage.php?jobid={$lastnewleds[last].id}">{$lastnewleds[last].project_id|ucfirst|stripslashes}</a></td>
                                        <td><a href="postProjectManage.php?jobid={$lastnewleds[last].id}">{$lastnewleds[last].publicusername|ucfirst|stripslashes}</a></td>
                                        <td><a href="postProjectManage.php?jobid={$lastnewleds[last].id}">{$lastnewleds[last].pro_catname|ucfirst|stripslashes}</a></td>
                                        <td><a href="postProjectManage.php?jobid={$lastnewleds[last].id}">{$lastnewleds[last].pro_location}</a></td>
                                        <td><a href="postProjectManage.php?jobid={$lastnewleds[last].id}">{$lastnewleds[last].postdate|date_format:"%b %d, %Y"}</a></td>
                                    </tr>
                                    {sectionelse}
                                    <tr>

                                        <td colspan="15" class="text-center">No Record Found</td>
                                    </tr>
                                    {/section}
                                </table>

                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div id="totalUsers" class="clr"></div>
        <div id="postedJob" class="clr"></div>
    </div>
</div>