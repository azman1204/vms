<?php
namespace app\models;
use yii\db\ActiveRecord;

class Ref extends ActiveRecord {
    public function rules() {
        return [
            [['code', 'descr'], 'required'],
            [['id','cat'], 'safe'] 
        ]; 
    }
    
    /**
     * return array yg sesuai digunakan dlm. dropdown box
     * @param type $kat i.e sec = section, bg = bangsa
     * @return type
     */
    public static function getList($kat, $choose=true, $param1='', $param2='') {
        $where = ['cat'=>$kat];
        if ($param1 !== '') {
            $where['param1'] = $param1;
        }
        
        if ($param2 !== '') {
            $where['param2'] = $param2;
        }
        
        $arr  = self::find()->where($where)->orderBy('sort,descr')->all();
        if ($choose) {
            $arr2 = ['0'=>'--Sila Pilih--'];
        } else {
            $arr2 = [];
        }
        
        foreach ($arr as $param){
            $arr2[$param->code]=$param->descr;
        }
        return $arr2;
    }
    
    public static function getDesc($cat, $code) {
        $ref = self::find()->where("cat='$cat' AND code='$code'")->one();
        if (! $ref) {
            return '';
        } else {
            return $ref->descr; 
        }
    }
    
    /**
     * untuk $code yg melibatkan beberapa value, i.e I,E for Import dan Eksport
     * @param type $cat
     * @param type $code
     * @return string
     */
    public static function getDesc2($cat, $code) {
        $str = '';
        $arr = explode(",", $code);
        foreach ($arr as $val) {
            $ref = self::find()->where("cat='$cat' AND code='$val'")->one();
            if ($ref) {
                $str .= "<li>".$ref->descr."</li>";
            }    
        }
        
        if (! empty($str)) {
            return '<ul>'.$str.'</ul>';
        } else {
            return '';
        }
    }
 }



