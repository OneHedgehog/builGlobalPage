<!--Element: title - title tag with title block in it -->
<?php
    // title suffix
    $this->append('title');
?>
| Maxi<?php $this->end(); ?>
<title><?php echo $this->fetch('title'); ?></title>