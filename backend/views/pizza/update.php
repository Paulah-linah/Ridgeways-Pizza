<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pizza $model */

$this->title = 'Update Pizza: ' . $model->pizzaId;
$this->params['breadcrumbs'][] = ['label' => 'Pizzas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pizzaId, 'url' => ['view', 'pizzaId' => $model->pizzaId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pizza-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
