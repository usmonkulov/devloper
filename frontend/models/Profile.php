<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string $avatar
 * @property string $first_name
 * @property string $second_name
 * @property string $middle_name
 * @property integer $birthday
 * @property integer $gender
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birthday', 'gender'], 'integer'],
            // [['avatar'], 'string', 'max' => 255],
            [['first_name', 'second_name', 'middle_name'], 'string', 'max' => 32],
            [['register_id'], 'default','value'=> Yii::$app->user->id],
            [['avatar'], 'file', 'skipOnEmpty' => true, 'extensions' => ['png', 'jpg','jpeg','gif']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'register_id' => Yii::t('yii', 'Username'),
            'avatar' => Yii::t('yii', 'Avatar'),
            'first_name' => Yii::t('yii', 'First name'),
            'second_name' => Yii::t('yii', 'Second name'),
            'middle_name' => Yii::t('yii', 'Middle name'),
            'birthday' => Yii::t('yii', 'Birthday'),
            'gender' => Yii::t('yii', 'gender'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegister()
    {
        return $this->hasOne(Register::className(), ['id' => 'register_id']);
    }

    public function updateProfile()
    {
        $profile = ($profile = Profile::findOne(Yii::$app->user->id)) ? $profile : new Profile();
        $profile->register_id = Yii::$app->user->id;
        $profile->first_name = $this->first_name;
        $profile->second_name = $this->second_name;
        $profile->middle_name = $this->middle_name;
        $profile->avatar = $this->avatar;
        if($profile):
            $register = $this->register ? $this->register : Register::findOne(Yii::$app->user->id);
            $username = Yii::$app->request->post('Register')['username'];
            $register->username = isset($username) ? $username : $register->username;
            return $register;
        endif;
        return false;
    }

    public function upload($folder,$imageFile)
    {
        $session = explode('/', $imageFile->type);
        $session = $session[0];
        $directory = 'uploads' . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $session . DIRECTORY_SEPARATOR;
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
}
