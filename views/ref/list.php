<legend><i class="fa fa-list green"></i> Senarai Parameter Sistem</legend>

<div class="col col-md-8">
    <a href="index.php?r=ref/create&kat=<?= $_GET['kat'] ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Tambah Kod</a>
    <a href="index.php?r=ref/katlist" class="btn btn-default btn-xs"><i class="fa fa-backward"></i> Kembali</a>
    
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th width="15%">Kod</th>
                <th>Keterangan</th>
                <th nowrap width="10%"></th>
            </tr>
        </thead>
        <?php
        $i = 1;
        foreach ($ref as $r) :
            ?>
            <tr>
                <td><?= $i++ ?>.</td>
                <td><?= $r->code ?></td>
                <td><?= $r->descr ?></td>
                <td align='center'>
                    <a href="index.php?r=ref/edit&id=<?= $r->id ?>" title="Kemaskini" data-rel="tooltip"><i class="fa fa-pencil-square-o fa-fw bigger-130"></i></a>
                    <a href="index.php?r=ref/del&id=<?= $r->id ?>" class="askme" title="Hapus" data-rel="tooltip"><i class="fa fa-trash-o bigger-130"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>