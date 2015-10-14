<?php
namespace app\models;
use yii\db\ActiveRecord;
use app\helpme\MyDate;

class Card extends ActiveRecord {
    public function afterFind() {
        $this->create_dt = MyDate::dateFormat('ymd', 'dmy', $this->create_dt);
    }
 }



