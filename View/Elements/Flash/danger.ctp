<div id="<?php echo $key; ?>Message" class="m-alert m-alert--outline alert alert-danger alert-dismissible fade show <?php echo !empty($params['class']) ? $params['class'] : 'message'; ?>" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    </button>
    <strong>Ошибка!</strong> <?php echo $message; ?>
</div>