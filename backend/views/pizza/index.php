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

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

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
            'description',
            [
                'attribute' => 'pizzaImage',
                'format' => 'html', // Set the format to HTML
                'value' => function ($model) {
                        return Html::img(Yii::$app->request->baseUrl . '/' . $model->pizzaImage, ['width' => '200px']);
                        // Assuming 'pizzaImage' contains the image path. Modify this according to your actual attribute name.
                    },
            ],
            [
                'attribute' => 'categoryId',
                'value' => function ($model) {
                        // Assuming you have a 'category' relation in your Book model
                        return $model->category->categoryName;
                    },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pizza $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'pizzaId' => $model->pizzaId]);
                    }
            ],
        ],
    ]); ?>


</div>