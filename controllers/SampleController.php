<?php
namespace app\controllers;
use yii\web\Controller;

//class SampleController extends \yii\web\Controller {
class SampleController extends Controller {
    public $enableCsrfValidation = false;
    
    public function actionHello() {
        echo 'Hello VMS';
    }
    
    public function actionHi() {
        // call a view
        return $this->render('my_profile', ['nama'=>'azman']);
    }
    
    public function actionSimpan() {
        $nama = $_POST['nama'];
        echo $nama;
    }
}