<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script type="text/javascript">
    $(document).ready(function(){

        $.notify({
            icon: 'pe-7s-info',
            message: '<?= $message ?>'

        },{
            type: 'error',
            timer: 4000
        });

    });
</script>