<div class="order">
    <?php $this->renderPartial('_'.$type); ?>
    <h3>Заказ</h3>
    <div id="data">
        <?php $this->renderPartial('_order_form',array('model'=>$model, 'type'=>$type)); ?>
    </div>
</div>
<?php $this->renderPartial('_size_tab'); ?>

<script>
$( "#submit" ).live( "click", function() {
        $.ajax({
            url: '/<?= $type?>',
            type: 'POST',
            data: $( "#order-form" ).serialize(),
            success: function(responseText){
                $('#data').html(responseText);
                if($('.alert').length){
                    $.each($( "#order-form" ).find('input'), function() {
                        $(this).val('');
                    });
                    $.each($( "#order-form" ).find('textarea'), function() {
                        $(this).val('');
                    });
                }
            }
        });
    });
</script>