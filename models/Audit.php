<?php
namespace app\models;
use yii\db\ActiveRecord;
use app\helpme\MyDate;

class Audit extends ActiveRecord {
    public function afterFind() {
        $this->event_dt = date('d/m/Y H:i', strtotime($this->event_dt));
    }
 }