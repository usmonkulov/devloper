<?php foreach ($bookAuthors as $bookAuthors): ?>
<?php $bookProducts = $bookAuthors->bookProducts;?>
 <li><a href="<?=\yii\helpers\Url::to(['book-author/view', 'id'=>$bookAuthors->id])?>" class="cat-4"><?= $bookAuthors->getFnf()?><span><?= count($bookProducts)?></span></a></li>
<?php endforeach; ?>

<?php foreach ($bookAuthorsis as $bookAuthors): ?>
<?php $bookProducts = $bookAuthors->bookProducts;?>
<div style="margin-top: 10px" class="collapse collapseExamples">
	<li><a href="<?=\yii\helpers\Url::to(['book-author/view', 'id'=>$bookAuthors->id])?>" class="cat-4"><?= $bookAuthors->getFnf()?><span><?= count($bookProducts)?></span></a></li>
</div>
<?php endforeach; ?>
<li style="margin-top: 10px">
	<a class="accordion" role="button" data-toggle="collapse" href=".collapseExamples" aria-expanded="false" aria-controls="collapseExamples">
	    <?=Yii::t('yii', 'Other authors')?>
	</a>
</li>

<style>
.accordion:before {
    float: right !important;
    font-family: FontAwesome;
    content:"\f067";
    padding-right: 5px;
}
.activeaa:before {
    float: right !important;
    content:"\f068";
}
</style>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("activeaa");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
</script>
