<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pizza $model */

$this->title = 'Create Pizza';
$this->params['breadcrumbs'][] = ['label' => 'Pizzas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pizza-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
