<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EZHEL</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;subset=latin-ext" rel="stylesheet">

        <title>Klikly</title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->element('frontend/css') ?>
        <script>
            var jssitebaseUrl = "<?php echo BASE_URL; ?>";
        </script>

    </head>
    <body>
    <div class="main-wrapper">
        <?=
            $this->element('frontend/header');
        ?>
        <?php echo $this->Flash->render(); ?>
        <?php
        if($controller == 'Partners' && isset($logginUser['role_id']) && $logginUser['role_id'] == '2' ) { ?>
            <div class="pending_wrapper">
        <?php
            echo $this->element('frontend/sidebar'); ?>

        <?php
        }
        ?>

        <?= $this->fetch('content') ?>

        <?php if($controller == 'Partners' && isset($logginUser['role_id']) && $logginUser['role_id'] == '2' ) { ?>
            </div>
        <?php
        }
        ?>

        <footer class="site-footer" style = "Background-color:#000000;">
            <?= $this->element('frontend/footer') ?>
        </footer>
        <?= $this->element('frontend/js') ?>
    </div>

    </body>
</html>

