<?php
if(isset($_SESSION['flash_message'])): ?>
    <div class="alert alert-<?=$_SESSION['flash_message']['type']?> alert-dismissible fade show" role="alert">
        <?=$_SESSION['flash_message']['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    unset($_SESSION['flash_message']);
    endif;
?>