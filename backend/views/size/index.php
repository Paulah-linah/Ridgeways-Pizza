<?php

use common\models\Size;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\SizeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sizes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="size-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Size', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sizeId',
            'sizeName',
            'price',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Size $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'sizeId' => $model->sizeId]);
                 }
            ],
        ],
    ]); ?>


</div>
