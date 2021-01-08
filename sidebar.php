<?php
if(!is_active_sidebar('right-sidebar')) return;
?>
<div class="mx-3 mx-md-0 mb-3 col-md-3">
    <?php dynamic_sidebar('right-sidebar'); ?>
</div>