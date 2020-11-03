<?php

use yii\helpers\Html;

echo Yii::t('yii', 'Hello'), Html::encode($user->username).'.';

echo Html::a(Yii::t('yii', 'To change the password, follow this link.'),

	Yii::$app->urlManager->createAbsoluteUrl(
		[
			'/site/reset-password',
			'key' => $user->secret_key
		]
	));