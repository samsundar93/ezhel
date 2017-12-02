<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<?php
    echo $this->Html->css([
        FRONT_CSS.'bootstrap.min.css',
        FRONT_CSS.'slick.css',
        FRONT_CSS.'slick-theme.css',
        FRONT_CSS.'style.css',
    ]);

    if($this->request->session()->read('sessionLang') == 'AR') {
        echo $this->Html->css([
            FRONT_CSS.'arabic.css'
        ]);

    }

    if($controller == 'Services') {
        echo $this->Html->css([
            FRONT_CSS.'jquery-ui.min.css',
            FRONT_CSS.'jquery-ui-timepicker-addon.min.css',
        ]);
    }


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php
echo $this->Html->script([
    //FRONT_JS.'jquery-1.9.1.min.js',
    FRONT_JS.'bootstrap.min.js',
    FRONT_JS.'slick.js',
    FRONT_JS.'jquery-ui.min.js',
    FRONT_JS.'jquery-ui-timepicker-addon.min.js',
    FRONT_JS.'jquery-ui-sliderAccess.js',
    FRONT_JS.'myjs.js',
]);
if($action == 'profile') {
    echo $this->Html->script([
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyAzYAo0kwVA0qTj7iPEedXbAoBx03UI9Lg&libraries=places&region=IN',

    ]);

}
?>


