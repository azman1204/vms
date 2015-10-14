<?php
namespace app\models;

class Cms extends \yii\db\ActiveRecord {
    public function rules() {
        return [
            [['title','content', 'status', 'unique_name'], 'required', 'message'=>'{attribute} wajib diisi'], 
            ['id', 'safe'],
        ];
    }
    
    public static function getContent($name) {
        $cms = self::find()->where("unique_name = '$name'")->one();
        return $cms;
    }
}