<?php
use yii\helpers\Html;
?>
<?php foreach ($posts as $post): ?>
<div class="post post-widget">
   
    <a class="post-img" href="<?=\yii\helpers\Url::to(['post/view', 'id'=>$post->id])?>">
       	<?php if($post->image_most_read):?>
	       <?= Html::img("@web/{$post->image_most_read}", ['alt' =>$post->getTitle()])?>
	    <?php else:?>
	        <?= Html::img("@web/placeHolder/placeHolder_view.png", ['alt' =>$post->getTitle()])?>
	    <?php endif?>  
    </a>  
    <div class="post-body">
        <h3 class="post-title"><a href="<?=\yii\helpers\Url::to(['post/view', 'id'=>$post->id])?>"><?= $post->getTitle()?></a></h3>
    </div>
</div>
<?php endforeach; ?>

