<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\User;
use yii\data\Pagination;

class UserController extends Controller {

    public function actionList() {
        $users1 = User::find();
        $cntUser = clone $users1;
        $pages = new Pagination(['totalCount' => $cntUser->count()]);
        $pg = isset($_GET['page']) ? $_GET['page'] : 1;
        \Yii::$app->session->set('pg',$pg);
        $pages->pageSize = 5;
        $users2 = $users1->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('list', ['users' => $users2, 'pages' => $pages]);
    }

    public function actionCreate() {
        $data['model'] = new User();
        $data['user_id2'] = '';
        return $this->render('form', $data);
    }

    public function actionEdit($id) {
        $user = User::findOne($id);
        $user->password = 'x9999x';
        $user->confirm_password = 'x9999x';
        //var_dump($user);
        return $this->render('form', ['model' => $user, 'user_id2'=>$user->user_id]);
    }

    public function actionSave() {
        $r = \Yii::$app->request;
        $input = $r->post('User');
        $userid2 = $input['userid2'];

        if (empty($userid2)) {
            // new
            $user = new User();
            $user->user_id  = $input['user_id'];
            $user->password = $input['password'];
            $user->confirm_password = $input['confirm_password'];
            $data['user_id2'] = '';
        } else {
            // update
            $user = User::findOne($userid2);
            $data['user_id2'] = $user->user_id;
            if ($input['password'] !== 'x9999x') {
                // there is password change !
                $user->password = $input['password'];
                $user->confirm_password = $input['confirm_password'];
            } else {
                $user->confirm_password = $user->password; // tiada perubahan pada password
            }
        }

        $user->name  = $input['name'];
        $user->email = $input['email'];
        $user->role  = $input['role'];

        if ($user->save()) {
            $pg = \Yii::$app->session->get('pg');
            \Yii::$app->session->setFlash('msg', "Data {$user->name} telah dikemaskini");
            return $this->redirect('index.php?r=user/list&page='.$pg);
        } else {
            $data['model'] = $user;
            return $this->render('form', $data);
        }
    }

    public function actionDelete($id) {
        $user = User::findOne($id);
        \Yii::$app->session->setFlash('msg', "Data {$user->name} telah dihapuskan");
        $user->delete();
        return $this->redirect('index.php?r=user/list');
    }
    
    public function actionProfile() {
        $data['model'] = User::findOne(\Yii::$app->user->id);
        return $this->render('profile', $data);
    }
    
    public function actionSaveProfile() {
        $r = \Yii::$app->request;
        $input = $r->post('User');
        $user = User::findOne(\Yii::$app->user->id);
        $user->password = $input['password'];
        $user->confirm_password = $input['confirm_password'];
        $user->email = $input['email'];
        
        if ($user->save()) {
            \Yii::$app->session->setFlash('msg', 'Maklumat <b>Profil</b> telah disimpan');
            return $this->redirect('index.php?r=main');
        } else {
            $data['model'] = $user;
            return $this->render('profile', $data);
        }
    }

}
