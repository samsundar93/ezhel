<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php
        echo ($controller == 'Users' && $action == 'dashboard') ? 'EzhelAdmin' : $controller .' '. $action;
        ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <?=
    $this->Html->meta('icon')
    ?>

    <script>
        var jssitebaseUrl = "<?php echo BASE_URL; ?>ezheladmin";
    </script>

    <!--Include CSS files-->
    <?=
    $this->element('backend/css')
    ?>

</head>
<body class="<?php echo ($action == 'login') ? 'login' : 'page-header-fixed page-quick-sidebar-over-content page-style-square' ?>">

    <?php if($logginUser){ ?>

        <?php
        echo $this->element('backend/header');
        ?>
        <div class="page-container">
            <?php echo $this->element('backend/leftside'); ?>

            <?php } ?>
            <!--BODY CONTENT START-->
            <?php
            echo $this->Flash->render();
            ?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <?=
                    $this->fetch('content')
                    ?>
                </div>
            </div>
        </div>



    <?= $this->element('backend/js') ?>
</body>
</html>