<?php
use yii\bootstrap\BootstrapPluginAsset;
use yii\helpers\Html;
use kilyakus\package\translate\widgets\TranslateForm;
BootstrapPluginAsset::register($this);

$labelOptions = ['class' => 'control-label'];
$inputOptions = ['class' => 'form-control'];
?>

<p>
	<?= Html::a(Yii::t('easyii', 'Seo texts'), '#seo-form', ['class' => 'dashed-link collapsed', 'data-toggle' => 'collapse', 'aria-expanded' => 'false', 'aria-controls' => 'seo-form']); ?>
</p>

<div class="collapse" id="seo-form">
    <div class="form-group">
        <?php /* Html::activeLabel($model, 'h1', $labelOptions) */ ?>
        <?php /* Html::activeTextInput($model, 'h1', $inputOptions) */ ?>
        <?= TranslateForm::widget(['model' => $model, 'attribute' => 'h1']); ?>
    </div>
    <div class="form-group">
        <?php /* Html::activeLabel($model, 'title', $labelOptions) */  ?>
        <?php /* Html::activeTextInput($model, 'title', $inputOptions) */ ?>
        <?= TranslateForm::widget(['model' => $model, 'attribute' => 'title']); ?>
    </div>
    <div class="form-group">
        <?php /* Html::activeLabel($model, 'keywords', $labelOptions) */ ?>
        <?php /* Html::activeTextInput($model, 'keywords', $inputOptions) */ ?>
        <?= TranslateForm::widget(['model' => $model, 'attribute' => 'keywords']); ?>
    </div>
    <div class="form-group">
        <?php /* Html::activeLabel($model, 'description', $labelOptions) */  ?>
        <?php /* Html::activeTextarea($model, 'description', $inputOptions) */  ?>
        <?= TranslateForm::widget(['model' => $model, 'attribute' => 'description']); ?>
    </div>
</div>