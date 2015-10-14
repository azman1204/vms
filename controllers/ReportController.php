<?php
namespace app\controllers;

class ReportController extends \app\components\Admin {
    public function actionByMonth() {
        if (isset($_POST['year'])) {
            $year = $_POST['year'];
        } else {
            $year = date('Y');
        }
        
        $sql = "SELECT count(*) AS bil, MONTH(visit_dt) AS month
                FROM visit WHERE YEAR(visit_dt) = $year GROUP BY MONTH(visit_dt)";
        $rs = \Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('by_month', ['rs'=>$rs, 'year'=>$year]);
    }
    
    public function actionByDept() {
        if (isset($_POST['year'])) {
            $year = $_POST['year'];
        } else {
            $year = date('Y');
        }
        
        $sql = "SELECT count(*) AS bil, dept
                FROM visit WHERE YEAR(visit_dt) = $year GROUP BY dept";
        $rs = \Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('by_dept', ['rs'=>$rs, 'year'=>$year]);
    }
}