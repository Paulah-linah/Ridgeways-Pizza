<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\CartItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cart-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pizzaId')->textInput() ?>

    <?= $form->field($model, 'sizeId')->textInput() ?>

    <?= $form->field($model, 'userId')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
