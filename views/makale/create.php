<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\Makale */

$this->title = 'Create Makale';
$this->params['breadcrumbs'][] = ['label' => 'Makales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="makale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
