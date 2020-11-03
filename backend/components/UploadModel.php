<?php
namespace backend\components;
 
use yii\base\Model;
use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

class UploadModel extends \yii\db\ActiveRecord
{
    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    // status
    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 0;

    public function upload($folder,$imageFile)
    {
        $session = explode('/', $imageFile->type);
        $session = $session[0];
        $directory = '..\..\frontend\web\uploads' . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $session . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            \yii\helpers\FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $path = 'uploads/upload/'.$folder.'/'.$session.'/'.$fileName;
                return $path;
            }
        }

        return false;
    }

    public static function statusList(): array
    {
        return [
            self::STATUS_ACTIVE   => Yii::t('yii', 'Active'),
            self::STATUS_INACTIVE => Yii::t('yii', 'Inactive'),
        ];
    }

    public function getStatus($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public function status()
    {
        return [
            self::STATUS_ACTIVE   => Yii::t('yii', 'Active'),
            self::STATUS_INACTIVE => Yii::t('yii', 'Inactive'),
        ];
    }

    public function getTitle($language=null)
    {
        $title = json_decode($this->title,true);

        if ($language) {
            if (isset($title[$language])) {
                return $title[$language];
            }else {
                return null;
            }
        }
        if (isset($title[Yii::$app->language])) {
            if ($title[Yii::$app->language]!='') {
                return $title[Yii::$app->language];
            }
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }else{
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }
    }
    public function getDescription($language=null)
    {
        $title = json_decode($this->description,true);

        if ($language) {
            if (isset($title[$language])) {
                return $title[$language];
            }else {
                return null;
            }
        }
        if (isset($title[Yii::$app->language])) {
            if ($title[Yii::$app->language]!='') {
                return $title[Yii::$app->language];
            }
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }else{
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }
    }
    public function getContent($language=null)
    {
        $title = json_decode($this->content,true);

        if ($language) {
            if (isset($title[$language])) {
                return $title[$language];
            }else {
                return null;
            }
        }
        if (isset($title[Yii::$app->language])) {
            if ($title[Yii::$app->language]!='') {
                return $title[Yii::$app->language];
            }
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }else{
            $a = null;
            foreach ($title as $value) {
                if ($value!='') {
                    $a = $value;
                    break;
                }
            }
            return $a;
        }
    }
}