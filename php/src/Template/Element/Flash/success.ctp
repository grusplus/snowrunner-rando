<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script type="text/javascript">
    $(document).ready(function(){

        $.notify({
            icon: 'pe-7s-like2',
            message: '<?= $message ?>'

        },{
            type: 'success',
            timer: 4000
        });

    });
</script>
