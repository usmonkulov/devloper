<?php foreach ($categories_archive as $categories): ?>
	<li><a href="<?=\yii\helpers\Url::to(['category/view', 'id'=>$categories->id])?>"><?= mb_substr($categories->updated_at,0,20)?></a></li>
<?php endforeach; ?>