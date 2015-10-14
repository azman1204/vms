<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Ref;
use yii\helpers\Url;

?>
<legend>Daftar Pengguna Baru</legend>

<div class="well col col-sm-10">
    <?php $form = ActiveForm::begin(['action'=>URL::toRoute('cms/save')]) ?>
    <input type="hidden" name="Cms[id]" value="<?=$model->id?>">
    <div class="row">
        <div class="col col-sm-2">Tajuk</div>
        <div class="col col-sm-8"><?= $form->field($model, 'title')->label(false) ?></div>
    </div>
    <div class="row">
        <div class="col col-sm-2">Kandungan</div>
        <div class="col col-sm-8"><?= $form->field($model, 'content')->textarea(['rows'=>5])->label(false) ?></div>
    </div>
    <div class="row">
        <div class="col col-sm-2">Nama Unik</div>
        <div class="col col-sm-8"><?= $form->field($model, 'unique_name')->label(false) ?></div>
    </div>
    <div class="row">
        <div class="col col-sm-2">Status</div>
        <div class="col col-sm-8"><?= $form->field($model, 'status')->dropDownList(Ref::getList('csts'))->label(false) ?></div>
    </div>
    <div class="row">
        <div class="col col-sm-2"></div>
        <div class="col col-sm-8"><?= Html::submitButton('Simpan', ['class'=>'btn btn-primary']) ?></div>
    </div>
    
    <?php ActiveForm::end() ?>
</div>