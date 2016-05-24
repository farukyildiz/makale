<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\Makale */
/* @var $form ActiveForm */
?>
<div class="blog-makale-makaleview">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'Ad') ?>
        <?= $form->field($model, 'Konu') ?>
        <?= $form->field($model, 'Metin') ?>
        <?= $form->field($model, 'Etiket') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- blog-makale-makaleview -->
