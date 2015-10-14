<?php
namespace app\controllers;
use app\models\Visitor;

class VisitorController extends \yii\web\Controller {
    public $enableCsrfValidation = false;
    
    public function actionReg() {
        $visitor = new Visitor();
        $visitor->reg_dt = date('d/m/Y');
        return $this->render('form2', ['visitor'=>$visitor]);
    }
    
    public function actionSave() {
        $id = $_POST['id'];
        if (empty($id)) {
            $visitor = new Visitor();
        } else {
            $visitor = Visitor::findOne($id);
        }
        
        $visitor->name  = $_POST['name'];
        $visitor->icno  = $_POST['icno'];
        $visitor->bod   = $_POST['bod'];
        $visitor->tel   = $_POST['tel'];
        $visitor->addr1 = $_POST['addr1'];
        $visitor->addr2 = $_POST['addr2'];
        $visitor->addr3 = $_POST['addr3'];
        
        if ($visitor->save()) {
            echo 'ok';
        } else {
            echo '500';
        }
    }
    
    public function actionUpdate() {
        $id = $_POST['visitor_id'];
        $visitor = Visitor::findOne($id);
        return $this->renderPartial('form', ['visitor'=>$visitor]);
    }
    
    public function actionSearch() {
        $str = '';
        
        if(isset($_POST['name']) ) {
            $name = $_POST['name'];
            $icno = $_POST['icno'];
            
            if (! empty($name)) {
                $str = "name LIKE '%$name%'";
            }
            
            if (! empty($icno)) {
                $str = "icno = '$icno'";
            }
        }
        
        if (!empty($str)) {
            $visitors = Visitor::find()->where($str)->all();
        } else {
            $visitors = Visitor::find()->all();
        }
        return $this->render('search', ['visitors'=>$visitors]);
    }
}