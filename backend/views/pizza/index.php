<?php

use common\models\Pizza;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\PizzaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pizzas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pizza-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pizza', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pizzaId',
            'pizzaName',
            'pizzaImage',
            'categoryId',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pizza $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pizzaId' => $model->pizzaId]);
                 }
            ],
        ],
    ]); ?>


</div>
