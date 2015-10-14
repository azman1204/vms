<div class="container-fluid">
    <div class='row'>
        <div class="col col-md-4" style='padding-left:2px;'>
            <?php 
            if (Yii::$app->user->isGuest) {
                include 'login.php';
            } else {
                include 'info.php';
            }
            ?>
        </div>

        <div class="col col-md-8" style='height:221px'>
            <?=$content?>
        </div>
    </div>
</div>
