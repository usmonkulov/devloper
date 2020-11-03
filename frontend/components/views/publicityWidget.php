<?php
use yii\helpers\Html;
?>
<?php foreach ($publicitys as $publicity):?>
<div class="aside-widget text-center">
    <a href="<?=$publicity->url?>" style="display: inline-block;margin: auto;">
        <?php if($publicity->image):?>
            <?= Html::img("@web/{$publicity->image}", ['class' => 'img-responsive','alt' =>$publicity->title])?>
        <?php else:?>
            <?= Html::img("@web/placeHolder/ad-1.jpg",['class' => 'img-responsive','alt' =>$publicity->title])?>
        <?php endif?> 
    </a>
</div>
<?php endforeach?>