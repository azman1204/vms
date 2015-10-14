<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Ref;
?>
<legend>
    <i class="fa fa-user" style="color: green"></i>
    Kemaskini Profil
</legend>

<div class="well col col-sm-8 col-sm-offset-1">
<?php $form = ActiveForm::begin(['action' => 'index.php?r=user/save-profile']) ?>
    <input type="hidden" name="User[userid2]" value="<?= $model->user_id ?>">
    <div class="row">
        <div class="col col-sm-4 xlabel">Nama</div>
        <div class="col col-sm-8"><?= $model->name ?></div>
    </div>
    <div class="row">
        <div class="col col-sm-4 xlabel">ID Pengguna</div>
        <div class="col col-sm-8"><?=$model->user_id?></div>
    </div>
    <div class="row">
        <div class="col col-sm-4 xlabel">Katalaluan</div>
        <div class="col col-sm-8"><?= $form->field($model, 'password')->passwordInput()->label(false) ?></div>
    </div>
    <div class="row">
        <div class="col col-sm-4 xlabel">Pengesahan Katalaluan</div>
        <div class="col col-sm-8"><input type="password" name="User[confirm_password]" value="<?=$model->password?>" class="form-control"></div>
    </div>
    <div class="row">
        <div class="col col-sm-4 xlabel">Emel</div>
        <div class="col col-sm-8"><?= $form->field($model, 'email')->label(false) ?></div>
    </div>
    <div class="row">
        <div class="col col-sm-4 xlabel">Tahap Capaian</div>
        <div class="col col-sm-8"><?= Ref::getDesc('role', $model->role) ?></div>
    </div>
    <div class="row">
        <div class="col col-sm-4"></div>
        <div class="col col-sm-8"><?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?></div>
    </div>
<?php ActiveForm::end() ?>
</div>