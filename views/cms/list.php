<?php
use yii\widgets\LinkPager;
use yii\helpers\URL;
use app\models\Ref;
?>

<legend>Senarai Pengumuman</legend>
<a href="<?=URL::toRoute('cms/create')?>" class="btn btn-success"> <span class="glyphicon glyphicon-plus"> Tambah Pengumuman</span></a>
<table class="table table-condensed table-hover table-striped">
    <tr class="info">
        <td>#</td>
        <td>Tajuk</td>
        <td>Status Aktif</td>
        <td></td>
    </tr>
    <?php
    $i = 1;
    foreach ($cms as $c) : ?>
        <tr>
            <td><?=$i++?>.</td>
            <td><?=$c->title?></td>
            <td><?=Ref::getDesc('csts', $c->status)?></td>
            <td>
                <a href="<?=URL::toRoute('cms/edit')?>&id=<?=$c->id?>"><span class="glyphicon glyphicon-pencil"/></a>
                <a href="<?=URL::toRoute('cms/delete')?>&id=<?=$c->id?>"><span class="glyphicon glyphicon-trash"/></a>
            </td>
        </tr>
    <?php
    endforeach; ?>
</table>

<?php
echo LinkPager::widget(['pagination' => $pages]);