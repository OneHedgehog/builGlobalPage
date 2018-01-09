<!--Element: Theme/styles - theme core styles -->
<!--begin::Web font -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
    WebFont.load({
        google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
        active: function () {
            sessionStorage.fonts = true;
        }
    });
</script>
<!--end::Web font -->
<!--begin::Base Styles -->
<!--begin::Page Vendors -->
<?php echo $this->fetch('custom_css'); ?>
<!--end::Page Vendors -->
<link href="/css/vendors.bundle.css" rel="stylesheet" type="text/css"/>
<link href="/css/style.bundle.css" rel="stylesheet" type="text/css"/>
<!--end::Base Styles -->