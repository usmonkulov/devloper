<?php foreach ($networks as $network): ?>
  <li><a href="<?=$network->url?>"><i class="fa fa-<?= $network->class?>"></i></a></li>
<?php endforeach; ?>