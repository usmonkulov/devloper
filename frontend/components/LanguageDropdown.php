<?php
namespace frontend\components;
use yii\helpers\Html;
use Yii;
use yii\bootstrap\Dropdown;

class LanguageDropdown extends Dropdown {

    private static $_labels;
    private $_isError;

    public function init() {
        $route = Yii::$app->controller->route;
        $appLanguage = Yii::$app->language;
        $params = $_GET;
        $this->_isError = $route === Yii::$app->errorHandler->errorAction;

        array_unshift($params, '/' . $route);

        foreach (Yii::$app->urlManager->languages as $language) {
            $isWildcard = substr($language, -3) === '-*';
            if (
                    $language === $appLanguage ||
                    // Also check for wildcard language
                    $isWildcard && substr($appLanguage, 0, 3) === substr($language, 0, 3)
            ) {
                continue;   // Exclude the current language
            }
            if ($isWildcard) {
                $language = substr($language, 0, 3);
            }
            $params['language'] = $language;
            $this->items[] = [
                'label' => self::label($language),
                'url' => $params,
            ];
        }
        parent::init();
    }

    public function run() {
        // Only show this widget if we're not on the error page
        if ($this->_isError) {
            return '';
        } else {
            return parent::run();
        }
    }

    public static function label($code) {
        if (self::$_labels === null) {
            self::$_labels = [
                'uz' => Html::img("@web/language_image/uz.gif", ['alt' =>'uz']).' O‘z',
                'oz' => Html::img("@web/language_image/uz.gif", ['alt' =>'oz']).' Ўз',
                'en' => Html::img("@web/language_image/en.gif", ['alt' =>'en']).' En',
                'ru' => Html::img("@web/language_image/ru.gif", ['alt' =>'ru']).' Ру'
            ];
        }else{
            self::$_labels = [
                'uz' => 'O‘zbekcha',
                'oz' => 'Ўзбекча',
                'en' => 'English',
                'ru' => 'Русский'
            ];
        }

        return isset(self::$_labels[$code]) ? self::$_labels[$code] : null;
    }

}
