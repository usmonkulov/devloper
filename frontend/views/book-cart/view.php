<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','New Books'), 'url' => ['book-category/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-cart-view">
<?php if(!empty($session['bookCart'])): ?>
	<!-- Page Header -->
	<div class="page-header">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-10">
	                <?php try 
	                    {
	                      echo Breadcrumbs::widget(
	                        [
	                          'homeLink' => ['label' => Yii::t('yii', 'Home'), 'url' => Yii::$app->urlManager->createUrl("/")],
	                          'tag' => 'ol',
	                          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	                          'options' => ['class' => 'page-header-breadcrumb'],
	                          'encodeLabels' => false
	                        ]
	                      );
	                    } catch ( Exception $e ) 

	                    {
	                      echo $e->getMessage();
	                    } 
	                    ?>
	                <h1><?=$this->title?></h1>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- /Page Header -->
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">

        <!-- START ALERTS AND CALLOUTS -->
        <?php if(Yii::$app->session->hasFlash('error') ): ?>
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
        <?php endif;?>     
        <!-- END ALERTS AND CALLOUTS -->
			<div class="row">
					<?php $form = ActiveForm::begin(['options' => ['class' => 'post-reply']]); ?>
					<div class="col-md-7">
						<div class="section-row">
							<div class="section-title">
								<h2><?=Yii::t('yii', 'Yetkazib berish ma’lumotlari')?></h2>
							</div>
								<div class="row">
									<div class="col-md-6">
										<?= $form->field($bookOrder, 'name',
		                                    ['options' => 
		                                        [
		                                            'tag' => 'div',
		                                            'class' => 'form-group'
		                                        ],
		                                    'template' => '<span>'.Yii::t('yii', 'Last name, First name, Patronymic').'</span>{input}
		                                        {error}{hint}'
		                                    ])->textInput(
		                                    [
		                                        'class' => 'input',
		                                        'placeholder' => Yii::t('yii', 'FIO')
		                                    ]
		                                ) ?>

		                                <?= $form->field($bookOrder, 'phone',
		                                    ['options' => 
		                                        [
		                                            'tag' => 'div',
		                                            'class' => 'form-group'
		                                        ],
		                                    'template' => '<span>'.Yii::t('yii', 'Phone').'</span>{input}
		                                        {error}{hint}'
		                                    ])->textInput(
		                                    [
		                                        'class' => 'input',
		                                        'id' => 'phoneNumber',
		                                        'value' => '+998'
		                                    ]
		                                ) ?>

		                                <?= $form->field($bookOrder, 'email',
		                                    ['options' => 
		                                        [
		                                            'tag' => 'div',
		                                            'class' => 'form-group'
		                                        ],
		                                    'template' => '<span>'.Yii::t('yii', 'Email').'</span>{input}
		                                        {error}{hint}'
		                                    ])->textInput(
		                                    [
		                                        'class' => 'input',
		                                        'placeholder' => Yii::t('yii', 'E-mail')
		                                    ]
		                                ) ?>
		
									</div>
									<div class="col-md-6">

										<?= $form->field($bookOrder, 'region_id',
					                        ['options' => 
		                                        [
		                                            'tag' => 'div',
		                                            'class' => 'form-group'
		                                        ],
		                                    'template' => '<span>'.Yii::t('yii', 'Region').'</span>{input}
		                                        {error}{hint}'
		                                    ]
					                    )->dropDownList(
					                        $bookOrder->getRegionList(), 
					                        [
					                            'class' => 'input',
					                            'prompt' => Yii::t('yii','Select a region'),
					                            'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('site/city?id=').'"+$(this).val(),function(data){$("#bookorder-city_id").html(data);});'
					                        ]
					                    ) ?>

		                                <?= $form->field($bookOrder, 'city_id',
					                        ['options' => 
		                                        [
		                                            'tag' => 'div',
		                                            'class' => 'form-group'
		                                        ],
		                                    'template' => '<span>'.Yii::t('yii', 'District or City').'</span>{input}
		                                        {error}{hint}'
		                                    ]
					                    )->dropDownList(
					                        $bookOrder->getCityList(),
					                        [
					                            'class' => 'input',
					                            'prompt' => Yii::t('yii','Select District or City')
					                        ]
					                    ) ?>


		                                <?= $form->field($bookOrder, 'address',
		                                    ['options' => 
		                                        [
		                                            'tag' => 'div',
		                                            'class' => 'form-group'
		                                        ],
		                                    'template' => '<span>'.Yii::t('yii', 'Address').'</span>{input}
		                                        {error}{hint}'
		                                    ])->textInput(
		                                    [
		                                        'class' => 'input',
		                                        'placeholder' => Yii::t('yii', 'Lalmikor MFY 20A-uy')
		                                    ]
		                                ) ?>
		
									</div>
								</div>
								<div class="aspect-ratio">
	                           <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A74daa5737daabc8bca547db0ea8ac356c527ef7dfed9f8364100820f0f80a5dc&amp;source=constructor" width="600" height="400" frameborder="0"></iframe>
	                            </div>

						</div>
					</div>
					<div class="col-md-5">
						<div class="section-row">
							<div class="section-title">
								<h2><?= Yii::t('yii','Sizning Xaridlaringiz')?></h2>
							</div>
							<div class="table-responsive">
								<table class="table table table-bordered">
									<thead>
										<tr>
											<th><?= Yii::t('yii','Rasm')?></th>
											<th><?= Yii::t('yii','Mahsulot')?></th>
											<th><?= Yii::t('yii','Miqdori')?></th>
											<th><?= Yii::t('yii','Narxi')?></th>
											<th><?= Yii::t('yii','Summasi')?></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($session['bookCart'] as $id => $item):?>
										<tr>
											<td>
												<?php if ($item['img']): ?>
													<?= \yii\helpers\Html::img("@web/".$item['img'],  ['alt' => $item['name'], 'height'=>80]) ?>
												<?php else: ?>
													<?= \yii\helpers\Html::img("@web/placeHolder/book.png",  ['alt' => $item['name'], 'height'=>80]) ?>
												<?php endif ?>
					             			</td>
											<td><?= $item['name']?></td>
											<td><?= $item['qty']?></td>
											<td><?= $item['price']?></td>
											<td><?= $item['qty'] * $item['price']?></td>
										</tr>
										<?php endforeach?>
										<tr>
											<td colspan="4"><?= Yii::t('yii','Jami miqdor')?>: </td>
											<td><b><?=$session['bookCart.qty']?></b></td>
										</tr>
										<tr>
											<td colspan="4"><?= Yii::t('yii','Jami summasi')?>: </td>
											<td><b><?=$session['bookCart.sum']?></b></td>
										</tr>
										<tr>
											<td colspan="4"><?= Yii::t('yii','Yetkazib berish narxi')?>: </td>
											<td><b>0 So'm</b></td>
										</tr>
									</tbody>
								</table>
							</div>
							<?= Html::submitButton('Buyurtma', ['class' => 'primary-button'])?>
						</div>
					</div>
					<?php ActiveForm::end()?>
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
<?php else: ?>
	<div class="section">
		<div class="container">
		    <div class="alert alert-info alert-dismissible">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		       <?= Yii::t('yii','Savatcha bosh savatchani toldirish kerak')?> 
		    </div>
		</div>
	</div>                          
<?php endif;?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<script>
	$('#phoneNumber').inputmask("+999(99) 999-99-99");
</script>


 <style>
.aspect-ratio {
  position: relative;
  width: 100%;
  height: 0;
  padding-bottom: 62%; 
}
 
.aspect-ratio iframe {
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
}
</style>


<!-- <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A74daa5737daabc8bca547db0ea8ac356c527ef7dfed9f8364100820f0f80a5dc&amp;width=600&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script> -->