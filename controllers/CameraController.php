<?php
namespace app\controllers;

class CameraController extends \yii\web\Controller {
    public $enableCsrfValidation = false;
    
    public function actionIndex() {
        return $this->render('index');
    }
    
    public function actionUpload() {
         move_uploaded_file($_FILES['webcam']['tmp_name'], 'webcam.jpg');
         return true;
    }
}