<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\CartItem $model */

$this->title = 'Update Cart Item: ' . $model->cartItemId;
$this->params['breadcrumbs'][] = ['label' => 'Cart Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cartItemId, 'url' => ['view', 'cartItemId' => $model->cartItemId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cart-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
