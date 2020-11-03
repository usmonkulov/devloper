<?php foreach ($categories as $categorie): ?>
	<?php $posts = $categorie->posts;?>
	<li><a href="<?=\yii\helpers\Url::to(['category/view', 'id'=>$categorie->id])?>" class="cat-<?= $categorie->color?>"><?= $categorie->getTitle()?><span><?= count($posts);?></span></a></li>
<?php endforeach; ?>