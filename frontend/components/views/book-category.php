<?php foreach ($bookCategorys as $bookCategory): ?>
<?php $bookProducts = $bookCategory->bookProducts;?>
 <li><a href="<?=\yii\helpers\Url::to(['book-category/view', 'id'=>$bookCategory->id])?>" class="cat-4"><?= $bookCategory->getName()?><span><?= count($bookProducts)?></span></a></li>
<?php endforeach; ?>

<?php foreach ($bookCategoryies as $bookCategory): ?>
<?php $bookProducts = $bookCategory->bookProducts;?>
<div style="margin-top: 10px" class="collapse collapseExample">
	<li><a href="<?=\yii\helpers\Url::to(['book-category/view', 'id'=>$bookCategory->id])?>" class="cat-4"><?= $bookCategory->getName()?><span><?= count($bookProducts)?></span></a></li>
</div>
<?php endforeach; ?>
<li style="margin-top: 10px">
	<a class="accordion" role="button" data-toggle="collapse" href=".collapseExample" aria-expanded="false" aria-controls="collapseExample">
	    <?=Yii::t('yii', 'Other categories')?>
	</a>
</li>

<style>
.accordion:before {
    float: right !important;
    font-family: FontAwesome;
    content:"\f067";
    padding-right: 5px;
}
.activea:before {
    float: right !important;
    content:"\f068";
}
</style>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("activea");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
</script>
