<?php
namespace app\controllers;
use app\models\Audit;
use app\models\Ref;
use yii\data\Pagination;
use app\helpme\MyDate;
 
class AuditController extends \app\components\Admin {
    public function actionList() {
        $where = '1';//comment here 
        if (isset($_POST['tarikh'])) {
            $tarikh = $_POST['tarikh'];
            $module = $_POST['module'];
            if (!empty($module)) {
                $where .= " AND module = '$module'";
            }
            
            if (! empty($tarikh)) {
                $where .= " AND event_dt LIKE '". MyDate::dateFormat('dmy', 'ymd', $tarikh, '-') . "%'";
            }
        } else {
            $module = '0';
            $event_dt = '';
        }

        $count = Audit::find()->where($where)->count();
        $pages = new Pagination(['totalCount' => $count]);
        $pages->pageSize = 10;
        $data['pages'] = $pages;
        
        $data['module'] = $module;
        $data['event_dt'] = $event_dt;
        $audits = Audit::find()->where($where)->offset($pages->offset)->limit($pages->limit)->all();
        $data['audits'] = $audits;
        $data['mod'] = Ref::getList('mod');
        return $this->render('list', $data);
    }
}