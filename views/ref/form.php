<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<legend><i class="fa fa-file green"></i> Kemaskini Param</legend> 

<div class="well col col-sm-8 col-sm-offset-1">
    <?php $form = ActiveForm::begin(['action'=>'index.php?r=ref/save']) ?> 
    <?= $form->field($ref,'id')->hiddenInput()->label(false)?>
    <?= $form->field($ref,'cat')->hiddenInput()->label(false)?>
    <div class="row">
        <div class="col col-sm-2">Kod <?php // \Yii::t('app', 'Remember me') ?></div>
        <div class="col col-sm-8"><?= $form->field($ref,'code')->label(false)?></div>
    </div>
    <div class="row">
        <div class="col col-sm-2">Keterangan </div>
        <div class="col col-sm-8"><?= $form->field($ref,'descr')->label(false)?></div>
    </div>
    <div class="row">
        <div class="col col-sm-2"> </div>
        <div class="col col-sm-8">
            <button class="btn btn-primary"><i class="fa fa-floppy-o bigger-130"></i> Simpan</button>
            <a href="index.php?r=ref/list&kat=<?=$ref->cat?>" class="btn btn-default"><i class="fa fa-backward"></i> Kembali</a>
        </div>
    </div>
    <?php $form = ActiveForm::end() ?> 
</div>