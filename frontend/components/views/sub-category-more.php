<?php foreach ($categories as $categorie): ?>
	<?php $posts = $categorie->posts;?>
		<li>
			<a href="<?=\yii\helpers\Url::to(['category/more-view', 'id'=>$categorie->id])?>"><?= $categorie->getTitle()?>
			</a>
		</li>
<?php endforeach; ?>