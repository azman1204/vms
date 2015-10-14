<?php
use yii\widgets\LinkPager;
use app\models\Ref;
?>

<legend><i class="fa fa-search" style="color:#21b384;"></i> Carian Kad Pelawat</legend>

<form method="post">
    <div class="container-fluid col col-md-4 well" style="margin-left:10px">
        <div class="row">
            <div class="col col-md-1">No</div>
            <div class="col col-md-11"><input type="text" name="no" class="form-control"></div>
        </div>
        <div class="row">
            <div class="col col-md-1"></div>
            <div class="col col-md-11"><input type="submit" value="Cari" class="btn btn-primary"></div>
        </div>
    </div>
</form>
<div style="clear:both"></div>

<?php
if (isset($cards)) :
?>
    <div class="col col-md-9">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <th>#</th>
            <th>No</th>
            <th>Jenis</th>
            <th>Status</th>
            <th>Tarikh Jana</th>
            <th>Jana Oleh</th>
            <th></th>
            </thead>
            <?php
            $i = 1;
            foreach ($cards as $card) :
                ?>
                <tr>
                    <td><?= $i++ ?>.</td>
                    <td><?= $card->no ?></td>
                    <td><?= Ref::getDesc('ctype', $card->type) ?></td>
                    <td><?= Ref::getDesc('status', $card->status) ?></td>
                    <td><?= $card->create_dt ?></td>
                    <td><?= $card->create_by ?></td>
                    <td align='center'><a href="index.php?r=card/print&id=<?=$card->id?>" target="window"><span class="glyphicon glyphicon-print"></span></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div style="clear: both;"></div>
<?php
echo LinkPager::widget(['pagination' => $pages]);
endif; 
?>

<style>
.row .col{
  padding-right:10px !important;
}
</style>