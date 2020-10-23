<?php
namespace kilyakus\package\seo\models;

use Yii;
use kilyakus\package\translate\behaviors\TranslateBehavior;
use kilyakus\validator\escape\EscapeValidator;

class SeoText extends \kilyakus\modules\components\ActiveRecord
{
    public static function tableName()
    {
        return 'seotext';
    }

    public function rules()
    {
        return [
            [['h1', 'title'], 'string', 'max' => 255],
            [['keywords', 'description'], 'string'],
            [['h1', 'title', 'keywords', 'description'], 'trim'],
            [['h1', 'title', 'keywords', 'description'], EscapeValidator::className()],
            ['translations', 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'h1' => 'Seo H1',
            'title' => 'Seo Title',
            'keywords' => 'Seo Keywords',
            'description' => 'Seo Description',
        ];
    }

    public function behaviors()
    {
        return [
            'translateBehavior' => TranslateBehavior::className(),
        ];
    }

    public function isEmpty()
    {
        return (!$this->h1 && !$this->title && !$this->keywords && !$this->description);
    }

    public function isEmptyTranslations()
    {
        if($post = Yii::$app->request->post((new \ReflectionClass(self::className()))->getShortName()))
        {
            $translations = $post['translations'];

            foreach ($translations as $language => $translation) {
                foreach ($translation as $field => $value) {
                    if(!empty($value)){
                        return false;
                    }
                }
            }
        }

        return true;
    }
}