<?php

use common\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Pizza $model */
/** @var yii\widgets\ActiveForm $form */
$categories = ArrayHelper::map(Category::find()->all(), 'categoryId', 'categoryName');

?>

<div class="pizza-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pizzaName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pizzaImageFile')->fileInput() ?>

    <?= $form->field($model, 'categoryId')->dropDownList($categories, ['prompt' => 'Select Category']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>