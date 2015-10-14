<?php

namespace app\controllers;

use app\components\barcode;

class TestController extends \yii\web\Controller {

    public function actionBarcode() {
        return $this->render('barcode');
    }

    public function actionBarcode2() {
        $width = 300;
        $height = 40;
        $quality = 100;
        $text = 1;
        $no = 'ABC 12345';
        $location = \Yii::$app->basePath . '/test.jpg';
        barcode::Barcode39($no, $width, $height, $quality, $text, $location);
        //return $this->render('barcode2');
    }

    public function actionZip() {
        $zip = new \ZipArchive();
        $res = $zip->open(\Yii::$app->basePath . '/temp/jump start bootstrap.zip');
        if ($res === TRUE) {
            $zip->extractTo(\Yii::$app->basePath .'/doc');
            $zip->close();
            echo 'woot!';
        } else {
            echo 'doh!';
        }
    }
}