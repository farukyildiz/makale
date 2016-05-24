<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\Yorum */

$this->title = 'Create Yorum';
$this->params['breadcrumbs'][] = ['label' => 'Yorums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yorum-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
