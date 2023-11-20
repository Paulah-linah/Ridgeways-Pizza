<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Pizza $model */

$this->title = $model->pizzaId;
$this->params['breadcrumbs'][] = ['label' => 'Pizzas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pizza-view">

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <p>
        <?= Html::a('Update', ['update', 'pizzaId' => $model->pizzaId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pizzaId' => $model->pizzaId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pizzaId',
            'pizzaName',
            [
                'attribute' => 'pizzaImage',
                'format' => 'html', // Set the format to HTML
                'value' => function ($model) {
                return Html::img(Yii::$app->request->baseUrl . '/' . $model->pizzaImage, ['width' => '200px']);
                // Assuming 'pizzaImage' contains the image path. Modify this according to your actual attribute name.
            },
            ],
            'categoryId',

        ],
    ]) ?>

</div>