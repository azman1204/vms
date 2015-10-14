<?php

namespace app\controllers;

use app\models\Cms;
use yii\data\Pagination;

class CmsController extends \app\components\Admin {
    // test
    public function actionList() {
        $q = Cms::find();
        $q2 = clone $q;
        $pages = new Pagination(['totalCount' => $q2->count()]);
        $pages->pageSize = 3;
        $cms = $q->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('list', ['cms' => $cms, 'pages' => $pages]);
    }

    public function actionCreate() {
        $data['model'] = new Cms();
        return $this->render('form', $data);
    }

    public function actionEdit($id) {
        $cms = Cms::findOne($id);
        //var_dump($user);
        return $this->render('form', ['model' => $cms]);
    }

    public function actionSave() {
        $r = \Yii::$app->request;
        $input = $r->post('Cms');
        $id = $input['id'];

        if (empty($id)) {
            $cms = new Cms();
        } else {
            $cms = Cms::findOne($id);
        }
        
        $cms->setAttributes($input);

        if ($cms->save()) {
            return $this->redirect('index.php?r=cms/list');
        } else {
            return $this->render('form', ['model' => $cms]);
        }
    }

    public function actionDelete($id) {
        $cms = Cms::findOne($id);
        $cms->delete();
        return $this->redirect('index.php?r=cms/list');
    }

}
