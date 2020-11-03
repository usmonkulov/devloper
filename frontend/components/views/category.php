<?php foreach ($categories as $categorie): ?>
<li class="cat-<?= $categorie->color?>"><a href="<?=\yii\helpers\Url::to(['category/view', 'id'=>$categorie->id])?>"><?= $categorie->getTitle()?></a></li>
<?php endforeach; ?>