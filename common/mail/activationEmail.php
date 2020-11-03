<?php

use yii\helpers\Html;

echo Yii::t('yii', 'Hello'), Html::encode($user->username).'.';

echo Html::a(Yii::t('yii', 'To activate your account, follow this link'),

	Yii::$app->urlManager->createAbsoluteUrl(
		[
			'/site/activate-account',
			'key' => $user->secret_key
		]
	));