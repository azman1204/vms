<?php
use app\models\Util;
use app\models\Ref;
use yii\helpers\Html;
?>

<legend>
    Jana Kad Pelawat Harian
</legend>

<form method="post" action="index.php?r=card/daily-handler" target="window">
    <div class="container col col-md-7 col-md-offset-1 well">
        <div class="row">
            <div class="col col-md-12">** Sila masukkan bilangan kad pelawat yang akan dijana</div>
        </div>
        <div class="row">
            <div class="col col-md-2">Bilangan Kad</div>
            <div class="col col-md-2">
                <?=Html::dropDownList('num', '', Ref::getList('card', false))?>
            </div>
            <div class="col col-md-1">Jenis</div>
            <div class="col col-md-4">
                <?=Html::dropDownList('type', '', Ref::getList('ctype', false))?>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-2 col-md-offset-2"><input type="submit" class="btn btn-primary" value="Jana"></div>
        </div>
    </div>
</form>