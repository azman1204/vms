<?php
use yii\helpers\Url;
?>

<legend><i class="fa fa-list green"></i> Senarai Parameter Sistem</legend>

<div class="col col-md-8">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Kod</th>
                <th>Keterangan</th>
                <th></th>
            </tr>
        </thead>
        <?php
        $i = 1;
        foreach ($refs as $r) :
            ?>
            <tr>
                <td><?= $i++ ?>.</td>
                <td><?= $r->code ?></td>
                <td><?= $r->descr ?></td>
                <td align='center'>
                    <a href="<?=URL::toRoute('ref/list')?>&kat=<?= $r->code ?>" class="green" title="Senarai Kod" data-rel="tooltip"><i class="glyphicon glyphicon-search bigger-130"></i></a>
                </td>
            </tr>
        <?php endforeach; ?> 
    </table>
</div>