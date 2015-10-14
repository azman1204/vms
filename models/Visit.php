<?php

namespace app\models;

class Visit extends \yii\db\ActiveRecord {
    public function getVisitor() {
        return $this->hasOne(Visitor::className(), ['id'=>'visitor_id']);
    }
}
