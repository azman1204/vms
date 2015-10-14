<script src="js/jquery.form.js"></script>
<form id="myform" method="post" action="index.php?r=visitor/save">
    <input type="hidden" name="id" value="<?= $visitor->id ?>">
    <div class="well">
        <table class="table">
            <tr>
                <td width='20%'>Nama</td>
                <td><input type="text" name="name" value="<?= $visitor->name ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>No KP</td>
                <td><input type="text" name="icno" value="<?= $visitor->icno ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Tarikh Lahir</td>
                <td><input type="text" name="bod" value="<?= $visitor->bod ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Tel</td>
                <td><input type="text" name="tel" value="<?= $visitor->tel ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <input type="text" name="addr1" value="<?= $visitor->addr1 ?>" class="form-control">
                    <input type="text" name="addr2" value="<?= $visitor->addr2 ?>" class="form-control">
                    <input type="text" name="addr3" value="<?= $visitor->addr3 ?>" class="form-control">
                </td>
            </tr>
            <tr>
                <td>Tarik Daftar</td>
                <td><?= $visitor->reg_dt ?></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-primary" value="Simpan"></td>
            </tr>
        </table>
    </div>
</form>

<script>
    $(function () {
        var options = { 
            success: showResponse
        }; 
 
        $('#myform').ajaxForm(options);
    });
    
    function showResponse(text, status, xhr, $form) {
        if (text === 'ok') {
            alert('Data telah disimpan');
            location.href = 'index.php?r=visitor/reg';
        } else {
            alert('Masalah teknikal berlaku');
        }
    }
</script>