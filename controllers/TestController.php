<?php

namespace app\controllers;

use app\components\barcode;

class TestController extends \yii\web\Controller {

    public function actionCurl() {
        // initialise the curl request
        $request = curl_init('http://localhost/phplab/curl/upload.php');
        echo "real path = " . realpath('example.txt');
        // send a file
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt(
            $request, CURLOPT_POSTFIELDS, array(
            'file' => '@' . realpath('example.txt')
        ));
        // output the response
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        echo curl_exec($request);
        // close the session
        curl_close($request);
        exit;
    }

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
            $zip->extractTo(\Yii::$app->basePath . '/doc');
            $zip->close();
            echo 'woot!';
        } else {
            echo 'doh!';
        }
    }

}
