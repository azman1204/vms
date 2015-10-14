<?php 
use app\models\Ref;

if (!isset($caption)) {
    $caption = '';
}
?>
<legend><i class="fa fa-search" style="color:#21b384;"></i> Senarai Pelawat <?=$caption?> Hari ini</legend>

<table class="table table-bordered table-striped table-hover">
    <thead>
    <th>#</th>
    <th>No KP</th>
    <th>Nama</th>
    <th style="text-align:center">Masa Masuk</th>
    <th>No Pass</th>
    <th style="text-align:center">Bil. Pelawat</th>
    <th>Tujuan</th>
    <th>Jabatan</th>
    <th>Pegawai Ditemui</th>
    <th></th>
</thead>
<?php
$i = 1;
foreach ($visits as $visit) :
    ?>
    <tr>
        <td><?= $i++ ?>.</td>
        <td><?= $visit->visitor->icno ?></td>
        <td><?= $visit->visitor->name ?></td>
        <td align='center'><?= date('H:i', strtotime($visit->in_dt)) ?></td>
        <td><?= $visit->pass_no ?></td>
        <td align='center'><?= $visit->num ?></td>
        <td><?= $visit->purpose ?></td>
        <td><?= Ref::getDesc('jab', $visit->dept) ?></td>
        <td><?= $visit->to_meet ?></td>
        <td align='center'>
            <a class="dlg2" href="#" val="<?=$visit->id?>"><span class="glyphicon glyphicon-log-out"></span></a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div id="dlg" class="easyui-dialog" title="Log Keluar Pelawat" data-options="iconCls:'icon-save'" style="width:600px;height:420px;padding:10px;">
    <i id="spinner" class="fa fa-spinner fa-spin fa-4x"></i>
    <div id="mycontent"></div>
</div>

<script>
    $(function () {
        $('#dlg').dialog('close');
        $('.dlg2').click(function () {
            $('#spinner').show();
            $('#mycontent').hide();
            $('#dlg').dialog({width:600, height:400});
            $('#dlg').dialog('open');
            var id = $(this).attr('val');
            $('#mycontent').load('index.php?r=visit/details&id='+id, function() {
                $('#spinner').hide();
                $('#mycontent').show('slow');
            });
        });
    });
</script>