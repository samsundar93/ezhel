<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EZHEL</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;subset=latin-ext" rel="stylesheet">

    <title>Klikly</title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->element('partner/css') ?>
    <script>
        var partnerUlr = "<?php echo BASE_URL; ?>partners/";
    </script>

</head>
<body>
<?=
$this->element('partner/header');
?>
<?php echo $this->Flash->render(); ?>

<div class="pending_wrapper">
    <?php
    if(!empty($logginUser)) { ?>
    <div class="pending_wrapper">
        <?php
        echo $this->element('frontend/sidebar'); ?>

        <?php
        }
        ?>

        <?= $this->fetch('content') ?>

        <?php if(!empty($logginUser)) { ?>
            </div>
        <?php
        }
        ?>
</div>

<footer class="site-footer" style = "Background-color:#000000;">
    <?= $this->element('partner/footer') ?>
</footer>
<?= $this->element('partner/js') ?>


</body>
</html>

