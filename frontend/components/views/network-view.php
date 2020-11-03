<?php foreach ($networks as $network): ?>
   <a href="<?=$network->url?>" class="share-<?= $network->class?>"><i class="fa fa-<?= $network->class?>"></i></a>
<?php endforeach; ?>