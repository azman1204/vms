<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\models\Ref;
?>

<legend><i class="fa fa-list green"></i> Senarai Pengguna Sistem</legend>
<button class="btn btn-xs btn-success" id="xbtn"><i class="ace-icon fa fa-plus bigger-120"></i> Tambah Pengguna</button>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Id Pengguna</th>
            <th>Emel</th>
            <th>Capaian</th>
            <th wisth="5%" nowrap></th>
        </tr>
    </thead>
    <?php
    $i = 1;
    foreach ($users as $user) : ?>
        <tr>
            <td><?=$i++?>.</td>
            <td><?=$user->name?></td>
            <td><?=$user->user_id?></td>
            <td><?=$user->email?></td>
            <td><?=Ref::getDesc('role', $user->role)?></td>
            <td align="center">
                <a href="<?=URL::toRoute('user/edit')?>&id=<?=$user->user_id?>" title="Kemaskini" data-rel="tooltip"><span class="fa fa-pencil-square-o bigger-130"/></a>
                <a href="<?=URL::toRoute('user/delete')?>&id=<?=$user->user_id?>" title="Hapus" data-rel="tooltip" class="askme"><span class="fa fa-trash-o bigger-130"/></a>
            </td>
        </tr>
    <?php
    endforeach; ?>
</table>

<?php
echo LinkPager::widget(['pagination' => $pages]);
?>

<script>
    $(function() {
       $('#xbtn').click(function() {
           location.href='index.php?r=user/create';
       }) 
    });
</script>