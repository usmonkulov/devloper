<?php foreach ($informations as $information):?>
	<ul>
	    <li><p><strong><?=Yii::t('yii','Email')?>:</strong> <a href="#"><?=$information->email?></a></p></li>
	    <li><p><strong><?=Yii::t('yii','Phone')?>:</strong> <?=$information->phone?></p></li>
	    <li><p><strong><?=Yii::t('yii','Address')?>:</strong> <?=$information->getAddress()?></p></li>
	</ul>
<?php endforeach?>