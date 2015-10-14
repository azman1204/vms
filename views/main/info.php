<?php
use app\models\User;
?>

<div class="well container-fluid" id="login-wrapper" >
    <div class="row">
        <div class="col col-md-12">
            <h4>Selamat Datang</h4>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-12">
            <span class="glyphicon glyphicon-user" style="font-size: 80px;color:#336699;"></span>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-5"><b>Nama</b></div>
        <div class="col col-md-7">
            <?php
            $user = User::findOne(Yii::$app->user->id);
            echo $user->name;
            ;
            ?>
        </div>
    </div>
</div> 