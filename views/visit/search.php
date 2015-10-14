<legend><i class="fa fa-search" style="color:green"></i> Log Lawatan</legend>

<form method="post">
    <div class="container-fluid col col-md-9 well" style="margin-left:10px;">
        <div class="row">
            <div class="col col-md-2">Nama</div>
            <div class="col col-md-4"><input type="text" name="name" id="nama" class="form-control"></div>
            <div class="col col-md-2">No KP</div>
            <div class="col col-md-4"><input type="text" name="icno" id="nokp" class="form-control"></div>
        </div>
        <div class="row">
            <div class="col col-md-2">Tarikh Dari</div>
            <div class="col col-md-4"><input type="text" name="icnox" class="form-control"></div>
            <div class="col col-md-2">Tarikh Hingga</div>
            <div class="col col-md-4"><input type="text" name="icnoy" class="form-control"></div>
        </div>
        <div class="row">
            <div class="col col-md-2"></div>
            <div class="col col-md-6"><input type="submit" value="Cari" class="btn btn-primary"></div>
        </div>
    </div>
</form>
<div style="clear:both"></div>

<?php
if (isset($visits)) :
?>
    <div class="col col-md-12">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <th>#</th>
            <th>Nama</th>
            <th>No KP</th>
            <th>Tarikh</th>
            <th>Masa Masuk</th>
            <th>Masa Keluar</th>
            <th>No Pelawat</th>
            <th>Tujuan</th>
            <th></th>
            </thead>
            <?php
            $i = 1;
            foreach ($visits as $visit) :
                ?>
                <tr>
                    <td><?= $i++ ?>.</td>
                    <td><?= $visit['name'] ?></td>
                    <td align='center'><?= $visit['icno'] ?></td>
                    <td align='center'><?= date('d.m.Y', strtotime($visit['visit_dt'])) ?></td>
                    <td align='center'><?= date('H:i', strtotime($visit['in_dt'])) ?></td>
                    <td align='center'><?= date('H:i', strtotime($visit['out_dt'])) ?></td>
                    <td><?= $visit['pass_no'] ?></td>
                    <td><?= $visit['purpose'] ?></td>
                    <td align='center'><a class="dlg" val='' href="#"><span class="glyphicon glyphicon-search"></span></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

<div class="col col-md-7" id="visit"></div>
<?php endif; ?>

<style>
.row .col{
  padding-right:10px !important;
}
</style>