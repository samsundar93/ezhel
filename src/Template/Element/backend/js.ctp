<?php
    echo $this->Html->script([
        //ADMIN_JS.'jquery-1.10.2.js',
        //ADMIN_JS.'bootstrap.min.js',
        //ADMIN_JS.'jquery-1.11.2.min.js',
        ADMIN_JS.'jquery-migrate.min.js',
        ADMIN_JS.'jquery-ui-1.10.3.custom.min.js',
        ADMIN_JS.'bootstrap.min.js',
        ADMIN_JS.'bootstrap-hover-dropdown.min.js',
        ADMIN_JS.'jquery.slimscroll.min.js',
        ADMIN_JS.'jquery.blockui.min.js',
        ADMIN_JS.'jquery.cokie.min.js',
        ADMIN_JS.'jquery.uniform.min.js',
        ADMIN_JS.'bootstrap-switch.min.js',
        ADMIN_JS.'metronic.js',
        ADMIN_JS.'layout.js',
        ADMIN_JS.'quick-sidebar.js',
        ADMIN_JS.'demo.js',
        ADMIN_JS.'index.js',
        ADMIN_JS.'tasks.js',
        ADMIN_JS.'admin_common.js',
        ADMIN_JS.'validation.js',
    ]);

    if(($controller == 'Category' && ($action == 'subcategory'|| $action == 'maincategory')) || ($controller == 'Customers' && $action == 'index') || ($controller == 'Serviceproviders' && $action == 'index') || ($controller == 'Orders') || ($controller == 'Jobs') || ($controller == 'Languages' && $action == 'index')|| ($controller == 'Memberships' && $action == 'index')|| ($controller == 'Formfields' && $action == 'index') ) {
        echo $this->Html->script([
            ADMIN_JS.'dataTables.buttons.min.js',
            ADMIN_JS.'jquery.dataTables.min.js',
            ADMIN_JS.'category.js',
        ]);
    }


?>
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
        Index.init();
        Index.initDashboardDaterange();
        Index.initJQVMAP(); // init index pages custom scripts
        Index.initCalendar(); // init index pages custom scripts
        Index.initCharts(); // init index pages custom scripts
        Index.initChat();
        Index.initMiniCharts();
        Tasks.initDashboardWidget();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('[onchange="closemask(this)"]').each(function(){
            if(this.checked){
                $(this).parents().children(".closed_mask").addClass("closed");
            }
            else{
                $(this).parents().children(".closed_mask").removeClass("closed");
            }
        });
    });


    function closemask(id){
        if(id.checked){
            $(id).parents().children(".closed_mask").addClass("closed");
        }
        else{
            $(id).parents().children(".closed_mask").removeClass("closed");
        }
    };
</script>

