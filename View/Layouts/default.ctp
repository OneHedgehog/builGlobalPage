<!DOCTYPE html>
<html>
<head>
    <?php echo $this->element('Meta/main'); ?>
    <?php echo $this->element('title'); ?>
    <?php echo $this->element('Theme/styles'); ?>
    <?php echo $this->element('favicon'); ?>
    <?php echo $this->element('Analytics/main'); ?>
</head>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default">
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <?php echo $this->element('Layout/header'); ?>
        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <?php echo $this->element('Layout/menu'); ?>
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <div class="m-content">
                    <?php echo $this->Flash->render(); ?>
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
        <?php echo $this->element('Layout/footer'); ?>
    </div>
    <!-- end:: Page -->
    <!-- begin::Scroll Top -->
    <div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->
    <?php echo $this->element('Theme/scripts'); ?>
    <?php echo $this->fetch('custom_js'); ?>
</body>
</html>