<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PizzaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pizza-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pizzaId') ?>

    <?= $form->field($model, 'pizzaName') ?>

    <?= $form->field($model, 'pizzaImage') ?>

    <?= $form->field($model, 'categoryId') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
