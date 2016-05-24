<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\Makale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="makale-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Ad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Konu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Metin')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Etiket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
