<?php if(!empty($session['bookCart'])): ?>
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th class="text-center"><?= Yii::t('yii','Rasm')?></th>
					<th><?= Yii::t('yii','Mahsulot')?></th>
					<th class="text-center"><?= Yii::t('yii','Miqdori')?></th>
					<th class="text-center"><?= Yii::t('yii','Narxi')?></th>
					<th class="text-center"><?= Yii::t('yii','O‘chirish')?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($session['bookCart'] as $id => $item):?>
					<tr>
						<td width="20">
							<?php if ($item['img']): ?>
								<?= \yii\helpers\Html::img("@web/".$item['img'],  ['alt' => $item['name'], 'height'=>50,'width'=>40]) ?>
							<?php else: ?>
								<?= \yii\helpers\Html::img("@web/placeHolder/book.png",  ['alt' => $item['name'], 'height'=>50,'width'=>40]) ?>
							<?php endif ?>
             			</td>
						<td><?= $item['name']?></td>
						<td class="text-center"><?= $item['qty']?> ta</td>
						<td class="text-center"><?= $item['price']?> so‘m</td>
						<td class="text-center">
							<span style="cursor: pointer;margin:10px" data-id="<?=$id?>" title="Cler" class="btn btn-danger fa fa-trash-o text-danger del-item" aria-hidden="true"></span>
						</td>
					</tr>
				<?php endforeach?>
				<tr>
					<td colspan="4"><?= Yii::t('yii','Jami miqdori: ')?></td>
					<td><b><?=$session['bookCart.qty']?> ta</b></td>
				</tr>
				<tr>
					<td colspan="4"><?= Yii::t('yii','Jami summasi: ')?></td>
					<td><b><?=$session['bookCart.sum']?> so‘m</b></td>
				</tr>

			</tbody>
		</table>
	</div>
	<?php else: ?>
		<h3><?= Yii::t('yii','Savat bo\'sh')?></h3>
	<?php endif;?>