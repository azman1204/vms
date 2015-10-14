<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Ref;
?>
<legend><i class="fa fa-file green"></i> Daftar Pengguna Baru</legend>
<div class="col col-md-1"></div>
<div class="well col col-sm-8">
    <?php $form = ActiveForm::begin(['action' => 'index.php?r=user/save']) ?>
    <input type="hidden" name="User[userid2]" value="<?= $user_id2 ?>">  
    <div class="row">
        <div class="col col-sm-2">Nama</div>
        <div class="col col-sm-8"><?= $form->field($model, 'name')->label(false) ?></div>
    </div>
    <div class="row">
        <div class="col col-sm-2">ID Pengguna</div>
        <div class="col col-sm-8">
            <?php if ($model->isNewRecord) : ?>
                <?= $form->field($model, 'user_id')->label(false) ?>
            <?php else : ?>
                <?= $model->user_id ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col col-sm-2">Katalaluan</div>
        <div class="col col-sm-8"><?= $form->field($model, 'password')->passwordInput()->label(false) ?></div>
    </div>
    <div class="row">
        <div class="col col-sm-2">Pengesahan Katalaluan</div>
        <div class="col col-sm-8"><input type="password" name="User[confirm_password]" class="form-control" value="<?= $model->confirm_password ?>"></div>
    </div>
    <div class="row">
        <div class="col col-sm-2">Emel</div>
        <div class="col col-sm-8"><?= $form->field($model, 'email')->label(false) ?></div>
    </div>
    <div class="row">
        <div class="col col-sm-2">Peranan</div>
        <div class="col col-sm-8"><?= Html::dropDownList('User[role]', $model->role, Ref::getList('role'), ['class' => 'form-control']) ?></div>
    </div>
    <div class="row">
        <div class="col col-sm-2"></div>
        <div class="col col-sm-8">
            <button class="btn btn-primary"><i class="fa fa-floppy-o bigger-130"></i> Simpan</button>
            <a href="index.php?r=user/list" class="btn btn-default"><i class="fa fa-backward"></i> Kembali</a>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>