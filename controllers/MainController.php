<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\User;

class MainController extends Controller {

    public $enableCsrfValidation = false;

    public function actionMsg() {
        return $this->render('msg');
    }

    public function actionLogout() {
        \Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionAuth() {
        $r = \Yii::$app->request;
        $userid = $r->post('userid');
        $password = $r->post('password');

        $user = User::find()
                ->where(["user_id" => $userid, "password" => $password])
                ->one();

        if ($user) {
            // pengguna wujud
            \Yii::$app->user->login($user); // register sbg logged-in user
            \Yii::$app->session->set('user_id', $user->user_id);
        } else {
            // pengguna tak wujud
            \Yii::$app->session->setFlash('err', 'Kesalahan kombinasi ID Pengguna dan Katalaluan');
        }
        return $this->redirect('index.php?r=main/index');
    }

    public function actionIndex() {
        $main = \app\models\Cms::find()->where(['unique_name'=>'main'])->one();
        if ($main) {
            $data['content'] = $main->content;
        } else {
            $data['content'] = '';
        }
        return $this->render('home', $data);
    }

    public function actionForgotPwd() {
        return $this->render('forgot_pwd', ['errors' => []]);
    }

    public function actionGenPwd() {
        $user_id = $_POST['user_id'];
        $model = new \yii\base\DynamicModel(['user_id' => $user_id]);
        $model->addRule('user_id', 'required', ['message' => 'Id Pengguna wajib diisi'])
                //->addRule('user_id', 'exist', ['targetAttribute'=> \app\models\Applicant::find($user_id)])
                ->addRule('user_id', 'exist', ['targetClass' => '\app\models\Applicant', 'message' => 'ID Pengguna tidak wujud'])
                ->validate();

        if ($model->hasErrors()) {
            return $this->render('forgot_pwd', ['errors' => $model->getErrors()]);
        } else {
            $str = $user_id . date('dmYHis') . rand(1, 10000);
            $str = md5($str);
            $app = \app\models\Applicant::findOne(['user_id' => $user_id]);
            $app->confirm_password = $app->password; // need to re-arrange on rules
            $app->com_state2 = $app->com_state;
            $app->forgot_pwd = $str;
            if ($app->save()) {
                \Yii::$app->session->setFlash('msg', 'Pengesahan telah dihantar ke email anda');
                \Yii::$app->mailer->compose('forgot_pwd', ['str' => $str])
                        ->setFrom('azman120474@gmail.com')
                        ->setTo($app->app_email)
                        ->setSubject('Penjanaan Katalaluan Yang Baru')
                        ->send();
                return $this->redirect('index.php?r=main/home');
            } else {
                //var_dump($app->getErrors());
                echo "Technical Problem...";
            }
        }
    }

    public function actionPwdRecovery($str) {
        $app = \app\models\Applicant::findOne(['forgot_pwd' => $str]);
        if ($app) {
            return $this->render('pwd_recovery', ['app' => $app, 'errors' => []]);
        } else {
            echo "No Permission";
        }
    }

    public function actionRecoveryHandler() {
        $arr['katalaluan'] = $_POST['katalaluan'];
        $arr['pengesahan_katalaluan'] = $_POST['pengesahan_katalaluan'];
        $model = new \yii\base\DynamicModel($arr);
        $model->addRule(['katalaluan', 'pengesahan_katalaluan'], 'required', ['message' => 'Medan {attribute} ini wajib diisi'])
                ->addRule('katalaluan', 'compare', ['compareAttribute' => 'pengesahan_katalaluan', 'message' => 'Katalaluan dan Pengesahan Katalaluan Mestilah Sama'])
                ->validate();
        $str = $_POST['str'];
        $app = \app\models\Applicant::findOne(['forgot_pwd' => $str]);

        if ($model->hasErrors()) {
            return $this->render('pwd_recovery', ['errors' => $model->getErrors(), 'app' => $app]);
        } else {
            $app->password = $_POST['katalaluan'];
            $app->confirm_password = $app->password; // need to re-arrange on rules
            $app->com_state2 = $app->com_state;
            if ($app->validate()) {
                $app->forgot_pwd = null;
                $app->save();
                \Yii::$app->session->setFlash('msg', 'Katalaluan telah berjaya ditukar');
                return $this->goHome();
            } else {
                //var_dump($app->getErrors());
                return $this->render('pwd_recovery', ['errors' => $app->getErrors(), 'app' => $app]);
            }
        }
    }

    public function actions() {
        return [
            'error' => ['class' => 'yii\web\ErrorAction']
        ];
    }
}