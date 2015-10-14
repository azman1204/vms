<?php
namespace app\components;
use yii\web\Controller;
use app\models\Audit;

class Admin extends Controller {
    public $enableCsrfValidation = false;
    
    public function init() {
        if (\Yii::$app->user->isGuest) {
            $this->redirect('index.php?r=main/logout');
        }
        
        //echo Yii::app()->controller->action->id;
        $req = \Yii::$app->request;
        $audit = new Audit();
        $audit->method   = $req->method;
        $audit->module   = $this->route;
        $audit->action   = \Yii::$app->controller->action->id;
        $audit->event_dt = date('Y-m-d H:i:s');
        $audit->user     = ! empty(\Yii::$app->user->name) ? \Yii::$app->user->name : 'Anonymous';
        $audit->ip_addr  = $req->userIP;
        $audit->url      = $req->scriptUrl;
        $audit->ref_url  = $req->referrer;
        
        $data = '';
        
        if (count($_POST) > 0) {
            $data = json_encode($_POST);
        }
        
        if (count($_GET) > 1) {
            $arr = array();
            foreach ($_GET as $k=>$v) {
                if ($k !== 'r')
                    $arr[$k] = $v;
            }
            $data .= json_encode($arr);
        }
        
        $audit->data = $data;
        $audit->save();
    }
}