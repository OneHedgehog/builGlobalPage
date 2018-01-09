<!DOCTYPE html>
<html>
<head>
    <?php echo $this->element('Meta/main'); ?>
    <?php echo $this->element('title'); ?>
    <?php echo $this->element('Theme/styles'); ?>
    <?php echo $this->element('favicon'); ?>
    <?php echo $this->element('Analytics/main'); ?>
</head>
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<?php echo $this->fetch('content'); ?>
    <?php echo $this->element('Theme/scripts'); ?>
    <?php echo $this->fetch('custom_js'); ?>
</body>
</html>