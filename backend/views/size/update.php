<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Size $model */

$this->title = 'Update Size: ' . $model->sizeId;
$this->params['breadcrumbs'][] = ['label' => 'Sizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sizeId, 'url' => ['view', 'sizeId' => $model->sizeId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="size-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
