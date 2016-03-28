<?php
namespace app\controllers;
use kartik\mpdf\Pdf;
use app\models\Card;
use app\models\Ref;
use app\models\Util;
use yii\data\Pagination;
use app\components\barcode;

class CardController extends \yii\web\Controller {
    public $enableCsrfValidation = false;
    
    public function actionPrint($id) {
        $card = Card::findOne($id);
        $type = Ref::getDesc('ctype', $card->type);
        $this->genBarCode($card->no);
        $content = $this->renderPartial('print', ['no'=>$card->no, 'type'=>$type]);
        $pdf = new Pdf([
            'content'=>$content,
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            'cssFile' => 'css/card.css',
            'marginLeft' => 5,
            'marginRight' => 5
            ]);
        $pdf->render();
    }
    
    public function actionGen() {
        return $this->render('form');
    }
    
    public function actionGenHandler() {
        $num = $_POST['num'];
        $type = $_POST['type'];
        $arr_no = [];
        for ($i=0; $i<$num; $i++) {
            $no = Util::next($type);
            
            if ($no >= 10 && $no < 100) {
                $no = '0'.$no;
            } else if ($no < 10) {
                $no = '00'.$no;
            }
            
            $no = $type.$no;
            $arr_no[] = $no;
            $card = new Card();
            $card->no = $no;
            $card->type = $type;
            $card->status = 'A';
            $card->create_dt = date('Y-m-d');
            $card->create_by = \Yii::$app->user->id;
            $card->save();
            $this->genBarCode($no);
        }
        
        $ty = Ref::getDesc('ctype', $type);
        $content = $this->renderPartial('daily_card', ['arr_no'=>$arr_no, 'type'=>$ty]);
        $pdf = new Pdf([
            'content'=>$content,
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            'cssFile' => 'css/card.css',
            'marginLeft' => 5,
            'marginRight' => 5
            ]);
        $pdf->render();
    }
    
    private function genBarCode($no) {
        $width = 200;
        $height = 30;
        $quality = 100;
        $text = 1;
        $location = \Yii::$app->basePath."/web/barcode/$no.jpg";
        barcode::Barcode39($no, $width, $height, $quality, $text, $location);
    }
    
    public function actionSearch() {
        $card = Card::find();
        
        if (isset($_POST['no']) && ! empty($_POST['no'])) {
            $no = $_POST['no'];
            $card->where(['no'=>$no]);
        }
        
        $cnt = clone $card;
        $pages = new Pagination(['totalCount' => $cnt->count()]);
        $pg = isset($_GET['page']) ? $_GET['page'] : 1;
        \Yii::$app->session->set('pg',$pg);
        $pages->pageSize = 10;
        $cards = $card->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', ['cards'=>$cards, 'pages'=>$pages]);
    }
}