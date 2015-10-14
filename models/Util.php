<?php
namespace app\models;
use yii\db\ActiveRecord;

class Util extends ActiveRecord {
    public static function next($col) {
        $util = self::findOne(['col'=>$col]);
        $no = $util->val + 1;
        $util->val = $no;
        $util->save();
        return $no;
    }
 }



