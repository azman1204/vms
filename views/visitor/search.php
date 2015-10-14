<legend><i class="fa fa-search" style="color:green;"></i> Carian Pelawat</legend>

<form method="post">
    <div class="container-fluid col col-md-6 well" style="margin-left:10px;">
        <div class="row">
            <div class="col col-md-1">Nama</div>
            <div class="col col-md-5"><input type="text" name="name" id="nama" class="form-control"></div>
            <div class="col col-md-1">No KP</div>
            <div class="col col-md-5"><input type="text" name="icno" id="nokp" class="form-control"></div>
        </div>
        <div class="row">
            <div class="col col-md-1"></div>
            <div class="col col-md-6"><input type="submit" value="Cari" class="btn btn-primary"></div>
        </div>
    </div>
</form>
<div style="clear:both"></div>

<?php
if (isset($visitors)) :
?>
    <div class="col col-md-5">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <th>#</th>
            <th>Nama</th>
            <th>No KP</th>
            <th></th>
            </thead>
            <?php
            $i = 1;
            foreach ($visitors as $visitor) :
                ?>
                <tr>
                    <td><?= $i++ ?>.</td>
                    <td><?= $visitor->name ?></td>
                    <td><?= $visitor->icno ?></td>
                    <td align='center'><a class="dlg" val='<?=$visitor->id?>' href="#visit"><span class="glyphicon glyphicon-search"></span></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

<div class="col col-md-7" id="visit"></div>
<?php endif; ?>

<script>
    $(function() {
        $('.dlg').click(function() {
            $('#visit').html('<i class="fa fa-refresh fa-spin fa-3x fa-fw margin-bottom"></i>');
            var visitor_id = $(this).attr('val');
            $('#visit').load('index.php?r=visitor/update', {visitor_id : visitor_id});
        });
    });
    
    function showResponse(text, status, xhr, $form) {
        if (text === 'ok') {
            alert('Data telah disimpan');
        } else {
            alert('Masalah teknikal berlaku');
        }
    }
</script>

<style>
.row .col{
  padding-right:10px !important;
}
</style>