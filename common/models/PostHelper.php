<?php

namespace common\models;

use backend\models\SendMessage;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class PostHelper
{
    public static function statusList(): array
    {
        return [
            SendMessage::STATUS_DRAFT => 'Черновик',
            SendMessage::STATUS_PUBLISH => 'Опубликован',
        ];
    }

    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status): string
    {
        switch ($status) {
            case SendMessage::STATUS_DRAFT:
                $class = 'label label-danger';
                break;
            case SendMessage::STATUS_PUBLISH:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }
}