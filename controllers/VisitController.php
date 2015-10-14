<?php
namespace app\controllers;
use app\models\Visit;
use app\models\Visitor;
use app\models\Ref;

class VisitController extends \app\components\Admin {
    public $enableCsrfValidation = false;
    
    public function actionSearch() {
        $str = '';
        
        if(isset($_POST['name']) ) {
            $name = $_POST['name'];
            $icno = $_POST['icno'];
            
            if (! empty($name)) {
                $str = " AND vr.name LIKE '%$name%'";
            }
            
            if (! empty($icno)) {
                $str = "AND vr.icno = '$icno'";
            }
        }
        
        $sql = "SELECT * FROM visit vt, visitor vr WHERE vt.visitor_id = vr.id $str";
        $rs = \Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('search', ['visits'=>$rs]);
    }
    
    public function actionRegIn() {
        $data['jab'] = Ref::getList('jab');
        $data['purpose'] = Ref::getList('obj');
        return $this->render('reg_in', $data);
    }
    
    public function actionRegOut() {
        return $this->render('reg_out');
    }
    
    public function actionRegOutDetails() {
        $pass_no = $_POST['pass_no'];
        $visit = Visit::find()->where(['pass_no'=>$pass_no, 'status'=>'I'])->one();
        if ($visit) {
            $visitor = Visitor::findOne($visit->visitor_id);
            return $this->render('reg_out_details', ['visit'=>$visit, 'visitor'=>$visitor]);
        } else {
            return $this->render('reg_out', ['err'=>'Pass tidak sah']);
        }
    }
    
    public function actionRegInHandler() {
        $icno = $_POST['icno'];
        $visitor = Visitor::findOne(['icno'=>$icno]);
        
        if (! $visitor) {
            $visitor = new Visitor();
            $visitor->name = $_POST['name'];
            $visitor->icno = $_POST['icno'];
            $visitor->tel  = $_POST['tel'];
            $visitor->save();
        }
        
        $visit = new Visit();
        $visit->visitor_id = $visitor->id;
        $visit->visit_dt   = date('Y-m-d');
        $visit->in_dt      = date('Y-m-d H:i:s');
        $visit->dept       = $_POST['dept'];
        $visit->to_meet    = $_POST['to_meet'];
        $visit->pass_no    = $_POST['pass_no'];
        $visit->in_remark  = $_POST['in_remark'];
        $visit->purpose    = $_POST['purpose'];
        $visit->num        = $_POST['num'];
        $visit->status     = 'I';
        //var_dump($_POST);
        $visit->save();
        return $this->redirect('index.php?r=visitor/form&sts=1');
    }
    
    public function actionRegOutHandler() {
        $id = $_POST['id'];
        $visit = Visit::findOne($id);
        $visit->out_dt = date('Y-m-d H:i:s');
        $visit->out_remark = $_POST['out_remark'];
        $visit->status = 'O';
        $visit->out_rate = $_POST['out_rate'];
        $visit->save();
        return $this->redirect('index.php?r=visit/in');
    }
    
    public function actionIn() {
        $visits = Visit::find()->where("status = 'I'")->all();
        $data['visits'] = $visits;
        
        $data['caption'] = 'Masuk';
        return $this->render('in', $data);
    }
    
    public function actionOut() {
        $visits = Visit::find()->where("status = 'O'")->all();
        $data['visits'] = $visits;
        $data['caption'] = 'Keluar';
        return $this->render('in', $data);
    }
    
    public function actionDetails($id) {
        sleep(1);
        $visit = Visit::findOne($id);
        $visitor = Visitor::findOne($visit->visitor_id);
        return $this->renderPartial('details',['visit'=>$visit, 'visitor'=>$visitor]);
    }
    
    public function actionLog() {
        $visitor_id = $_POST['visitor_id'];
        $visits = Visit::find()->where("visitor_id = $visitor_id")->all();
        echo $this->renderPartial('log', ['visits'=>$visits]);
    }
}