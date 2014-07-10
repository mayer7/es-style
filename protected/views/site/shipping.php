<div class="order">

    <?php $this->renderPartial('_alert'); ?>
    <h1>Одежда в розницу</h1>

    <div class="hint">
        <div class="hint__icon-shipping"></div>
        <span class="hint__title">Доставка во все регионы </br>Почтой России</span>
    </div>
    <h3>Заказ товара</h3>
    <p>Уточнить интересующую Вас информаию и сделать заказ</br> можно несколькими способами:</p>
    <ul class="list list_shopping">
        <li class="list__item">Заполнить приведенную ниже форму.</li>
        <li class="list__item">Написать нам в социальных сетях.</li>
    </ul>

    <h3>Определение размера</h3>
    <p>Вы можете определить размер по <a class="link" href="#" data-toggle="modal" data-target="#size_tab">таблице</a>.</p>
    <p>Или в поле "Мерки" указать объем груди и объем бедер, мы подберем оптимальный для Вас размер.</p>

    <h3>Доставка и оплата</h3>
    <ul class="list list_shopping">
        <li class="list__item">После поступления заказа, мы проверим наличие размеров и свяжемся с Вами.</li>
        <li class="list__item">После подтверждения заказа, мы вышлем заказ в течении суток.</li>
        <li class="list__item">Мы осуществляем доставку во все регионы России наложенным платежом.</li>
        <li class="list__item">Оплата производится на почте в момент получения посылки.</li>
    </ul>
    <h3>Заказ</h3>
    <?php $this->renderPartial('_shipping_form',array('model'=>$model)); ?>
</div>
<?php $this->renderPartial('_size_tab'); ?>