<?php
namespace app\controllers;
use app\models\Ref;
use yii\web\Controller;

class RefController extends Controller {
    // r=param/katlist
    public function actionKatlist() {
        $refs = Ref::find()->where("cat = 'kat'")->all();
        return $this->render('kat_list', ['refs'=>$refs]);
    }
    
    public function actionList($kat) {
        //$kat = \Yii::$app->request->get('kat');
        $ref =Ref::find()->where("cat = '$kat'")->all();
        return $this->render('list', ['ref'=>$ref]);
    }
    
    public function actionDel($id) {
        $ref = Ref::findOne($id);
        $kat = $ref->cat;
        $ref->delete();
        \Yii::$app->session->setFlash('msg', 'Data telah <b>berjaya dihapuskan</b>');
        return $this->redirect('index.php?r=ref/list&kat='.$kat);
    }
    
    public function actionEdit($id) {
        $ref = Ref::findOne($id);
        return $this->render('form', ['ref'=>$ref]);
    }
    
    public function actionSave() {
        $r = \Yii::$app->request;
        $input = $r->post('Ref');
        if (! empty($input['id'])) {
            // create new
            $ref = Ref::findOne($input['id']);
        } else {
            // update
            $ref = new Ref();
        }
        
        $ref->setAttributes($r->post('Ref'));
        if ($ref->save()) {
            // validation ok, save data
            \Yii::$app->session->setFlash('msg', 'Data telah disimpan');
            return $this->redirect('index.php?r=ref/list&kat='.$ref->cat);
        } else {
            // validation fails
            //var_dump($param);
            return $this->render('form', ['ref'=>$ref]);
        }
    }
    
    public function actionCreate($kat) {
        $ref = new Ref();
        $ref->cat = $kat;
        return $this->render('form', ['ref'=>$ref]);
    }
}