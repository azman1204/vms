<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<legend>Log Sistem</legend>

<form method="post" action="index.php?r=audit/list">
    <div class="col-md-8 well">
        <div class="row">
            <div class="col-md-1">Tarikh</div>
            <div class="col-md-4"><input type="text" name="tarikh" value="<?=$tarikh?>" class="form-control dt"></div>
            <div class="col-md-1">Modul</div>
            <div class="col-md-4"><?php echo Html::dropDownList('module', $module, $mod, array('class' => 'form-control')) ?></div>
            <div class="col-md-2"><button type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-search"></span> Cari</button></div>
        </div>
    </div>
</form>

<table class='table table-striped table-bordered table-hover'>
    <thead>
        <tr class='success'>
            <th>#</th>
            <th>Nama Pengguna</th>
            <th>Tarikh</th>
            <th>URL</th>
            <td>Data</td>
            <th>Alamat IP</th>     
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_GET['page']))
            $i = ($_GET['page'] - 1) * 10 + 1;
        else
            $i = 1;

        foreach ($audits as $f) {
            ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $f->user ?></td>
                <td align='center'><?php echo $f->event_dt ?></td>
                <td><?php echo $f->module ?></td>
                <td><?php echo $f->data ?></td>
                <td><?php echo $f->ip_addr ?></td>         
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<script>
    $(function() {
        $('.dt').datepicker({dateFormat: 'dd/mm/yy'});
    });
</script>

<?php
echo LinkPager::widget(['pagination' => $pages]);
?>