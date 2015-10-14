<?php

namespace app\models;
use app\helpme\MyDate;

class Visitor extends \yii\db\ActiveRecord {

    public function afterFind() {
        if (!empty($this->bod)) {
            $this->bod = MyDate::dateFormat('ymd', 'dmy', $this->bod, '/');
        }
    }

    public function beforeSave($insert) {
    	if (parent::beforeSave($insert)) {
       		if (!empty($this->bod)) {
            	$this->bod = MyDate::dateFormat('dmy', 'ymd', $this->bod, '-');
        	}
        	return true;
	    } else {
	        return false;
	    }
    }

}
