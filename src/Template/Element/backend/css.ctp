<?php

if($controller == 'Users' && $action == 'login') {
    echo $this->Html->css([
        ADMIN_CSS . 'font-awesome.css',
        ADMIN_CSS . 'bootstrap.css',
        ADMIN_CSS . 'admin_login.css',
        ADMIN_CSS . 'components.css',
        ADMIN_CSS . 'plugins.css',
    ]);
}else {
    echo $this->Html->css([
        ADMIN_CSS . 'font-awesome.css',
        ADMIN_CSS . 'bootstrap.css',
        ADMIN_CSS . 'layout.css',
        ADMIN_CSS . 'components.css',
        ADMIN_CSS . 'plugins.css',
        ADMIN_CSS . 'tasks.css',
        ADMIN_CSS . 'default.css',
        ADMIN_CSS . 'custom.css',
        ADMIN_CSS . 'style.css',
        ADMIN_CSS . 'simple-line-icons.css',
        ADMIN_CSS . 'uniform.default.css',
        ADMIN_CSS . 'bootstrap-switch.min.css',
    ]);

}



if(($controller == 'Category' && ($action == 'subcategory'|| $action == 'maincategory')) || ($controller == 'Customers' && $action == 'index') || ($controller == 'Serviceproviders' && $action == 'index')|| ($controller == 'Orders')|| ($controller == 'Jobs')|| ($controller == 'Languages' && $action == 'index')|| ($controller == 'Memberships' && $action == 'index') || ($controller == 'Formfields' && $action == 'index') ) {
    echo $this->Html->css([
        ADMIN_CSS.'jquery.dataTables.min.css',
        ADMIN_CSS.'buttons.dataTables.min.css'
    ]);
}

    echo $this->Html->script([
        ADMIN_JS.'jquery-1.11.2.min.js',
    ]);

if($controller == 'Serviceproviders') {
    echo $this->Html->script([
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyAzYAo0kwVA0qTj7iPEedXbAoBx03UI9Lg&libraries=places&region=IN',
        ADMIN_JS.'onlyaddress.js'

    ]);
    //AIzaSyCbF87_gxLI8KUpk3MVmHC9pDlqoYWyuNQ

}

