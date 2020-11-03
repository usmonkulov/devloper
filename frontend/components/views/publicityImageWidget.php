<?php
use yii\helpers\Html;
?>
<?php foreach ($publicityImage as $publicityImag):?>
<div class="col-md-12">
	<div class="section-row">
		<a href="<?=$publicityImag->url?>">
			<?php if($publicityImag->image):?>
                <?= Html::img("@web/{$publicityImag->image}", ['class' => 'img-responsive center-block','alt' =>$publicityImag->title])?>
            <?php else:?>
                <?= Html::img("@web/placeHolder/ad-2.jpg",['class' => 'img-responsive center-block','alt' =>$publicityImag->title])?>
            <?php endif?> 
		</a>
	</div>
</div>
<?php endforeach?>