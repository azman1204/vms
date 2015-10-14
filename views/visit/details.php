<div class="well">
    <table class="table">
        <tr>
            <td width="20%">Nama</td>
            <td>: <?= $visitor->name ?> </td>
            <td width="20%">No KP</td>
            <td>: <?= $visitor->icno ?> </td>
        </tr>
        <tr>
            <td>Masa Masuk</td>
            <td>: <?= date('H:i', strtotime($visit->in_dt)) ?> </td>
            <td>Masa Keluar</td>
            <td>: <?= date('H:i') ?> </td>
        </tr>
        <tr>
            <td>No Pass</td>
            <td>: <?= $visit->pass_no ?> </td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <form method="post" action="index.php?r=visit/reg-out-handler">
        <input type="hidden" name="id" value="<?=$visit->id?>">
        <div class="container-fluid">
            <div class="row">
                <div>Nota</div>
                <div>
                    <textarea name="out_remark" rows="2" cols="50"></textarea>
                </div>
            </div>
            <div class="row">
                Status : 
                <input type="radio" value="G" name="out_rate" checked=""> Bagus
                <input type="radio" value="P" name="out_rate"> Ada masalah
            </div>
            <div class="row">
                <input type="submit" class="btn btn-primary btn-sm" value="Simpan">
                <input type="button" value="Batal" class="btn btn-warning btn-sm">
            </div>
        </div>
    </form>
</div>