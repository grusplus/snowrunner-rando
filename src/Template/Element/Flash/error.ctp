<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script type="text/javascript">
    $(document).ready(function(){

        $.notify({
            icon: 'pe-7s-attention',
            message: '<?= $message ?>'

        },{
            type: 'danger',
            timer: 4000
        });

    });
</script>
