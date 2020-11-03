<?php
use yii\helpers\Html;
?>
<?php foreach ($logos as $logo): ?>
	<?php if($logo->image):?>
        <?= Html::img("@web/{$logo->image}", ['alt' => Yii::t('yii','no-image')])?>
    <?php else:?>
        <?= Html::img("@web/placeHolder/no-image.png", ['alt' => Yii::t('yii','no-image')])?>
    <?php endif?>
<?php endforeach; ?>