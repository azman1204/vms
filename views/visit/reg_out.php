
<legend>
    Daftar Keluar Pelawat
</legend>

<?php
if (isset($err)) :
?>
    <div class="alert alert-danger col col-md-7 col-md-offset-1">
        <?=$err?>
    </div>
<?php
endif;
?>

<form method="post" action="index.php?r=visit/reg-out-details">
    <div class="container col col-md-7 col-md-offset-1 well">
        <div class="row">
            <div class="col col-md-12">** Sila scan barcode pelawat disini ATAU masukkan no pelawat diruangan di bawah</div>
        </div>
        <div class="row">
            <div class="col col-md-2">No Pass</div>
            <div class="col col-md-10"><input type="text" name="pass_no"></div>
        </div>
        <div class="row">
            <div class="col col-md-2 col-md-offset-2"><input type="submit" class="btn btn-primary" value="Hantar"></div>
        </div>
    </div>
</form>